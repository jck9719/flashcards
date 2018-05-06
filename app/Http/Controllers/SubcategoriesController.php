<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubcategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        clearSession($request);
    }

    public function index($cid, $sid)
    {
        $subcategory = Subcategory::with(['decks', 'users'])->findOrFail($sid);
        $decks = collect($subcategory->decks);
        $decks = $decks->filter(function($value, $key) {
            return $value['public'] == true || Auth::id() == $value['user_id'];
        });
        $decks = $decks->sortBy('public');
        $decks = $decks->all();

        $isSubcategoryEditor = false;
        $isSubcategorySuperEditor = false;

        foreach ($subcategory->users as $user)
            if(Auth::id() == $user->id) {
                $isSubcategoryEditor = true;
                if(Auth::user()->role_id == 2)
                    $isSubcategorySuperEditor = true;
            }

        return view('subcategories.subcategory', [
            'subcategory' => $subcategory,
            'decks' => $decks,
            'isSupEd' => $isSubcategorySuperEditor,
            'isEd' => $isSubcategoryEditor
            ]);
    }

    public function create($id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $category = Category::findOrFail($id);

        return view('subcategories.create', [
            'category' => $category
        ]);
    }

    public function store(Request $request, $id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $category = Category::findOrFail($id);

        $title = $request->input('title');
        $description = $request->input('description');
        $path = $request->file('image')->store('public');

        $subcategory = new Subcategory();
        $subcategory->name = $title;
        $subcategory->description = $description;

        $category->subcategories()->save($subcategory);

        return redirect('/category/' . $id);
    }

    public function update($cid, $sid)
    {
        if(!$this->isAdmin())
            redirect('/');

        $category = Category::findOrFail($cid);
        $subcategory = Subcategory::findOrFail($sid);

        return view('subcategories.update', [
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }

    public function put(Request $request, $cid, $sid)
    {
        if(!$this->isAdmin())
            redirect('/');

        $title = $request->input('title');
        $description = $request->input('description');
        $path = $request->file('image');

        $category = Category::findOrFail($cid);
        $subcategory = Subcategory::findOrFail($sid);
        $subcategory->name = $title;
        $subcategory->description = $description;

        $category->subcategories()->save($subcategory);

        return redirect('/category/' . $cid);
    }

    public function delete($cid, $sid)
    {
        if(!$this->isAdmin())
            redirect('/');

        $subcategory = Subcategory::findOrFail($sid);
        $subcategory->delete();

        return back();
    }

    private function isAdmin() {
        if(Auth::check() && Auth::user()->role_id == 1)
            return true;
        return false;
    }
}
