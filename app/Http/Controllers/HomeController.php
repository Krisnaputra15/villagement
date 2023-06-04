<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Layanan;
use App\Models\Forum;
use DateTime;
use DateInterval;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            $layanan = Layanan::limit(6)->get();
            $date = new DateTime(date('Y-m-01'));
            $forum = Forum::where('replied_to', null)->whereRaw('created_at between ? and ?', [$date->format('Y-m-d H:i:s'), $date->add(new DateInterval('P30D'))->format('Y-m-d H:i:s')])
                          ->orderBy('view_count', 'desc')->limit(5)->get();
            return view('homepage', ['forum' => $forum, 'layanan' => $layanan, 'page' => 'home']);
        }
        return view('index', ['page' => 'home']);
    }
}
