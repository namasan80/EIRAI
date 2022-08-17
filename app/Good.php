<?php

namespace App;

use App\User;
use App\Sample;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
        'user_id',
        'sample_id',
    ];
    
    public function sample()
    {
        return $this->belongsTo('App\Sample');
    }
    
    public function user()   
    {
        return $this->belongsTo('App\User');  
    }
}
