<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CambridgeCourse;
use App\Http\Controllers\Controller;

class CambridgeCourseController extends Controller
{
    //

    public function __construct(protected CambridgeCourse $model)
    {
        
    }

    //index
    public function index(Request $request)
    {
        $courses = $this->model->get();
        foreach ($courses as $course) {
            $course->image = asset('storage/' . $course->image);
        }

        return inertia('CambridgeCourse/Index', [
            'courses' => $courses,
        ]);
    }
    //create
    public function create(Request $request)
    {
        return inertia('CambridgeCourse/Create');
    }
    //store 
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['image'] = $request->file('image')->store('cambridge_courses', 'public');

        $this->model->create($data);

        return redirect()->route('cambridge-course.index')->with('success', 'Cambridge Course created successfully.');
    }
}
