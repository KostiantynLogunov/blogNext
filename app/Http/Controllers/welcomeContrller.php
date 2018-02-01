<?php

namespace App\Http\Controllers;

use App\Entities\Article;
use App\Entities\Category;
use App\Entities\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class welcomeContrller extends Controller
{
    public function index(Request $request) {

        if ($request->isMethod('post')) {
            if ($request->category_id) {
                return view('firstPage', [
//                    'articles' => Article::orderBy('created_at','desc')->where('category_id',$request->category_id)->get(),
                    'articles' => Article::orderBy('created_at','desc')->where('category_id',$request->category_id)->paginate(5),
                    'categories' => Category::all(),
                    'order' => 'desc',
                    'home'=>'active'
                ]);
            }
            return view('firstPage', [
//                'articles' => Article::orderBy('created_at','desc')->get(),
                'articles' => Article::orderBy('created_at','desc')->paginate(5),
                'categories' => Category::all(),
                'order' => 'desc',
                'home'=>'active'
            ]);
        }

        return view('firstPage', [
//            'articles' => Article::orderBy('created_at','asc')->get(),
            'articles' => Article::orderBy('created_at','asc')->paginate(5),
            'categories' => Category::all(),
            'order' => 'asc',
            'home'=>'active'
        ]);
    }

    public function show($id) {
        return view('onceArticle', [
            'article' => Article::find($id),
            'categories' => Category::all(),
            'comments' => Comment::where('article_id',$id)->orderBy('created_at','desc')->get(),
            'home'=>'active'
        ]);
    }

    public function saveComment(Request $request, $article_id) {
        $this->validate($request, [
            'text'=>'required|string|min:4'
        ]);

        Comment::create([
            'article_id' => $article_id,
            'user_id' => Auth::user()->id,
            'text'  => $request->text
        ]);
        return redirect()->back();
    }

    public function about() {
        return view('about', [
            'categories' => Category::all(),
            'about'=> 'active'
        ]);
    }

    public function comments() {
        return view('comments', [
            'categories' => Category::all(),
            'comments' => Comment::orderBy('article_id')->get(),
            'coment'=>'active'
        ]);
    }
}
