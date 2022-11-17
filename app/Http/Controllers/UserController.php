<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class UserController extends Controller
{
    public function register()
    {
        return view("user/register");
    }

    public function processRegister(request $request)
    {
        $request->validate([
            "name"             => "required",
            "email"            => "required|unique:users",
            "password"         => "required|min:6",
            "reenter_password" => "required|same:password",
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['level'] = 0; // Member

        
        
        $user = User::create($data);
        
        event(new Registered($user));

        return redirect("user/register-success/{$user->id}")->withSuccess("Pendaftaran berhasil!");
    }

    public function login()
    {
        return view("user/login");
    }

    public function registerSuccess($userID)
    {
        return view("user/register_success", [
            "userID" => $userID,
        ]);
    }

    public function processLogin(Request $request )
    {
        //FORM VALIDATION
        $credentials = $request->validate ([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //PROSES VALIDASI USER
        if (Auth::attempt($credentials) == true) {
            $request->session()->regenerate();
        
            if (Auth::user()type == 0) { //member
                return redirect('member');
            }else {
                //admin 
                return redirect("member/list");
            }
                $request->session()->regenerate();


          return redirect('member');
        }else {
            return redirect('user/login')->withError('Login Gagal');
        }
    }
    public function processLogout()
    {
        Auth::Logout();
        return redirect('/user/login');
    }
}
