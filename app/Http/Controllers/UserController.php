<?php

namespace App\Http\Controllers;

use App\Users;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Users $user)
    {
        return view('users/index');
    }
    
    public function show(Users $user)
    {
        return view('users/show')->with(['user' => $user]);
    }
    
    public function edit()
    {
        $auth = Auth::user();
        return view('users/edit')->with(['user' => $auth]);
    }
    
    public function update(UserRequest $request , Users $user)
    {
        $input_user = $request['user'];
        Auth::user()->fill($input_user)->save();
    
        return redirect('/users/' . $user->id);
    }
}