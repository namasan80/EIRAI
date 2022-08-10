<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Req extends Model
{
    protected $dates = ['deadline'];
    
    protected $fillable = [
        'title',
        'detail',
        'price',
        'deadline',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
