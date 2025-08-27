<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(protected User $model) {}

    public function login($request)
    {
        $user = $this->model->where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('failed', 'This email is not registered yet');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('failed', 'The password you entered is incorrect');
        }

        Auth::login($user);
        $token = $user->createToken('AALS_Token')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];

        return $data;
    }
}
