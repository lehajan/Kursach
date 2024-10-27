<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'string | required',
            'email' => 'email | required',
            'password1' => '',
            'password2' => '',
        ]);

        $user = Auth::user();

        if($data['password1']){
            if($data['password1'] == $data['password2']){
                $user->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
//                    'password' => Hash::make($data['password1']), //по идее метод update должен сам хэшировать, но нам подсказывает, что надо так
                    'password' => $data['password1']
                ]);
            }else{
                return response()->json(['passwords do not match'], status: 400);
            }

        }else{
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        return response()->json(['user was updated']);
    }

    public function delete()
    {
        $user = Auth::user();
        $user->delete();
        return response()->json(['user was deleted']);
    }
}
