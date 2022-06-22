<?php
use Auth;
use Socialite;
use App\Models\User;
use DB;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirect($provider)
    {
     return \Socialite::driver($provider)->redirect();
    }
    public function Callback($provider){
       
        $userSocial =  \Socialite::driver($provider)->stateless()->user();
        $users= \DB::table('users')
        ->where('email',$userSocial->getEmail())->first();
        $users= \App\Models\User::where(['email' => $userSocial->getEmail()])->first();
        // $user=\App\Models\User::where('email',$userSocial->getEmail())->first();
        if($users){
        
            \Auth::login($users);
         
            return redirect('/user-home');
        }else{$user =\DB::table('users')->insert([
                'first_name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'profile_photo_path'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);         return redirect()->route('/user-home');
        }
}
}
