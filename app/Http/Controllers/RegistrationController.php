<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function reg(Request $request)
    {
        $data = $request->validate([
            'name' => 'string | required',
            'email' => 'email | required',
            'password' => 'string | required',
        ]);
        User::create($data);
        return response()->json('Registration successful!');
    }
}
