<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CambridgeExamCourseImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class CambridgeExamCourseImageController extends Controller
{
    public function __construct(protected CambridgeExamCourseImage $model) {}

    public function index()
    {
        $cambridgeExamCourseImage = $this->model->first();

        if ($cambridgeExamCourseImage && $cambridgeExamCourseImage->name) {
            $cambridgeExamCourseImage->name = asset('storage/images/' . $cambridgeExamCourseImage->name);
        }

        return inertia('Admin/CambridgeExamCourseImage/Index', compact('cambridgeExamCourseImage'));
    }

    public function edit()
    {
        $cambridgeExamCourseImage = $this->model->first();

        if ($cambridgeExamCourseImage && $cambridgeExamCourseImage->name) {
            $cambridgeExamCourseImage->name = asset('storage/images/' . $cambridgeExamCourseImage->name);
        }

        return inertia('Admin/CambridgeExamCourseImage/Edit', compact('cambridgeExamCourseImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $cambridgeExamCourseImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $cambridgeExamCourseImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $cambridgeExamCourseImageName);
                Log::info('Position image stored: ' . $cambridgeExamCourseImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($cambridgeExamCourseImage) {
                if ($cambridgeExamCourseImage->name && Storage::exists('public/images/' . $cambridgeExamCourseImage->name)) {
                    Storage::delete('public/images/' . $cambridgeExamCourseImage->name);
                }

                $cambridgeExamCourseImage->update([
                    'name' => $cambridgeExamCourseImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $cambridgeExamCourseImageName,
                ]);
            }
        }

        return redirect()->route('admin.cambridge-exam-course-images.index')
            ->with('success', 'Cambridge Exam Course cover updated successfully.');
    }
}
