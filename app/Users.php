<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Req;

class Users extends Model
{
    protected $fillable = ['name'];
    
    public function reqs()
    {
        return $this->hasMany('App\Req');  
    }
    
    public function samples()
    {
        return $this->hasMany('App\Sample');  
    }
}
