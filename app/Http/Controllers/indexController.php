<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminAuthor;
use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Rating;

class indexController extends Controller
{
    public function index(){
        if(Auth::check()){
            $admin = 1;
        }else{
            $admin = 0;
        }
        $authors = AdminAuthor::with('books')->get();
        $bookCount = Book::count();
        $authorsCount = AdminAuthor::where(['type'=>'author'])->count();
        $usersCount = User::count();
        $featuredbooks = Book::where(['status'=>1,'list_status'=>'approved','featured'=>1])->get();
        $newrelease = Book::where(['status'=>1,'list_status'=>'approved'])->orderBy('created_at','desc')->take(3)->get();
        //getting number of books in select categories
        $dramaCount = Book::where(['status'=>1,'list_status'=>'approved','category'=>'Drama'])->count();
        $horrorCount = Book::where(['status'=>1,'list_status'=>'approved','category'=>'Horror'])->count();
        $romansCount = Book::where(['status'=>1,'list_status'=>'approved','category'=>'Romans'])->count();
        $fashionCount = Book::where(['status'=>1,'list_status'=>'approved','category'=>'Fashion'])->count();
        //bestselling books gotten from $authors, to be properly sorted by number of orders later
        $allbooks = Book::where(['status'=>1,'list_status'=>'approved'])->get();
        //testimonials from ratings list
        $testimonials = Rating::where([['rating','>', 4.5],['feedback','!=', " "]])->orderBy('created_at','asc')->take(5)->get();

        $bannerbooks = Book::orderBy('created_at','desc')->take(5)->get();
        foreach($bannerbooks as $key=>$value){
            $bannerbooks[$key]->author_image = AdminAuthor::where('email',$value->email)->first()->image;
        }
        
        return view('index')->with(compact(
            'bannerbooks','bookCount','authorsCount','usersCount','featuredbooks',
            'allbooks','newrelease','dramaCount','horrorCount','romansCount','fashionCount',
            'testimonials','authors','admin'
        ));
    }
}
