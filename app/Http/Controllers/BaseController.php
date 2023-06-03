<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
    public function checkSessionExpiration(){
        if(!Auth::check()){
            return Redirect::to('/');
        }
    }

}
