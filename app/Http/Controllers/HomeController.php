<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $validate = false;
        if($validate){
            return view('log.log_home');
        }else{
            return view('welcome');
        }
    }    
}
