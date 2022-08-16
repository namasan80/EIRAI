<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users/index');
    }
    
    public function show(User $user)
    {
        $samples = $user->samples();
        return view('users/show')->with(['user' => $user,'samples' => $user->getSamples()]);
    }
    
    public function edit()
    {
        $auth = Auth::user();
        return view('users/edit')->with(['user' => $auth]);
    }
    
    public function update(UserRequest $request , User $user)
    {
        $input_user = $request['user'];
        Auth::user()->fill($input_user)->save();
    
        return redirect('/users/' . $user->id);
    }
}