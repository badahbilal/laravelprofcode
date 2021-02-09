<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecondController extends Controller
{

   public function __construct()
   {
       $this->middleware("auth")->except('showString2');
   }

    public function showString0(){

        return 'Second controller 0';
    }

    public function showString1(){

        return 'Second controller 1';
    }

    public function showString2(){

        return 'Second controller 2';
    }

    public function showString3(){

        return 'Second controller 3';
    }

}
