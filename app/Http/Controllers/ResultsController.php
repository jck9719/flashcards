<?php

namespace flashcards\Http\Controllers;

use flashcards\Result;
use flashcards\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    public function index()
    {
        if(Auth::id() == null)
            return redirect('/');
        $user = User::find(Auth::id());
        $results = Result::all();
        $rCount = count($results);
        $rAverage = $results->reduce(function ($carry, $item) {
            return $carry + $item['percentage'];
        });
        if($rCount > 0)
            $rAverage /= $rCount;
        else $rAverage = 0;

        return view('results.index', [
            'user' => $user,
            'average' => $rAverage
        ]);
    }
}
