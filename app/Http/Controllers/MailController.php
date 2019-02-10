<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function basic_mail(Request $request) {
    	$data = array('name'=>$request['name']);
    	$email=$request['email'];

    	Mail::send('mail.sendMail',$data,function( $message ) use($email){
    		$message->to($email,'Infidata')->subject
    		('Welcome to infiData');
    		    	});

    	$data1 = array('name'=>$request['name'], 'message1'=>$request['message'],'email'=>$request['email']);
    	

    	Mail::send('mail.adminMail',$data1,function( $message ) {
    		$message->to("suryashankhi88@gmail.com",'Infidata')->subject
    		('Message form');
    		    	});




    	return redirect()->back()->withErrors(['we will get back soon']);
    }
}
