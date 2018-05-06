<?php
if (! function_exists('clearSession')) {
    function clearSession(\Illuminate\Http\Request $request) {
        $request->session()->pull('words');
        $request->session()->pull('language1');
        $request->session()->pull('language2');
        $request->session()->pull('isFirstLanguage');
        $request->session()->pull('wordsCount');
        $request->session()->pull('pointedWordsCount');
        $request->session()->pull('wrongWords');
    }
}