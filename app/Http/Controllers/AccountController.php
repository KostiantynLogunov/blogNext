<?php

namespace App\Http\Controllers;

use App\Entities\Article;
use App\Entities\Category;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index() {
        return view('firstPage', [
            'articles' => Article::orderBy('created_at','asc')->paginate(5),
            'categories' => Category::all(),
            'order' => 'asc',
            'home'=>'active'
        ]);
    }
}