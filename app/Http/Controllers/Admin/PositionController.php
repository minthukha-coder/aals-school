<?php

namespace App\Http\Controllers\Admin;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\PositionBenefit;
use PhpParser\Node\Expr\PostInc;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    //
    public function __construct(protected Position $model)
    {
        // Constructor logic if needed

    }

    public function index()
    {
        $positions = $this->model->with('benefits')->get();
        return inertia('Admin/Position/Index', compact('positions'));
    }

    public function create()
    {
        return inertia('Admin/Position/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'date' => 'nullable|string|max:255',
            'place' => 'nullable|string|max:255',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'highlight' => 'nullable|string',
        ]);

        $position = $this->model->create($data);
        if ($request->has('benefits')) {
            foreach ($request->benefits as $benefit) {
                PositionBenefit::create([
                    'position_id' => $position->id,
                    'benefit' => $benefit
                ]);
            }
        }

        return redirect()->route('admin.positions.index')->with('success', 'Position created successfully.');
    }

    public function edit(Request $request)
    {
        $position = $this->model->with('benefits')->findOrFail($request->id);
        return inertia('Admin/Position/Edit', compact('position'));
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'date' => 'nullable|date',
            'place' => 'nullable|string|max:255',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'highlight' => 'nullable|string',
        ]);

        $position = $this->model->findOrFail($request->id);
        $position->update($data);

        if($request->has('benefits')) {
            // Delete existing benefits
            PositionBenefit::where('position_id', $position->id)->delete();

            // Add new benefits
            foreach ($request->benefits as $benefit) {
                PositionBenefit::create([
                    'position_id' => $position->id,
                    'benefit' => $benefit['benefit']
                ]);
            }
        }

        return redirect()->route('admin.positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Request $request)
    {
        $position = $this->model->findOrFail($request->id);
        $position->delete();

        return redirect()->route('admin.positions.index')->with('success', 'Position deleted successfully.');
    }
}
