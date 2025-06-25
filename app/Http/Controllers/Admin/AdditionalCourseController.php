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
            if ($course->image) {
                $course->image = asset('storage/images/' . $course->image);
            }
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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
    public function edit($id)
    {
        $course = $this->model->findOrFail($id);
        if ($course->image) {
            $course->image = asset('storage/images/' . $course->image);
        }
        return inertia('Admin/AdditionalCourse/Edit', compact('course'));
    }
    //update
    public function update(Request $request, $id)
    {
        $course = $this->model->findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $course->update($data);

        return redirect()->route('admin.additional-courses.index')->with('success', 'Additional course updated successfully.');
    }
    //destroy
    public function destroy($id)
    {
        $course = $this->model->findOrFail($id);
        if ($course->image) {
            // Delete the image file from storage
            Storage::delete('public/images/' . $course->image);
        }
        $course->delete();

        return redirect()->route('admin.additional-courses.index')->with('success', 'Additional course deleted successfully.');
    }
}
