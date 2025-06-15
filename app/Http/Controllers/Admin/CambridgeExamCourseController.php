<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CambridgeExamCourseController extends Controller
{
    //
    public function index()
    {
        return inertia('CambridgeExamCourse/Index');
    }
    public function create()
    {
        return inertia('CambridgeExamCourse/Create');
    }
    public function store(Request $request)
    {
        // Logic to store the Cambridge exam course
        // Validate and save the course data
        return redirect()->route('cambridge-exam-course.index')->with('success', 'Course created successfully.');
    }
    public function edit($id)
    {
        // Logic to fetch the course data for editing
        return inertia('CambridgeExamCourse/Edit', ['courseId' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Logic to update the Cambridge exam course
        // Validate and update the course data
        return redirect()->route('cambridge-exam-course.index')->with('success', 'Course updated successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete the Cambridge exam course
        return redirect()->route('cambridge-exam-course.index')->with('success', 'Course deleted successfully.');
    }
}
