<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }

        $email = $request->email;
        $password = $request->password;
        $isAuth = $request->has('remember') ? true: false;
        $objUser = $this->create(['email'=>$email, 'password'=>$password]);
        $token = User::where('email',$email)->first()->token;


        if (!($objUser instanceof User)) {
            return back()->with('error', 'Cant create object ofuser');
        }

        if ($isAuth) {
            $this->guard()->login($objUser);
        }

        Mail::to($email)->send(new ConfirmEmail($email, $token));
        return redirect(route('welcome.index'))->with('success', 'You registered, please confirm your email and then login');
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
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Entities\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(30)
        ]);
    }
}
