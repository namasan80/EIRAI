<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Req;
use App\Sample;
use App\FollowUser;
use App\Good;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile','image_path','skima_id','twitter_id'
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
         return $this->samples()->orderBy('created_at', 'DESC')->take(3)->get();
    }
    
    public function getReqs(int $limit_count = 2)
    {
         return $this->reqs()->orderBy('created_at', 'DESC')->take(3)->get();
    }
    
    public function isfollow($userId)
    {
      return $this->follows()->where('followed_user_id',$userId)->exists();
    }
    
    public function follow($userId, $followusers)
    {
      if($this->isfollow($userId)){
        $follow = $followusers->where('following_user_id',\Auth::user()->id)->where('followed_user_id',$userId)->first();
        $follow->delete();
      }else{
        FollowUser::create([
                'following_user_id' => \Auth::user()->id,
                'followed_user_id' => $userId,
            ]);
      }
    }
    
    //フォロー一覧
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'followed_user_id', 'following_user_id');
    }

    //フォロワー一覧
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'following_user_id', 'followed_user_id');
    }
    
    //フォロー中の人の投稿一覧
    public function getFollowsPosts()
    {
        //$follows = $this->follows();
        $follows = $this->follows()->pluck("followed_user_id");
        $samples = Sample::whereIn("user_id", $follows)->orderBy("updated_at", "DESC")->take(3)->get();
        return $samples;
    }
    
    //リレーション
    public function reqs()
    {
        return $this->hasMany('App\Req');  
    }
    
    public function samples()
    {
        return $this->hasMany('App\Sample');  
    }
    
    public function goods()
    {
        return $this->hasMany('App\Good');  
    }
    
    //いいね関連処理
    public function isgood($sampleId)
    {
      return $this->goods()->where('sample_id',$sampleId)->exists();
    }
    
    public function good($sampleId)
    {
      if($this->isgood($sampleId)){
        $good = $this->goods()->where('sample_id',$sampleId)->first();
        $good->delete();
      }else{
        Good::create([
                'user_id' => \Auth::user()->id,
                'sample_id' => $sampleId,
            ]);
      }
    }
}