<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdditionalCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdditionalCourseController extends Controller
{
    //
    public function __construct(protected AdditionalCourse $model)
    {
        // Constructor to inject the AdditionalCourse model

    }

    //index
    public function index()
    {
        $courses = $this->model->all();
        foreach ($courses as $course) {
                $course->image = asset('storage/images/' . $course->image);
            }

        return inertia('Admin/AdditionalCourse/Index', compact('courses'));
    }

    //create
    public function create(){
        return inertia('Admin/AdditionalCourse/Create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $this->model->create($data);

        return redirect()->route('admin.additional-courses.index')->with('success', 'Additional course created successfully.');
    }
    //edit
    public function edit(Request $request)
    {
        $course = $this->model->findOrFail($request->id);
        if ($course->image) {
            $course->image = asset('storage/images/' . $course->image);
        }
        return inertia('Admin/AdditionalCourse/Edit', compact('course'));
    }
    //update
    public function update(Request $request)
    {
        $course = $this->model->findOrFail($request->id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

         if ($request->file('image')) {
            Storage::delete('public/images/' . $course->image);
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $course->update($data);

        return redirect()->route('admin.additional-courses.index')->with('success', 'Additional course updated successfully.');
    }
    //destroy
    public function destroy(Request $request)
    {
        $course = $this->model->findOrFail($request->id);
        if ($course->image) {
            Storage::delete('public/images/' . $course->image);
        }
        $course->delete();
        return redirect()->route('admin.additional-courses.index')->with('success', 'Additional course deleted successfully.');
    }
}
