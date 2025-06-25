<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    //
    public function __construct(protected Course $model){

    }

    //index
    public function index()
    {
        $courses = $this->model->all();
        foreach($courses as $course) {
            if ($course->image) {
                $course->image = asset('storage/images/' . $course->image);
            }
        }
        return inertia('Admin/Course/Index', compact('courses'));
    }

    //create
    public function create()
    {
        return inertia('Admin/Course/Create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $this->model->create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    //edit
    public function edit($id)
    {
        $course = $this->model->findOrFail($id);
        if ($course->image) {
            $course->image = asset('storage/images/' . $course->image);
        }
        return inertia('Admin/Course/Edit', compact('course'));
    }
    //update
    public function update(Request $request, $id)
    {
        $course = $this->model->findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable',
        ]);

        if ($request->file('image')) {
            if ($course->image) {
                Storage::delete('public/images/' . $course->image);
            }
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }   

    //delete
    public function destroy($id)
    {
        $course = $this->model->findOrFail($id);
        if ($course->image) {
            Storage::delete('public/images/' . $course->image);
        }
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
