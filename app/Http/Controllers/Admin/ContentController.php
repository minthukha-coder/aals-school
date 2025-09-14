<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;


class ContentController extends Controller
{
    public function __construct(protected Content $model)
    {

    }

    public function index()
    {
        $contents = $this->model->all();
        return inertia('Admin/Content/Index', compact('contents'));
    }

    public function create()
    {
        return inertia('Admin/Content/Create');
    }

    public function store(Request $request)
    {
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);
        $this->model->create($data);
        return redirect()->route('admin.contents.index')->with('success', 'Content created successfully.');
    }

    public function edit(Request $request)
    {
        $content = $this->model->findOrFail($request->id);
        return inertia('Admin/Content/Edit', compact('content'));
    }

    public function update(Request $request)
    {
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $content = $this->model->findOrFail($request->id);
        $content->update($data);

        return redirect()->route('admin.contents.index')->with('success', 'Content updated successfully.');
    }

    public function destroy(Request $request)
    {
        $content = $this->model->findOrFail($request->id);
        $content->delete();
        return redirect()->route('admin.contents.index')->with('success', 'Content deleted successfully.');
    }
}
