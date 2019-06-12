<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // exit("MC");
        $this->middleware('guest')->except('logout');
    }

    // public function login (Request $request) {
    //     $credenciais = $request->only('email', 'password');
    //     var_dump($credenciais);

    //     $user = 'nome';

    //     $this->validateCredentials($user, $credenciais);

    //     if (Auth::attempt($credenciais)) {
    //         return redirect('/home');
    //     }
    // }

    // protected function guard()
    // {
    //     // var_dump(Auth::guard('customcs'));
    //     // exit("Guard");
    //     return Auth::guard('customcs');
    // }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        exit("VC");
        // $plain = $credentials['password'];
        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
