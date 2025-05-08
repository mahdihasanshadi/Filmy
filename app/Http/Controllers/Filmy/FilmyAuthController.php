<?php

namespace App\Http\Controllers\Filmy;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FilmyAuthController extends Controller
{

    public function login() {
        return view("auth.login");
    }

    public function loginPost(Request $loginRequest) {
        $this->validate($loginRequest, [
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        // check user is exist or not
        $user = User::where("email", $loginRequest->email)->first();

        // return $user->toSql();
        if (!$user) {
            return back()->with('error', 'User not found');
        }

        // check password is correct or not
        if (!Hash::check($loginRequest->password, $user->password)) {
            return back()->with('error', 'Password is incorrect');
        }

        // login user
        Auth::login($user);

        return redirect('/');
    }

    public function register() {
        return view("auth.register");
    }

    public function shadiPost(Request $shRequest) {
        $this->validate($shRequest, [
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|confirmed",
        ], [
            "name.required" => "Name is required, Enter your name",
        ]);

        // return $shRequest->all();

        try {
            $user = new User();
            $user->name = $shRequest->name;
            $user->email = $shRequest->email;
            $user->password = Hash::make($shRequest->password);
            $user->referer_id = rand(100000, 999999);
            $user->is_verified = false;
            $user->save();

            return redirect('/login')->with('success', 'Registration successful with referer id: ' . $user->referer_id);
        }
        catch (\Exception $e) {
            return back()->with('error', 'Registration failed');
        }
    }

    // logout
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
