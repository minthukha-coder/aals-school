<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

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
}
