<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        clearSession($request);
    }

    public function index($id)
    {
        $category = Category::with('subcategories')->findOrFail($id);
        return view('categories.category', [
            'category' => $category]);
    }

    public function list()
    {
        $categoryList = Category::all();
        return view('cats', [
            'cats' => $categoryList]);
    }

    public function create()
    {
        if(!$this->isAdmin())
            redirect('/');

        return view('categories.create');
    }

    public function store(Request $request)
    {
        if(!$this->isAdmin())
            redirect('/');

        $title = $request->input('title');
        $description = $request->input('description');

        $category = new Category();
        $category->name = $title;
        $category->description = $description;

        $category->save();

        return redirect('/');
    }

    public function update($id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $category = Category::findOrFail($id);

        return view('categories.update', [
            'category' => $category
        ]);
    }

    public function put(Request $request, $id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $title = $request->input('title');
        $description = $request->input('description');

        $category = Category::findOrFail($id);
        $category->name = $title;
        $category->description = $description;
        
        $category->save();

        return back();
    }

    public function delete($id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $category = Category::findOrFail($id);
        $category->delete();

        return back();
    }

    private function isAdmin() {
        if(Auth::check() && Auth::user()->role_id == 1)
            return true;
        return false;
    }
}
