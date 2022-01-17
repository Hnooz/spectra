<?php

namespace App;

use App\Category;
use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];
    protected $with = ['category'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails()
    {
        return $this->belongsToMany(OrderDetails::class);
    }
}
