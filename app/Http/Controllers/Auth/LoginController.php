<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = '/superadmin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo(){
        if(Auth::check()){
            switch (Auth::user()->role_id) {
                case 1:
                return '/superadmin';
                break;

            case 2:
                return '/patient';
                break;
            
            case 3:
                return '/doctor';
                break;

            case 4:
                return '/word_admin';
                break;
            case 5:
                return '/pharmacy_admin';
                break;
            case 6:
                return '/counter_admin';
                break;
            case 7:
                return '/lab_admin';
                break;
            default:
                return abort(404);
                break;
            }
        }
    }
}
