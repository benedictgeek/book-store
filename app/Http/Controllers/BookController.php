<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Coupon;
use App\Category;
use App\AdminAuthor;
use App\Book;
use App\Cart;
use App\productAttribute;
use Illuminate\Support\Facades\Input;
use Image;
use App\DeliveryAddress;
use App\Order;
use App\OrderProducts;
use App\Rating;
use App\WishList;

class BookController extends Controller
{
    public function addbook(Request $request){
        if($request->isMethod('post')){
            
            $data = $request->all();
            if($request->hasFile('image')){
                $img_temp = Input::file('image');
                if($img_temp->isvalid()){
                    $extension = $img_temp->getClientOriginalExtension();

                    $filename = random_int(1111,9999).'.'.$extension;

                    $path = 'image/backend_img/books/'.$filename;

                    Image::make($img_temp)->resize(800,1100)->save($path);
                }

            }else{
                $filename = "";
            }
            if(empty($data['status'])){
                $status= 0;
            }else{
                $status= 1;
            }

            $book = new Book;

            if(!empty($data['paperback_status'])){
                $book->paperback_price =  $data['paperback_price'];
                $book->paper_quantity =  $data['paperback_quantity'];

                $some_string = '01245679abcde '.$data['author_name'].' fghijklmnopqrstuwABCDEFGHIJKLMNO';

                $paper_code = substr(strtoupper($data['category']),0,3).'-'.substr(str_shuffle($some_string),11, 3);

                $book->paper_code = $paper_code;
                $book->paperback = 'Yes';
            }else{
                $book->paperback = 'No';
            }
            if(!empty($data['cd_status'])){
                $book->cd_price =  $data['cd_price'];
                $book->cd_quantity =  $data['cd_quantity'];

                $some_string = '01345679abcde '.$data['author_name'].' fghijklmnopqrstuwABCDEFGHIJKLMNO';

                $cd_code = substr(strtoupper($data['category']),0,3).'-'.substr(str_shuffle($some_string),11, 3);
                $book->cd_code = $cd_code;
                $book->cd_audio = 'Yes';
            }else{
                $book->cd_audio = 'No';
            }

            $some_string = '01345679abcde '.$data['author_name'].' fghijklmnopqrstuwABCDEFGHIJKLMNO';

            $code = substr(strtoupper($data['category']),0,3).'-'.substr(str_shuffle($some_string),11, 3);
            $book->code = $code;

            $book->book_title =  $data['book_title'];
            $book->author_name =  $data['author_name'];
            $book->category =  $data['category'];
            $book->description =  $data['description'];
            $book->price =  $data['price'];
            $book->image =  $filename;
            $book->status =  $status;
            $book->email =  Auth::guard('admin')->user()->email;
            

            $book->save();

            return redirect('/author/my-books')->with('flash-message-s','Book added, after adequate review it will be listed shortly.');
        }
        $categories = Category::get();
        $author = AdminAuthor::where('email',Auth::guard('admin')->user()->email)->first();

        $name = $author->first_name.' '.$author->last_name;
        return view('admin.book.add_book')->with(compact('categories','name'));
    }
    public function mybooks(){
        $myBooks = Book::where('email',Auth::guard('admin')->user()->email)->get();
        return view('admin.book.my_books')->with(compact('myBooks'));
    }
    public function editbook(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status= 0;
            }else{
                $status= 1;
            }

            if($request->hasFile('image')){
                $img_temp = Input::file('image');
                if($img_temp->isvalid()){
                    $extension = $img_temp->getClientOriginalExtension();

                    $filename = random_int(1111,9999).'.'.$extension;

                    $path = 'image/backend_img/books/'.$filename;

                    $myBook = Book::where('id',$id)->first();

                    if(!empty($myBook->image)){
                        if(file_exists('image/backend_img/books/'.$myBook->image)){
                            unlink('image/backend_img/books/'.$myBook->image);
                        }
                    }

                    Image::make($img_temp)->resize(800,1100)->save($path);
                }

            }else{
                $filename = $data['image_name'];
            }
            
            $book = Book::where(['id'=>$data['book-id']])->first();

