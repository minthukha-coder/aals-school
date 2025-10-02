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
            'subjects' => 'array',
        ]);

        $course->update($data);

        if ($request->has('subjects')) {
            $submittedIds = [];

            foreach ($request->subjects as $subject) {
                // Update existing subject
                if (!empty($subject['id'])) {
                    $existing = $course->subjects()->find($subject['id']);
                    if ($existing) {
                        $updateData = [
                            'title' => $subject['title'],
                        ];

                        // Check if a new image is uploaded
                        if (isset($subject['image']) && $subject['image'] instanceof \Illuminate\Http\UploadedFile) {
                            $imageName = uniqid() . '_' . time() . '.' . $subject['image']->getClientOriginalExtension();
                            $subject['image']->storeAs('public/images/', $imageName);

                            // Delete old image only if it exists and a new image is uploaded
                            if ($existing->image) {
                                Storage::delete('public/images/' . $existing->image);
                            }

                            $updateData['image'] = $imageName;
                        } else {
                            // Retain existing image if no new image is uploaded
                            $updateData['image'] = $existing->image;
                        }

                        $existing->update($updateData);
                        $submittedIds[] = $existing->id;
                    }
                }
                // Create new subject
                else {
                    $newData = [
                        'title' => $subject['title'],
                    ];

                    if (isset($subject['image']) && $subject['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $imageName = uniqid() . '_' . time() . '.' . $subject['image']->getClientOriginalExtension();
                        $subject['image']->storeAs('public/images/', $imageName);
                        $newData['image'] = $imageName;
                    } else {
                        $newData['image'] = null; // No image for new subject if none uploaded
                    }

                    $newSubject = $course->subjects()->create($newData);
                    $submittedIds[] = $newSubject->id;
                }
            }

            // Delete subjects not in the submitted request
            $course->subjects()
                ->whereNotIn('id', $submittedIds)
                ->each(function ($subject) {
                    if ($subject->image) {
                        Storage::delete('public/images/' . $subject->image);
                    }
                    $subject->delete();
                });
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
