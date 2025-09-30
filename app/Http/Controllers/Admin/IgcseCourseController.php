<?php

namespace App\Http\Controllers\Admin;

use App\Models\IgcseCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IgcseCourseController extends Controller
{
    //
    public function __construct(protected IgcseCourse $model) {}

    //index
    public function index()
    {
        $igcseCourses = $this->model->latest()->get();
        foreach ($igcseCourses as $course) {
            if ($course->image) {
                $course->image = asset('storage/images/' . $course->image);
            }
        }
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
        ]);


        if ($request->hasFile('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $course = $this->model->create($data);

        if (!empty($data['subjects'])) {

            $subjects = [];

            foreach ($request->subjects as $subject) {
                $subjectData = [
                    'title' => $subject['title'] ?? '',
                ];

                // If subject has image file
                if (isset($subject['image']) && $subject['image']) {
                    $imageName = uniqid() . '_' . time() . '.' . $subject['image']->getClientOriginalExtension();
                    $subject['image']->storeAs('public/images', $imageName);
                    $subjectData['image'] = $imageName;
                }

                $subjects[] = $subjectData;
            }

            $course->subjects()->createMany($subjects);
        }


        return redirect()->route('admin.igcse-courses.index')->with('success', 'IGCSE Course created successfully.');
    }

    public function show(Request $request)
    {
        $course = $this->model->with('subjects')->find($request->id);
        if ($course->image) {
            $course->image = asset('storage/images/' . $course->image);
        }

        if ($course->subjects) {
            foreach ($course->subjects as $subject) {
                if ($subject->image) {
                    $subject->image = asset('storage/images/' . $subject->image);
                }
            }
        }

        return inertia('Admin/IgcseCourse/Show', compact('course'));
    }

    public function edit(Request $request)
    {
        $course = $this->model->with('subjects')->find($request->id);
        if ($course->image) {
            $course->image = asset('storage/images/' . $course->image);
        }

        if ($course->subjects) {
            foreach ($course->subjects as $subject) {
                if ($subject->image) {
                    $subject->image = asset('storage/images/' . $subject->image);
                }
            }
        }
        return inertia('Admin/IgcseCourse/Edit', compact('course'));
    }

    public function update(Request $request)
    {
        $course = $this->model->findOrFail($request->id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'price_monthly' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'subjects' => 'array',
        ]);

        $course->update($data);


        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image) {
                Storage::delete('public/images/' . $course->image);
            }

            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $imageName);
            $course->image = $imageName;
            $course->save();
        }


        // Update subjects
        if (isset($data['subjects'])) {
            $course->subjects()->delete();

            $subjectsData = [];
            foreach ($request->subjects as $subject) {
                $subjectData = [
                    'title' => $subject['title'],
                ];

                if (isset($subject['image']) && $subject['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $subjectImageName = uniqid() . '_' . time() . '.' . $subject['image']->getClientOriginalExtension();
                    $subject['image']->storeAs('public/images/subjects', $subjectImageName);
                    $subjectData['image'] = $subjectImageName;
                }

                $subjectsData[] = $subjectData;
            }

            $course->subjects()->createMany($subjectsData);
        }

        return redirect()->route('admin.igcse-courses.index')->with('success', 'IGCSE Course updated successfully.');
    }

    public function destroy(Request $request)
    {
        $course = $this->model->findOrFail($request->id);

        if ($course->image) {
            Storage::delete('public/images/' . $course->image);
        }

        $course->delete();

        return redirect()->route('admin.igcse-courses.index')->with('success', 'IGCSE Course deleted successfully.');
    }
}
