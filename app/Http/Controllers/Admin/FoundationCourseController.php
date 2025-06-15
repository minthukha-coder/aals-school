<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoundationCourse;
use Illuminate\Http\Request;

class FoundationCourseController extends Controller
{
    //
    public function __construct(protected FoundationCourse $model){

    }

    //index
    public function index(){
        $courses = $this->model->get();
        foreach($courses as $course){
            $course->image = asset('storage/images/'.$course->image);
        }

        return inertia('Admin/FoundationCourse/Index', [
            'courses' => $courses,
        ]);	
    }

    //create
    public function create(){
        return inertia('Admin/FoundationCourse/Create');
    }

    //store
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'age' => 'required|string',
            'duration' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->file('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $this->model->create($data);

        return redirect()->route('admin.foundation-course.index')->with('success', 'Foundation Course created successfully.');
    }

    
}
