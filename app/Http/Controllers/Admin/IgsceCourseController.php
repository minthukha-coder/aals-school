<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IgsceCourse;
use Illuminate\Http\Request;

class IgsceCourseController extends Controller
{
    //
    public function __construct(protected IgsceCourse $model) {}

    //index
    public function index()
    {
        $igcseCourses = $this->model->latest()->get();
        return inertia('Admin/IgcseCourse/Index', compact('igcseCourses'));
    }

    public function create()
    {
        return inertia('Admin/IgcseCourse/Create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'price_monthly' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'subjects' => 'array',
            'subjects.*.title' => 'required|string|max:255',

        ]);


        if ($request->hasFile('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $course = $this->model->create($data);

        if (!empty($data['subjects'])) {
            $course->subjects()->createMany($data['subjects']);
        }


        return redirect()->route('admin.igcse-courses.index')->with('success', 'IGCSE Course created successfully.');
    }
}
