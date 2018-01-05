<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationData;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        try {
            $this->validate($request, [
                'email'=>'required|min:3|max:100',
                'password'=>'required|min:6'
            ]);
            if (! User::where('email', $request->email)->first()->confirm) {
                return back()->with('error', trans('please confirm your email'));
            }
            $remember = $request->has('remember') ? true : false;
            if (Auth::attempt(['email'=> $request->email, 'password'=>$request->password], $remember)) {
                return redirect(route('welcome.index'))->with('success', trans('messages.auth.successLogin'));
            }
            return back()->with('error', trans('messages.auth.errorLogin'));

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', trans('messages.auth.errorLogin'));
        }
    }

    public function confirmaion($token) {
        if($user = User::where('token', $token)->first()){
            if ($user->confirm) {
                return redirect(route('login'))->with('success', trans('You confirmed your email ALREADY. Please login!'));
            }
            $user->confirm = 1;
            $user->token = null;
            if ($user->save()) {
                return redirect(route('login'))->with('success', trans('Thanx for confirmations  your email. Please login!'));
            }
            else abort(404);
        }
        else abort(404);
    }

    public function ulogin(Request $request) {
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $userData = json_decode($data, TRUE);

        $network = $userData['network'];
        $user = User::where('email', $userData['email'])->first();

        if (isset($user->id)) {

            if ($user->confirm) {
                Auth::loginUsingId($user->id);
            } else {
                Mail::to($user->email)->send(new ConfirmEmail($user->email, $user->token));
                return redirect(route('welcome.index'))->with('success', 'You registered, please confirm your email and then login');
            }
            return Redirect::back();
        } else {
            // Create new user in DB
            $newUser = User::create([
                'name' => $userData['first_name'] . ' ' . $userData['last_name'],
                'email' => $userData['email'],
                'password' => Hash::make(str_random(8)),
                'confirm' => 1,
                'from_network' => $network,
                'ip' => $request->ip()
            ]);

            Auth::loginUsingId($newUser->id, TRUE);
            return redirect(route('welcome.index'))->with('success', 'You are login !');
        }
    }
}
