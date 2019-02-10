<?php

namespace App\Http\Controllers;
use App\First_table;
use Illuminate\Http\Request;

class FirstController extends Controller
{
        public function insertContents() {
    	first_table::create([
    		'name' =>'abc',
    		'email' => 'abc@gmail.com',
    		'password' => 'asdf',


    	]);
    	return view('test');
    }
}
