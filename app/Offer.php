<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Req;

class Offer extends Model
{
    protected $fillable = [
        'detail',
        'user_id',
        'req_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function req()
    {
        return $this->belongsTo('App\Req');
    }
}
