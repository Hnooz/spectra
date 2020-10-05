<?php

namespace App;

use App\Table;
use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $with = ['table'];
    
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function orderDetails()
    {
            return $this->hasMany(OrderDetails::class);
    }
}
