<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->user();
        $findUser = User::where('google_id', $user->getId())->first();
        if($findUser){
            Auth::login($findUser); 
            if(strlen($findUser->nik) == 0){
                return redirect('/user/fillform');
            }
            return redirect('/homepage');
        } else {
            $create = User::create([
                'google_id' => $user->getId(),
                'picture_url' => $user->getAvatar(),
                'email' => $user->getEmail(),
                'nama' => $user->getName(),
            ]);
            Auth::loginUsingId($create->id);
            return redirect('/user/fillform');
        }
    }
}
