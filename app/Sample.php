<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}