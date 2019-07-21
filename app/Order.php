<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function ordered_items(){
        return $this->hasMany('App\OrderProducts','order_id');
    }
}
