<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    protected $fillable = ['following_user_id', 'followed_user_id'];

    protected $table = 'follow_users';
    
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'followed_user_id', 'following_user_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'following_user_id', 'followed_user_id');
    }
}