            if(!empty($data['paperback_status'])){
                $some_string = '01245679abcde '.$data['author_name'].' fghijklmnopqrstuwABCDEFGHIJKLMNO';
                
                if(empty($book->paper_code)){
                    $paper_code = substr(strtoupper($data['category']),0,3).'-'.substr(str_shuffle($some_string),11, 3);
                    $paper_code = $paper_code;
                }else{
                    $paper_code = $book->paper_code;
                }
                $paperback = 'Yes';
            }else{
                if(!empty($book->paper_code)){
                    $paper_code = $book->paper_code;
                }else{
                    $paper_code = Null;
                }
                $paperback = 'No';
            }

            if(!empty($data['cd_status'])){
                $some_string = '01345679abcde'.$data['author_name'].'fghijklmnopqrstuwABCDEFGHIJKLMNO';
                if(empty($book->paper_code)){
                    $cd_code = substr(strtoupper($data['category']),0,3).'-'.substr(str_shuffle($some_string),11, 3);
                    $cd_code = $cd_code;
                }else{
                    $cd_code = $book->cd_code;
                }
                $cd_audio = 'Yes';
            }else{
                if(!empty($book->cd_code)){
                    $cd_code = $book->cd_code;
                }else{
                    $cd_code = Null;
                }
                $cd_audio = 'No';
            }

            Book::where('id',$id)->update([
                'author_name'=>$data['author_name'],
                'book_title'=>$data['book_title'],
                'category'=>$data['category'],
                'description'=>$data['description'],
                'price'=>$data['price'],
                'image'=>$filename,
                'status'=>$status,
                'paperback_price'=> $data['paperback_price'],
                'paper_quantity'=> $data['paperback_quantity'],
                'paperback'=> $paperback,
                'cd_price'=> $data['cd_price'],
                'cd_quantity'=> $data['cd_quantity'],
                'cd_audio'=> $cd_audio,
                'paper_code'=> $paper_code,
                'cd_code'=> $cd_code,
                'new_price'=>$data['new_price'],
                'paper_Nprice'=>$data['paperback_Nprice'],
                'cd_Nprice'=>$data['cd_Nprice'],
                ]);

