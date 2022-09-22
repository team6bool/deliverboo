<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "slug",
        "description",
        "price",
        "img",
        "visible",
        "user_id",
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];


    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
