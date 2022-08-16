<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Req;
use App\Sample;
use App\FollowUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    function countfollower($user){
        return count(FollowUser::where('followed_user_id', $user->id)->get());
    }
    
    public function getSamples(int $limit_count = 2)
    {
         return $this->samples()->get();
    }
    
    public function getReqs(int $limit_count = 2)
    {
         return $this->reqs()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function reqs()
    {
        return $this->hasMany('App\Req');  
    }
    
    public function samples()
    {
        return $this->hasMany('App\Sample');  
    }
}