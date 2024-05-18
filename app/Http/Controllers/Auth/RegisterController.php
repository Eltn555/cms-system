<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    protected function registered(Request $request, $user)
    {
        // Check if there's a previous URL stored in the session
        if (Session::has('previousUrl')) {
            // Redirect the user back to the stored URL
            return redirect(Session::get('previousUrl'));
        }

        // If no previous URL is stored, redirect to the default location
        return redirect($this->redirectTo);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^\d{8,15}$/', Rule::unique('users')->whereNull('deleted_at'),],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required' => 'Введите ваше имя',
            'phone.required' => 'Введите номер телефона, пожалуйста',
            'phone.regex' => 'Неверный формат номера телефона',
            'password.required' => 'Введите пароль, пожалуйста',
            'phone.unique' => 'Аккаунт с этим номером телефона уже существует',
            'password.min' => 'Пароль должен содержать не менее 8 символов ',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
        ]);

    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $phone = isset($data['phone']) ? substr($data['phone'], -9) : null;

        return User::create([
            'name' => $data['name'],
            'phone' => '+998'.$phone,
            'password' => Hash::make($data['password']),
        ]);
    }
}
