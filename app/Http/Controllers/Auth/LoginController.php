<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }


    // public function redirectToProvider()
    // {
    //     return Socialite::driver('github')->redirect();
    // }

    // public function redirectToGoogleProvider()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // /**
    //  * Obtain the user information from GitHub.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    // public function handleGoogleProviderCallback()
    // {
    //     $user = Socialite::driver('google')->stateless()->user();
    //     $this->CreateUser($user);
        

    //     //   dd($user);
    //     // $user->token;
    // }
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();
        $this->CreateUser($user,$service);
        

        //  dd($user);
        // $user->token;
    }

    public function CreateUser($user,$service)
    {
        $loggedusers=User::where('email',$user->email)->first();
        if(!$loggedusers)
        {   
            if($service === 'github'){
           $loggedusers=User::create([
                'name'=>$user->nickname,
                //this should be $user->name for google login 
                // 'name'=>$user->name,
                'email'=>$user->email,
                'remember_token'=>$user->token,
                'password'=>"null"
            ]); }

            else{

                $loggedusers=User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'remember_token'=>$user->token,
                    'password'=>"null"
                ]); 

            }
            Auth::login($loggedusers);
            return redirect()->route('posts.index');
        }
        else
        {
            Auth::login($loggedusers);
            return redirect()->route('posts.index');
        }
    }

    
}
