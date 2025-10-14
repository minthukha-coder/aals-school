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
            return sendError(404, "This email is not registered yet");
        }

        if (!Hash::check($request->password, $user->password)) {
            return sendError(401, "The password you entered is incorrect");
        }

        Auth::login($user);

        $data = [
            'user' => $user,
        ];

        return $data;
    }
}
