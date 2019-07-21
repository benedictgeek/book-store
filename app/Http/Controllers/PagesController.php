<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;

class PagesController extends Controller
{
    public function contact(Request $request){
        if($request->isMethod('post')){
            $inquiry = new Inquiry;

            $inquiry->name = $request['first_name'].' '.$request['last_name'];
            $inquiry->subject = $request['subject'];
            $inquiry->inquiry = $request['inquiry'];
            $inquiry->email = $request['email'];

            $ref = random_int(20000,100000);

            $inquiry->refrence_id = $ref;
            $inquiry->status = 'pending';

            $inquiry->save();

            return 'Your message has been sent successfully';
        }

        return view('frontend.contact');
    }
}
