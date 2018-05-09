<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{

    public function __construct(Request $request)
    {
    if(! function_exists('clearSession')) {
    function clearSession(\Illuminate\Http\Request $request) {
        $request->session()->pull('words');
        $request->session()->pull('language1');
        $request->session()->pull('language2');
        $request->session()->pull('isFirstLanguage');
        $request->session()->pull('wordsCount');
        $request->session()->pull('pointedWordsCount');
        $request->session()->pull('wrongWords');
        clearSession($request);
    }
    }
    }



    public function home(Request $request)
    {
        $request->session()->pull('words', '');
        $categories = Category::all();

        return view('welcome', ['categories' => $categories]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('home', ['categories' => $categories]);
    }
}
