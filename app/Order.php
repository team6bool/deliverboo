<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
