<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LocationController extends Controller
{
    //
    public function __construct(protected Location $model)
    {
        // Constructor logic if needed

    }

    //index
    public function index(){
        $location = $this->model->first();
        return Inertia::render('Admin/Location/Index', ['location' => $location]);
    }

    //create
    public function create(){
        return Inertia::render('Admin/Location/Create');
    }

    //store
    public function store(Request $request){
        $data = $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $this->model->updateOrCreate(['id' => 1], $data);

        return redirect()->route('admin.location.index')->with('success', 'Location updated successfully.');
    }
}
