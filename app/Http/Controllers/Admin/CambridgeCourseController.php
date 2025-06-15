<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CambridgeCourse;
use App\Http\Controllers\Controller;

class CambridgeCourseController extends Controller
{
    //

    public function __construct(protected CambridgeCourse $model) {}

    //index
    public function index()
    {
        $courses = $this->model->get();
        foreach ($courses as $course) {
            $course->image = asset('storage/images/' . $course->image);
        }

        return inertia('Admin/CambridgeCourse/Index', [
            'courses' => $courses,
        ]);
    }
    //create
    public function create()
    {
        return inertia('Admin/CambridgeCourse/Create');
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

        if ($request->file('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $this->model->create($data);

        return redirect()->route('admin.cambridge-courses.index')->with('success', 'Cambridge Course created successfully.');
    }
}
