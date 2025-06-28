<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CambridgeExamCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CambridgeExamCourseController extends Controller
{

    public function __construct(protected CambridgeExamCourse $model) {}

    //index
    public function index()
    {
        $courses = $this->model->get();
        foreach ($courses as $course) {
            $course->image = asset('storage/images/' . $course->image);
        }

        return inertia('Admin/CambridgeExamCourse/Index', [
            'courses' => $courses,
        ]);
    }

    //create
    public function create()
    {
        return inertia('Admin/CambridgeExamCourse/Create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'months' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $this->model->create($data);

        return redirect()->route('admin.cambridge-exam-courses.index')->with('success', 'Foundation Course created successfully.');
    }


    public function edit(Request $request)
    {
        $course = $this->model->findOrFail($request->id);
        $course->image = $course->image ? asset('storage/images/' . $course->image) : null;
        return inertia('Admin/CambridgeExamCourse/Edit', compact('course'));
    }
    //update
    public function update(Request $request)
    {
        $course = $this->model->findOrFail($request->id);
        $data = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|string',
            'months' => 'nullable|string',
        ]);

        if ($request->file('image')) {
            Storage::delete('public/images/' . $course->image);
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $course->update($data);

        return redirect()->route('admin.cambridge-exam-courses.index')->with('success', 'Course updated successfully.');
    }

    //delete
    public function destroy(Request $request)
    {
        $course = $this->model->findOrFail($request->id);
        if ($course->image) {
            Storage::delete('public/images/' . $course->image);
        }
        $course->delete();
        return redirect()->route('admin.cambridge-exam-courses.index')->with('success', 'Course deleted successfully.');
    }
}
