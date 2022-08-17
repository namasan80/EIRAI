<?php

namespace App;

use App\User;
use App\Sample;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function sample()   
    {
        return $this->belongsTo('App\Sample');  
    }
    
    public function user()   
    {
        return $this->belongsTo('App\User');  
    }
}
