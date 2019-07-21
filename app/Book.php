<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function attributes(){
        return $this->hasOne('App\productAttribute','book_id','id');
    }
}
