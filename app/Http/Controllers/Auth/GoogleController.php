<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;
use Auth;
use Exception;

use App\User;
use App\Role;

class GoogleController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('backend/home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('Dummy##@@123478')
                ]);
                // user role
                $role = Role::where('name', 'user')->first();
                $newUser->attachRole($role);
    
                Auth::login($newUser);
     
                return redirect('backend/home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
