<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Forum;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('level', 2)->limit(6)->get();
        $forum = Forum::where('replied_to', null)->orderBy('view_count', 'desc')->orderBy('upvote_count', 'desc')->orderBy('created_at', 'desc')->limit(6)->get();
        $layanan = Layanan::limit(6)->get();
        $permohonan = Permohonan::limit(6)->get();
        return view('admin.index', ['page' => 'home', 'user' => $user, 'forum' => $forum, 'layanan' => $layanan, 'permohonan' => $permohonan]);
    }
}
