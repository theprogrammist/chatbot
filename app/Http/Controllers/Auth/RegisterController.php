<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
     * Where to redirect users after login / registration.
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
        $this->middleware('guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
//            'birthdate' => 'required|date|before:today' //http://stackoverflow.com/questions/27624559/laravel-before-today-rule-how-to-do
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $confirmation_code = str_random(60);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'lastname' => $data['lastname'],
//            'birthdate' => date("Y-m-d", strtotime($data['birthdate'])),
            'confirmation_code' => $confirmation_code
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        //return $this->registered($request, $user) ?: redirect($this->redirectPath());

        Mail::send('auth.passwords.verify', ['confirmation_code' => $user->confirmation_code], function($message) use ($user) {
            $message->to($user->email, $user->username)
                ->subject('Подтверждение адреса электронной почты');
        });

        return redirect('/register/success');
    }

    public function confirm($confirmationCode = false)
    {
        if (!$confirmationCode) {
            return view('auth.register-success-confirmation')
                ->with('resultClass', 'red')
                ->with('resultMessage', 'Не указан код подтверждения');
        }

        $user = User::whereConfirmationCode($confirmationCode)->first();

        if (!$user) {
            return view('auth.register-success-confirmation')
                ->with('resultClass', 'red')
                ->with('resultMessage', 'Неправильный код подтверждения');
        }

        if ($user->confirmed) {
            return view('auth.register-success-confirmation')
                ->with('resultClass', 'green')
                ->with('resultMessage', 'Ваша электронная почта уже была успешно подтверждена.');
        }

        $user->confirmed = 1;
        //$user->confirmation_code = null;
        $user->save();

        $this->guard()->login($user);

        return view('auth.register-success-confirmation')
            ->with('resultClass', 'green')
            ->with('resultRedirect', '/home')
            ->with('resultMessage', 'Ваша электронная почта успешно подтверждена. Через 5 секунд вы будете перенаправлены на страницу вашего профиля.');

        //return Redirect::route('login_path');
    }
}