<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Category extends Model
{
    public function booksTotal(){
        return $this->hasMany('App\Book','category','category_name');
    }
}
