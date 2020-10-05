<?php

namespace App;

use App\Meal;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];
    protected $with = ['order'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function meal()
    {
        return $this->hasMany(Meal::class);
    }
}
