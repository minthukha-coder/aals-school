<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function __construct(protected UserService $userService) {}

    public function loginPage()
    {
        return Inertia::render('User/Login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $this->userService->login($request);
        if (isset($data['message'])) {
            session(['error' => $data['message']]);
            return redirect()->back();
        }

        session(['success' => 'Login success']);
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        session(['success' => 'Logout success']);
        return redirect()->route('login');
    }
}
