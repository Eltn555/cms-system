<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 1) {
            return redirect('/admin');
        }elseif(Session::has('previousUrl')) {
            // Redirect the user back to the stored URL
            return redirect(Session::get('previousUrl'));
        }

        // If no previous URL is stored, redirect to the default location
        return redirect($this->redirectTo);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^\+\d{1,3}\d{5,15}$/',
            'password' => 'required|string',
        ], [
            'phone.required' => 'Введите номер телефона, пожалуйста',
            'phone.regex' => 'Неверный формат номера телефона',
            'password.required' => 'Введите пароль, пожалуйста',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only('phone', 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'password' => 'Неправильный номер телефона или пароль',
        ]);
    }
}
