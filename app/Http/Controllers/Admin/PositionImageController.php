<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PositionImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class PositionImageController extends Controller
{
    public function __construct(protected PositionImage $model) {}

    public function index()
    {
        $positionImage = $this->model->first();

        if ($positionImage && $positionImage->name) {
            $positionImage->name = asset('storage/images/' . $positionImage->name);
        }

        return inertia('Admin/PositionCover/Index', compact('positionImage'));
    }

    public function edit()
    {
        $positionImage = $this->model->first();

        if ($positionImage && $positionImage->name) {
            $positionImage->name = asset('storage/images/' . $positionImage->name);
        }

        return inertia('Admin/PositionCover/Edit', compact('positionImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $positionImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $positionImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $positionImageName);
                Log::info('Position image stored: ' . $positionImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($positionImage) {
                if ($positionImage->name && Storage::exists('public/images/' . $positionImage->name)) {
                    Storage::delete('public/images/' . $positionImage->name);
                }

                $positionImage->update([
                    'name' => $positionImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $positionImageName,
                ]);
            }
        }

        return redirect()->route('admin.position-images.index')
            ->with('success', 'Position image updated successfully.');
    }
}
