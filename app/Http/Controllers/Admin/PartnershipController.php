<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    //

    public function __construct(protected Partnership $model){

    }

    //index
    public function index(){
        $partnerships = $this->model->all();
        foreach ($partnerships as $partnership) {
            $partnership->image1 = asset('storage/images/' . $partnership->image1);
            $partnership->image2 = asset('storage/images/' . $partnership->image2);
        }
        return inertia('Admin/Partnership/Index', compact('partnerships'));
    }

    //create
    public function create(){
        return inertia('Admin/Partnership/Create');
    }
    //store
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file('image1')) {
            $image1Name = uniqid() . '_' . time() . '.' . $request->file('image1')->getClientOriginalExtension();
            $request->file('image1')->storeAs('public/images', $image1Name);
            $data['image1'] = $image1Name;
        }

        if ($request->file('image2')) {
            $image2Name = uniqid() . '_' . time() . '.' . $request->file('image2')->getClientOriginalExtension();
            $request->file('image2')->storeAs('public/images', $image2Name);
            $data['image2'] = $image2Name;
        }

        $this->model->create($data);

        return redirect()->route('admin.partnerships.index')->with('success', 'Partnership created successfully.');
    }
    //edit
    public function edit($id){
        $partnership = $this->model->findOrFail($id);
        $partnership->image1 = asset('storage/images/' . $partnership->image1);
        $partnership->image2 = asset('storage/images/' . $partnership->image2);
        return inertia('Admin/Partnership/Edit', compact('partnership'));
    }
    //update
    public function update(Request $request, $id){
        $partnership = $this->model->findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file('image1')) {
            $image1Name = uniqid() . '_' . time() . '.' . $request->file('image1')->getClientOriginalExtension();
            $request->file('image1')->storeAs('public/images', $image1Name);
            $data['image1'] = $image1Name;
        }

        if ($request->file('image2')) {
            $image2Name = uniqid() . '_' . time() . '.' . $request->file('image2')->getClientOriginalExtension();
            $request->file('image2')->storeAs('public/images', $image2Name);
            $data['image2'] = $image2Name;
        }

        $partnership->update($data);

        return redirect()->route('admin.partnerships.index')->with('success', 'Partnership updated successfully.');
    }
    //destroy
    public function destroy($id){
        $partnership = $this->model->findOrFail($id);
        $partnership->delete();
        return redirect()->route('admin.partnerships.index')->with('success', 'Partnership deleted successfully.');
    }
}
