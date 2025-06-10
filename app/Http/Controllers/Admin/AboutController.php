<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        return inertia('Admin/About/Index');
    }
    public function edit()
    {
        return inertia('Admin/About/Edit');
    }
}
