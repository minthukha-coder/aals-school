<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(protected UserService $userService){

    }

    // Love You 

    public function profile()
    {
        return Inertia::render('Admin/Profile', [
            'user' => Auth::user()
        ]);
    }

    // Update profile
   public function updateProfile(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully!');
}

}
