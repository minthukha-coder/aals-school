<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return inertia('Admin/Dashboard');
    }

    public function home()
    {
        return inertia('Admin/Home/Index');
    }

    public function about()
    {
        return inertia('Admin/About');
    }

    public function courses()
    {
        return inertia('Admin/Courses');
    }
}
