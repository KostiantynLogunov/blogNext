<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
    //
    public function index() {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function addCategory() {

        return view('admin.categories.add');
    }

    public function addRequestCategory(Request $request) {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25'
            ]);
            Category::create($request->except('_token'));
            return back()->with('success', 'Category added succesely');
        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }

    }


    public function editCategory($id) {
        $category = Category::find($id);
        if (!$category) {
            return abort(404);
        }
        return view('admin.categories.edit', ['category'=>$category]);
    }

    public function editSave(Request $request, $id) {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25',
                'description' => 'string'
            ]);
            $category = Category::find($id);
            if (!$category) {
                return abort(404);
            }
            $category->title = $request->title;
            $category->description = $request->description;

            if ($category->save()) {
                return redirect(route('categories'))->with('success', 'Category added succesely');
            }

            return back()->with('error', 'Some error of edit category');
        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteCategory(Request $request) {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $category = Category::find($id);
            $category->delete();
            echo "SUCCESS";
        }
    }
}
