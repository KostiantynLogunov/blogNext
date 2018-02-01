<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Mail\MailClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index() {

        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function sendMsg(Request $request, $id) {

        $user = User::find($id);

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'text' => 'required|string|min:6'
            ]);
            $mail = $user->email;
            $text = $request->text;
            Mail::to($mail)->send(new MailClass($mail, $text));

            return redirect(route('users'));
        }

        return view('admin.users.sending', [
            'user' => $user
        ]);
    }

    public function delete(Request $request) {
        $user = User::find($request->id);
        $user->delete();
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }
}
