<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users/index');
    }
    
    public function show(User $user)
    {
        $samples = $user->samples();
        return view('users/show')->with([
            'user' => $user,
            'samples' => $user->getSamples(),
            'reqs' => $user->getReqs(),
            
        ]);
    }
    
    public function edit()
    {
        $auth = Auth::user();
        return view('users/edit')->with(['user' => $auth]);
    }
    
    public function update(UserRequest $request , User $user)
    {
        $input_user = $request['user'];
        //画像をs3へアップロード・ダウンロード
        $image = $request->file('image');
        if($image!=null){
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            Auth::user()->image_path = Storage::disk('s3')->url($path);
        }
        Auth::user()->fill($input_user)->save();
    
        return redirect('/users/' . $user->id);
    }
}