<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Sample extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'price',
        'time',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function goods()
    {
        return $this->HasMany('App\Good');
    }
    
    public function search($search)
    {
        if($search=="new"){
            return $this->orderBy('created_at', 'desc')->paginate(15);
        }elseif($search=="follow"){
            $follows = Auth::user()->follows()->pluck("followed_user_id");
            return $this->whereIn("user_id", $follows)->orderBy('created_at', 'desc')->paginate(15);
        }else{
            return $this->withCount('goods')->orderBy('goods_count', 'desc')->paginate(15);
        }
    }
}