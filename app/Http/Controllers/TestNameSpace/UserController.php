<?php

namespace App\Http\Controllers\TestNameSpace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showAdmin(){
        return "admin bilal badah from TestNameSpace";
    }
}
