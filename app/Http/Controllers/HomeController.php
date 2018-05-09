<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;



class HomeController extends Controller
{

    public function __construct(Request $request)
    {
        clearSession($request);
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
