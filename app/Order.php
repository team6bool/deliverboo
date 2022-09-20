<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "name", "lastname", "address", "email", "phone", "total", "user_id"
    ];

    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
