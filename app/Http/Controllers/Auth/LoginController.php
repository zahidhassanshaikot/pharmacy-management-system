<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('Admin')) {
          return redirect('/');
            // return redirect('emp.dashboard');
        } else if ($user->hasRole('Super Admin')){

            return redirect('/');
        } else if ($user->hasRole('Manager')){

            return redirect('/');
        } else if ($user->hasRole('Sells Man')){

            return redirect('/');

        }else{
            $request->session()->invalidate();
            return redirect('/login');
        }
    }



    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
