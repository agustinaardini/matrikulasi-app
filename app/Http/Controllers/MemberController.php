<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function card()
    {
        $user = Auth::user();
        return view("member/card",
    'user' > $user );
    }
    public function list()
    {
       // $users = User::all();
        $users = DB::table("users")->get();

        return view("member\list", [
            'users' => $users
            ]);
    }
}
