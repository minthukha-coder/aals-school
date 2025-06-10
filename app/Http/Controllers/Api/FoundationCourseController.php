<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoundationCourse;
use Illuminate\Http\Request;

class FoundationCourseController extends Controller
{
    //
    public function __construct(protected FoundationCourse $model){

    }

    //index
    public function index(Request $request){
        $courses = $this->model->get();
        foreach($courses as $course){
            $course->image = asset('storage/'.$course->image);
        }

        return inertia('FoundationCourse/Index', [
            'courses' => $courses,
        ]);	
    }

    //create
    public function create(Request $request){
        return inertia('FoundationCourse/Create');
    }

    //store
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['image'] = $request->file('image')->store('foundation_courses', 'public');

        $this->model->create($data);

        return redirect()->route('foundation-course.index')->with('success', 'Foundation Course created successfully.');
    }

    
}
