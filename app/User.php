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
         return $this->samples()->orderBy('updated_at', 'DESC')->take(4)->get();
    }
    
    public function getReqs(int $limit_count = 2)
    {
         return $this->reqs()->orderBy('updated_at', 'DESC')->paginate($limit_count);
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
        $good = Good::create([
                'user_id' => \Auth::user()->id,
                'sample_id' => $sampleId,
            ]);
      }
    }
}