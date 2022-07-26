<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Storage;

class PostsController extends Controller
{
    
  public function add()
  {
      return view('post.create');
  }

  public function create(Request $request)
  {
      $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);

      $post->save();

      return redirect('post/create');
  }
  
  public function index(Request $request)
    {
      $posts = Post::all();
    
      return view('post.index', ['posts' => $posts]);
    }
}