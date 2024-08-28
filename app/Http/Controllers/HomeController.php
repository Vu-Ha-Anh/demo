<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function sendmail(){
        $name="Vũ Hà Anh";
        Mail::send('Email.test',compact('name'),function($email) use ($name){
            $email->to('vuhaanh2k5.hh@gmail.com',$name)->subject("Gửi mail từ web");
        });
        echo 'Gửi mail thành công';
        

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Lienhe(){
        return view('Email/contact');
    }
    public function GuiLienhe(Request $request){
        $name=$request['name'];
        $email=$request['email'];
        $message=$request['message'];
        
        Mail::to('vuhaanh2k5.hh@gmail.com')->send(new ContactMail($name,$email,$message));
        return redirect()->back()->with('ok','Gửi mail thành công');
    }
    public function index()
    {
        return view('home');
    }
}
