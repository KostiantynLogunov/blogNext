<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Auth;

class AccountController extends Controller
{
    public function index() {

        return view('admin.index');
    }
}