<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.add', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' =>'required|min:3|string',
           'category_id' => 'required',
           'short_text' =>'required|min:3|string',
           'full_text' =>'required|min:3|string',
           'author' =>'required|min:3|string',
        ]);

        Article::create($request->except('_token'));

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.articles.edit', [
            'article' => Article::find($id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required|min:3|string',
            'category_id'=>'required',
            'short_text' =>'required|min:3|string',
            'full_text' =>'required|min:3|string',
            'author' =>'required|min:3|string',
        ]);
        $article = Article::find($id);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->short_text = $request->short_text;
        $article->full_text = $request->full_text;
        $article->author = $request->author;
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