            return redirect('/author/my-books')->with('flash-message-s','Book edited successfully');
        }
        $myBook = Book::where('id',$id)->first();
        $author = AdminAuthor::where('email',Auth::guard('admin')->user()->email)->first();
        $name = $author->first_name.' '.$author->last_name;
        $categories = Category::get();
        return view('admin.book.edit_book')->with(compact('myBook','name','categories'));
    }
    public function delbook($id){
        Book::where('id',$id)->delete();
        return back()->with('flash-message-s','Book deleted successfully');
    }
    public function attributes(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();

            $attr = new productAttribute;

            $attr->book_id = $data['book_id'];
            $attr->pages = $data['pages'];
            $attr->dimensions = $data['dimensions'];
            $attr->publication_date = $data['pub_date'];
            $attr->publisher = $data['publisher'];
            $attr->language = $data['language'];
            $attr->illustration_notes = $data['notes'];
            $attr->ISBN = $data['ISBN'];

            $attr->save();

            return redirect('/author/my-books')->with('flash-message-s','Book attributes added.');

        }
        $myBook = Book::where('id',$id)->first();
        return view('admin.book.add_attribute')->with(compact('myBook'));
    }
    public function editattr(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            
            productAttribute::where('id',$id)->update([
                'book_id'=>$data['book_id'],
                'pages'=>$data['pages'],
                'dimensions'=>$data['dimensions'],
                'publication_date'=>$data['pub_date'],
                'publisher'=>$data['publisher'],
                'language'=>$data['language'],
                'illustration_notes'=>$data['notes'],
                'ISBN'=>$data['ISBN']
            ]);

            return redirect('/author/my-books')->with('flash-message-s','Book attributes edited.');
        }
        $myBook = Book::where('id',$id)->first();
        $bookAtrr = productAttribute::where('book_id',$id)->first();
        return view('admin.book.edit_attribute')->with(compact('myBook','bookAtrr'));
    }
    public function storebooks(){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }

        $store_books = Book::get();
        return view('admin.admin_book.store')->with(compact('store_books'));
    }
    public function pendingbooks(){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        $pending_books = Book::where(['list_status'=>'pending'])->get();
        return view('admin.admin_book.pending')->with(compact('pending_books'));
    }
    public function approvebook($id){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        Book::where('id',$id)->update(['list_status'=>'approved']);
        return redirect('/admin/pending-library')->with('flash-message-s','Book approved!');
    }
    public function rejectbook($id){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        Book::where('id',$id)->update(['list_status'=>'rejected']);
        return redirect('/admin/pending-library')->with('flash-message-s','Book rejected, please contact the author for modification');
    }
    public function rejectedbooks(){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        $rejected_books = Book::where(['list_status'=>'rejected'])->get();
        return view('admin.admin_book.rejected')->with(compact('rejected_books'));
    }
    public function feature($id){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        Book::where('id',$id)->update(['featured'=>1]);
        return redirect('/admin/view-library')->with('flash-message-s','Book added to featured list');
    }
    public function delfeature($id){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        Book::where('id',$id)->update(['featured'=>0]);
        return redirect('/admin/view-library')->with('flash-message-s','Book removed from featured list');
    }
    public function addcoupon(Request $request){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        if($request->isMethod('post')){
            $data = $request->all();

            $coupon = new Coupon;

            if(!empty($data['status'])){
                $status = 1;
            }else{
                $status = 0;
            }

            $coupon->code = $data['coupon_code'];
            $coupon->type = $data['amount_type'];
            $coupon->value = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status = $status;

            $coupon->save();

            // return redirect()->with('flash-message-success','Coupon code created successfully');

        }
        return view('admin.coupon.add_coupon');
    }
    public function orders(){
        $orders = Order::with('ordered_items')->get();

        return view('admin.orders.view_orders')->with(compact('orders'));
    }
    public function order($id){
        $orderDetails = Order::with('ordered_items')->where('id',$id)->first();
        $userDetails = User::where('email',$orderDetails->email)->first();

        return view('admin.orders.view_order')->with(compact('orderDetails','userDetails'));
    }
    public function invoice($id){
        $orderDetails = Order::with('ordered_items')->where('id',$id)->first();
        $userDetails = User::where('email',$orderDetails->email)->first();

        return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
    }


    //frontend book functions

    public function listbook($url= null){
        if($url == null){
            $cat_books = Book::paginate(10);
            $total = Book::count();
        }else{
            $cat = Category::where('url',$url)->first();
    
            $cat_books = Book::where('category',$cat->category_name)->paginate(10);
            $total = Book::where('category',$cat->category_name)->count();
        }

        return view('frontend.list_book')->with(compact('cat_books','total'));
    }
    public function book($id){
        $myBook = Book::where('id',$id)->first();
        $relpro = Book::where(['category'=> $myBook->category])->get();
        if(Auth::check()){
            $auth_user = 1;

        }else{
            $auth_user =  0;

        }
        return view('frontend.book')->with(compact('myBook','relpro','auth_user'));
    }

    public function search(Request $request){
        if($request->isMethod('post')){
            $cat_books = Book::where('author_name','LIKE','%'.$request->search.'%')
                                    ->orwhere('book_title','LIKE','%'.$request->search.'%')
                                    ->orwhere('category','LIKE','%'.$request->search.'%')
                                    ->orwhere('description','LIKE','%'.$request->search.'%')->paginate(5);
            $total = Book::where('author_name','LIKE','%'.$request->search.'%')
                                    ->orwhere('book_title','LIKE','%'.$request->search.'%')
                                    ->orwhere('category','LIKE','%'.$request->search.'%')
                                    ->orwhere('description','LIKE','%'.$request->search.'%')->count();
            return view('frontend.list_book')->with(compact('cat_books','total'));
        }
    }
    public function authors(){
        $authors = AdminAuthor::where('type','author')->with('books')->paginate(10);
        return view('frontend.authors')->with(compact('authors'));
    }
    public function author($id){
        $authorDetails = AdminAuthor::with('books')->where('id',$id)->first();
        $authorbooks = Book::where('email',$authorDetails->email)->paginate(3);
        return view('frontend.author')->with(compact('authorDetails','authorbooks'));
    }
    public function cart(){
        return view('frontend.cart');
    }
    public function rate(Request $request){
        if($request->isMethod('post')){
            
            $check = Rating::where(['book_id'=>$request['book_id'],'email'=>Auth::user()->email])->count();

            if($check > 0){
                return "You have already rated this book, thank you.";
            }else{
                $rate = new Rating;
    
                $rate->user = Auth::user()->first_name .' '.  Auth::user()->last_name;
                $rate->email = Auth::user()->email;
                $rate->book_title = $request['book_title'];
                $rate->book_id = $request['book_id'];
                $rate->rating = $request['rating'];
                $rate->image = Auth::user()->image;
                $rate->feedback = $request['feedback'];
                $rate->author_email = $request['author_email'];
    
                $rate->save();
                
                $getrate = Rating::where('book_id',$rate->book_id)->avg('rating');
    
                Book::where('id',$rate->book_id)->update(['rating'=>$getrate]);

                return "Your feedback and rating has been recorded, thank you";
            }
        }
    }

    public function getrate(Request $request,$id){
        $ratings = Rating::where('book_id',$id)->get();
        return $ratings;
    }

    //product vue functions

    public function getauthor($id){
        $book = Book::where('id',$id)->first();
        $author = AdminAuthor::where('email',$book->email)->first();
        return $author;
    }
    public function getbook($id){
        $book = Book::with('attributes')->where('id',$id)->first();

        return $book;
    }
    public function addCart(Request $request){
        $data = $request->all();
        $cart = new Cart;

        $cart->book_id = $data['book_id'];
        $cart->book_title = $data['book_title'];
        $cart->author = $data['author'];
        $cart->price = $data['price'];
        $cart->quantity = $data['quantity'];
        $cart->image = $data['image'];
        $cart->type = $data['type'];
        $cart->code = $data['code'];

        //using session data for add to cart initially

        // if(empty(Session::has('guestCart'))){
        //     $session = random_int(25000, 100000);

        //     Session::put('guestCart',$session);

        //     $cart->session = Session::get('guestCart');
        // }else{
        //     $cart->session = Session::get('guestCart');
        // }

        $cart->email = Auth::user()->email;
        $cart->save();

        return 1;

    }

    //cart page vue

    public function getCart(){
        // if(!Auth::check()){
        //     $cartitems = Cart::where('session',Session::get('guestCart'))->get();

        //     foreach($cartitems as $key=>$value){
        //         $ba = Book::where('id',$value->book_id)->first();

        //         if($value->type == "PaperBack"){
        //             $bookcount = $ba->paper_quantity;
        //         }elseif($value->type == "CD-Audio"){
        //             $bookcount = $ba->cd_quantity;
        //         }else{
        //             $bookcount = "";
        //         }

        //         $cartitems[$key]->tq = $bookcount;
        //     };

        //     return $cartitems;
        // }else{
        $cartitems  = Cart::where('email',Auth::user()->email)->get();

        foreach($cartitems as $key=>$value){
            $ba = Book::where('id',$value->book_id)->first();

            if($value->type == "PaperBack"){
                $bookcount = $ba->paper_quantity;
            }elseif($value->type == "CD-Audio"){
                $bookcount = $ba->cd_quantity;
            }else{
                $bookcount = "";
            }

            $cartitems[$key]->tq = $bookcount;
        };

        return $cartitems;
    }
    public function clearCart(){
        //initially using sesion for cart
        // if(!Auth::check()){
        //     Cart::where('session',Session::get('guestCart'))->delete();

        //     return 1;
        // }else{
        // }

        Cart::where('email',Auth::user()->email)->delete();

        return 1;
    }
    public function updateqty($id){
        $temp = Cart::where('code',$id)->first();
        Cart::where('code',$id)->update(['quantity'=>$temp->quantity + 1]);
    }
    public function redqty($id){
        $temp = Cart::where('code',$id)->first();
        Cart::where('code',$id)->update(['quantity'=>$temp->quantity - 1]);
    }
    public function putqty(Request $request){
        if($request->isMethod('post')){
            Cart::where('code',$request->id)->update(['quantity'=>$request->qty]);
        }
    }
    public function delitem($id){
        Cart::where('code',$id)->delete();
        return 1;
    }
    public function coupon($code){
        $count = Coupon::where('code',$code)->count();
        if($count == 0){
            return "This Coupon Code is Invalid";
        }else{
            $coupon = Coupon::where('code',$code)->first();

            if(time() < $coupon->expiry_date){
                return "This Coupon Code has expired";
            }else{
                return ['coupon_amount'=> $coupon->value, 'type' => $coupon->type];
            }
        }

    }
    public function user(){
        $user = User::where('email',Auth::user()->email)->first();
        return $user;
    }
    public function checkout(Request $request){
        if($request->isMethod('post')){

            Session::forget('orderId');

            $billing = $request->bill;
            $shipping = $request->ship;
            $items = $request->ordered_products;

            //post to order table

            $order = new Order;

            $order->user_id = Auth::user()->id;
            $order->first_name = $billing['first_name'];
            $order->last_name= $billing['last_name'];
            $order->city = $billing['city'];
            $order->zip_code = $billing['zipcode'];
            $order->state = $billing['state'];
            $order->country = $billing['country'];
            $order->address = $billing['address'];
            $order->phone = $billing['phone'];
            $order->email = $billing['email'];
            $order->coupon_code = $request['coupon_code'];
            $order->coupon_amount = $request['coupon_amount'];
            $order->grand_total = $request['grand_total'];
            $order->payment_method = $request['payment_method'];
            $order->quantity = $request['quantity'];
            $order->order_status= "New";
            $order->save();

            // last inserted id to be used in order products table

            $id = $order->id;


            //post to delivery

            $ship = new DeliveryAddress;

            $ship->user_id = Auth::user()->id;
            $ship->first_name = $shipping['first_name'];
            $ship->last_name = $shipping['last_name'];
            $ship->city = $shipping['city'];
            $ship->zip_code = $shipping['zipcode'];
            $ship->state = $shipping['state'];
            $ship->country = $shipping['country'];
            $ship->address = $shipping['address'];
            $ship->phone = $shipping['phone'];
            $ship->email = $shipping['email'];
            $ship->save();

            //post to order products table

            foreach($items as $item){

                $prod = new OrderProducts;

                $prod->user_id = Auth::user()->id;
                $prod->order_id = $id;
                $prod->book_id = $item['book_id'];
                $prod->author = $item['author'];
                $prod->book_title = $item['book_title'];
                $prod->type = $item['type'];
                $prod->quantity = $item['quantity'];
                $prod->code = $item['code'];
                $prod->price = $item['price'];

                $prod->save();
            }
            

            if(empty(Session::has('orderId'))){
                Session::put('orderId',$id);
            }

            if(empty(Session::has('payment_restriction'))){
                $somerandom = random_int(123456789, 999999999);
                Session::put('payment_restriction',$somerandom);
            }

            if($request['payment_method'] == "paypal"){
                return ["paypal" => "/paypal"];
            }

        }
    }
    public function paypal(){
        if(!empty(Session::has('payment_restriction'))){
            Session::forget('payment_restriction');
            return view('frontend.paypal');
        }else{
            return redirect('/cart');
        }
    }
    public function getorder(){
        $data = Order::where('email',Auth::user()->email)->latest()->first();
        return $data;
    }

    //wish list button vue

    public function addWish(Request $request){
        if($request->isMethod('post')){
            //run a check if already exists
            $checkBook = WishList::where(['book_id'=>$request->id,'email'=>Auth::user()->email])->count();

            if($checkBook > 0){
                return "Added to wishList";
            }else{

                $getBook = Book::where('id',$request->id)->first();
    
                $newwish = new WishList;
    
                $newwish->book_title = $getBook->book_title;
                $newwish->book_id = $request->id;
                $newwish->code = $getBook->code;
                $newwish->image = $getBook->image;
    
                if(!empty($request->type_from_product_page)){
                    $newwish->type = $request->type_from_product_page;
                }else{
                    $newwish->type = 'E-Book';
                }
    
                if(!empty($request->price_from_product_page)){
                    $newwish->price = $request->price_from_product_page;
                }else{
                    $newwish->price = $getBook->price;
                }
    
                $newwish->author = $getBook->author_name;

                //initially using session for wishlist

                // if(!empty(Session::has('guestCart'))){
                //     $newwish->session = Session::get('guestCart');
                // }else{
                //     $session = random_int(25000, 100000);
    
                //     Session::put('guestCart',$session);
    
                //     $newwish->session = $session;
                // };

                // if(Auth::check()){
                // }
                
                $newwish->email = Auth::user()->email;
                $newwish->save();

                return 1;
            }

        }

        // if(!Auth::check()){
        //     $wishlist = Wishlist::where('session',Session::get('guestCart'))->get();
        // }else{
        // }

        $wishlist = Wishlist::where('email',Auth::user()->email)->get();
        return $wishlist;
    }
    public function clearWish(){

        //initially using session for clear wishlist
        // if(!Auth::check()){
        //     WishList::where('session',Session::get('guestCart'))->delete();

        //     return 1;
        // }else{
        // }
        WishList::where('email',Auth::user()->email)->delete();

        return 1;
    }
}
