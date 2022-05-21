<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    public function register(Request $request) {
        $userData = $request->all();
        $validator = Validator::make($userData, [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'city_id' => 'required',
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            return redirect(route('register.page'))
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();

        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->city_id = $userData['city_id'];

        $user->save();

        return redirect(route('browse'));
    }

    public function login(Request $request) {
        $userInfo = $request->only('email', 'password');

        $validator = Validator::make($userInfo, [
            'email' => 'required|email:rfc,dns,filter',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return;
        }

        if(Auth::attempt($userInfo)) {
            return redirect('browse');
        }

        return redirect(route('login.page'))
            ->withErrors(['auth-error' => 'Email или пароль введены некорректно'])
            ->withInput();
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
