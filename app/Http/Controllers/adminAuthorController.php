<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;
use App\AdminAuthor;

class adminAuthorController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $author = new AdminAuthor;

            $author->first_name = $data['first_name'];
            $author->last_name = $data['last_name'];
            $author->email = $data['email'];
            $author->password = Hash::make($data['password']);

            $author->save();

            return redirect('/author')->with('flash-message-s','Your account is ready, please login');

        }
        return view('admin.author_register');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            Session::forget('authorLogin');

            $data = $request->all();

            // $checkuser = AdminAuthor::where(['email'=>$data['email'],'password'=>Hash::make($data['password'])])->count();

            // dd($checkuser);
            // if($checkuser > 0){

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/author/dashboard');
            }else{
                return back()->with('flash-message-e','You are not authorized to view this page');
            }
        }
        return view('admin.admin_login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function profile(Request $request){
        $author = AdminAuthor::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.profile.view_profile')->with(compact('author'));
    }
    public function editprofile(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            if($request->hasFile('image')){
                $temp_img = Input::file('image');
                if($temp_img->isValid()){
                    $extension = $temp_img->getClientOriginalExtension();
                    $file_name = random_int(1111,9999).'.'.$extension;
    
                    $profile_img_path = 'image/backend_img/profile/'.$file_name;

                    //check if there is a previous image and delete

                    $author = AdminAuthor::where('email',Session::get('authorLogin'))->first();
                    if(!empty($author->image)){
                        if(file_exists('image/backend_img/profile/'.$author->image)){
                            unlink('image/backend_img/profile/'.$author->image);
                        }
                    }


                    Image::make($temp_img)->resize(300,300)->save( $profile_img_path);
                } 
            }

            AdminAuthor::where(['email'=>Auth::guard('admin')->user()->email])->update(['first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'phone_number'=>$data['phone_number'],'bio'=>$data['bio'],
                                'image'=>$file_name,'facebook'=>$data['facebook'],'twitter'=>$data['twitter'],'linkedin'=>$data['linkedin']]);

            return redirect('author/view-profile')->with('flash-message-s','Profile information updated successfully');
        }
        $author = AdminAuthor::where('email',Session::get('authorLogin'))->first();
        return view('admin.profile.edit_profile')->with(compact('author'));
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/author')->with('flash-message-s','You have logged out successfully');
    }
}
