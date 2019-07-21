<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Rating;
use App\User;
use App\Cart;
use App\Order;
use App\WishList;
use App\Newletter;

class UserController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $user = new User;

            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);

            $user->save();

            $messageInfo = [
                'name'=> $data['first_name'].' '.$data['last_name'],
                'email'=> $data['email']
            ];

            $email = $data['email'];

            Mail::send('emails.register', $messageInfo, function($message) use($email){
                $message->to($email)->subject('Registraion Successful with E-Library');
            });

            return back()->with('flash-message-s','Your account as been created! You can now log in');
        }
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']], true)){
                // if(!empty(Session::has('guestCart'))){
                //     Cart::where('session',Session::get('guestCart'))->update(['email'=>Auth::user()->email]);
                //     WishList::where('session',Session::get('guestCart'))->update(['email'=>Auth::user()->email]);
                // }
                Session::put('userLogin',$data['email']);
                //caling url in session from middleware userLogin
                if(!empty(Session::has('calling_url'))){
                    return redirect(Session::get('calling_url'));
                }else{
                    return redirect('/');
                }
                Session::forget('calling_url');
            }else{
                return back()->with('flash-message-e','You need to register to log in');
            }
        }
        if(!empty($request->server('HTTP_REFERER'))){
            if($request->server('HTTP_REFERER') != "http://127.0.0.1:8282/reg-login"){
                Session::put('calling_url',$request->server('HTTP_REFERER'));
            }
        }
        
        return view('frontend.reg_login');
    }
    public function logout(){
        Auth::logout();
        Session::forget('userLogin');
        Session::forget('calling_url');
        return redirect('/');
    }
    public function account(){
        if(Auth::check()){
            $user = User::where('email',Auth::user()->email)->first();
            return view('frontend.settings')->with(compact('user'));
        }else{
            abort(404);
        }
    }
    public function upadatepwd(Request $request){
        if($request->isMethod('post')){
            $oldpass = User::where(['email'=>Auth::user()->email])->first();
            if(Hash::check($request->old_pwd,$oldpass->password)){
                User::where(['email'=>Auth::user()->email])->update(['password'=>Hash::make($request->new_pwd)]);
                
                return 'Password Updated!';
            }else{
                return 'Old password provided Incorrect!';
            }
        }
    }
    public function upadateprofile(Request $request){
        if($request->isMethod('post')){
            $data = $request->form;

            $check_img = User::where('email',Auth::user()->email)->first();

            $name = $check_img->image;

            if($data['image'] != $name){
                $name = random_int(4444, 99999).'.'.explode('/', 
                explode(':',substr($data['image'],0, strpos($data['image'], ';')))[1])[1];
                Image::make($data['image'])->resize(30,30)->save(public_path('image/frontend_img/users/').$name);
                Image::make($data['image'])->resize(135,135)->save(public_path('image/frontend_img/users_medium/').$name);
    
                $old_photo = Auth::user()->image;
                if(!empty($old_photo)){
                    $old_photo_path = public_path('image/frontend_img/users/').$old_photo;
                    $old_photo_medium_path = public_path('image/frontend_img/users_medium/').$old_photo;
                    if(file_exists($old_photo_path)){
                        unlink($old_photo_path);
                    }
                    if(file_exists($old_photo_medium_path)){
                        unlink($old_photo_medium_path);
                    }
                }
                
                Rating::where('email',Auth::user()->email)->update(['image'=>$name]);
            }
            
            return User::where('email',Auth::user()->email)->update([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'city'=>$data['city'],
                'state'=>$data['state'],
                'zip_code'=>$data['zip_code'],
                'country'=>$data['country'],
                'address'=>$data['address'],
                'image'=>$name
            ]);
        }
    }
    public function getprofile($id){
        $profile = User::where('id',$id)->first();

        return $profile;
    }
    public function thanks(){
        $orderDetails = Order::with('ordered_items')->where('id',Session::get('orderId'))->first();
        $userDetails = User::where('email',Auth::user()->email)->first();
        $user_email = Auth::user()->email;
        $messageData = [
            'email'=>Auth::user()->email,
            'name'=>$orderDetails->first_name.' '.$orderDetails->last_name,
            'order_id' => $orderDetails->id,
            'orderDetails'=> $orderDetails,
            'userDetails'=> $userDetails
        ];
        Mail::send('emails.order',$messageData, function($message) use($user_email){
            $message->to($user_email)->subject('Your Order was Successfull');
        });

        Cart::where('email',Auth::user()->email)->delete();
        return view('frontend.payment_success');
    }
    public function error(){
        return redirect('/cart')->with('flash-message-e','Your payment was unsuccessful, please try again.');
    }
    public function newsletter(Request $request){
        if($request->isMethod('post')){
            $check = Newletter::where('email',$request->email)->count();
            if($check == 0){
                $news = new Newletter;
    
                $news->email = $request->email;
                $news->save();

                return 'Thank you for subscribing to our newsletter!';
            }else{
                return 'Your email already exists!';
            }
        }
    }

}
