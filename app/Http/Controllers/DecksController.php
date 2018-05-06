<?php

namespace App\Http\Controllers;

use App\Deck;
use App\Language;
use App\Result;
use App\Subcategory;
use Illuminate\Http\Request;
use \DB;
use Illuminate\Support\Facades\Auth;

class DecksController extends Controller
{
    public function index(Request $request, $id)
    {
        clearSession($request);
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);

        return view('decks.deck', [
            'deck' => $deck
        ]);
    }

    public function preview($id)
    {
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);

        $words = json_decode($deck->words, true);

        return view('decks.preview', [
            'deck' => $deck,
            'words' => $words
        ]);
    }

    public function learnOnce(Request $request, $id, $l1, $l2)
    {
        clearSession($request);
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);
        $langToLearn = Language::findOrFail($l1);
        $langToCheck = Language::findOrFail($l2);

        $wordsArr = json_decode($deck->words, true);
        shuffle($wordsArr);
        $words = array();
        foreach ($wordsArr as $word) {
            array_push($words, $word[$langToLearn['code']]);
        }

        return view('decks.learn-once', [
            'deck' => $deck,
            'words' => $words,
            'langToLearn' => $langToLearn,
            'langToCheck' => $langToCheck
        ]);
    }

    public function resultOnce(Request $request, $id, $l1, $l2)
    {
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);
        $lang2 = Language::findOrFail($l2);
        $lang1 = Language::findOrFail($l1);
        $words = json_decode($deck->words, true);

        $wordsToCheckArr = array_combine(
            $request->input($lang1['code']),
            $request->input($lang2['code'])
        );
        $wordsToCheck = $this->generateWordsArray($wordsToCheckArr, $lang1, $lang2);

        $missedWords = $this->getMissedWords($words, $wordsToCheck, $lang2);

        return view('decks.result-once', [
            'deck' => $deck,
            'words' => $missedWords,
            'lan1' => $lang1,
            'lan2' => $lang2
        ]);
    }

    public function learnMulti(Request $request, $id, $l1, $l2)
    {
        clearSession($request);
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);
        $langToLearn = Language::findOrFail($l1);
        $langToCheck = Language::findOrFail($l2);

        $words = json_decode($deck->words, true);
        shuffle($words);

        return view('decks.learn-multi', [
            'deck' => $deck,
            'words' => $words,
            'langToLearn' => $langToLearn,
            'langToCheck' => $langToCheck
        ]);
    }

    public function resultMulti(Request $request, $id, $l1, $l2)
    {
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);
        $lang2 = Language::findOrFail($l2);
        $lang1 = Language::findOrFail($l1);

        $words = $request->session()->pull('words', json_decode($deck->words, true));

        $wordsToCheckArr = array_combine(
            $request->input($lang1['code']),
            $request->input($lang2['code'])
        );

        $wordsToCheck = $this->generateWordsArray($wordsToCheckArr, $lang1, $lang2);

        $missedWords = $this->getMissedWords($words, $wordsToCheck, $lang2);

        if (empty($missedWords)) {
            $request->session()->pull('words');
            return view('decks.result-multi', [
                'deck' => $deck,
            ]);
        } else {
            $request->session()->put('words', $missedWords);
            return view('decks.learn-multi', [
                'deck' => $deck,
                'words' => $missedWords,
                'langToLearn' => $lang1,
                'langToCheck' => $lang2
            ]);
        }
    }

    public function testKnowledgeStart(Request $request, $id)
    {
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);
        $langToLearn = $deck->language1;
        $langToCheck = $deck->language2;

        $words = json_decode($deck->words, true);

        $request->session()->put('words', $words);
        $request->session()->put('language1', $langToLearn);
        $request->session()->put('language2', $langToCheck);
        $request->session()->put('isFirstLanguage', true);
        $request->session()->put('wordsCount', count($words) * 2);
        $request->session()->put('pointedWordsCount', 0);
        $request->session()->put('wrongWords', array());

        return view('decks.test-start', [
            'deck' => $deck,
            'langToLearn' => $langToLearn,
            'langToCheck' => $langToCheck
        ]);
    }

    public function testKnowledge(Request $request, $id)
    {
        $deck = Deck::with(['language1', 'language2'])->findOrFail($id);
        $langToLearn = $request->session()->get('language1');
        $langToCheck = $request->session()->get('language2');
        $isFirstLanguage = $request->session()->get('isFirstLanguage');
        $words = $request->session()->get('words');


        $checkedAgainst = $request->session()->get('checkedWord', 'xxxxx');
        if (($wordToCheck = $request->input($langToCheck['code'])) != null) {
            $this->addPoints($request, $wordToCheck, $checkedAgainst);
        }


        if ($isFirstLanguage && count($words) == 0) {
            $words = json_decode($deck->words, true);
            $request->session()->put('isFirstLanguage', false);
            $request->session()->put('words', $words);
            $request->session()->put('language1', $langToCheck);
            $request->session()->put('language2', $langToLearn);
            $langToLearn = $request->session()->get('language1');
            $langToCheck = $request->session()->get('language2');
        } else if (!$isFirstLanguage && count($words) == 0) {
            $pointedWordsCount = $request->session()->pull('pointedWordsCount');
            $allWordsCount = $request->session()->pull('wordsCount');
            $wrongWords = $request->session()->pull('wrongWords');
            if (Auth::id()) {
                $result = new Result();
                $result->user_id = Auth::id();
                $result->deck_id = $deck->id;
                $result->percentage = $pointedWordsCount / $allWordsCount;
                $result->save();
            } else {
                $result = [
                    'percentage' => $pointedWordsCount / $allWordsCount
                ];
            }

            return view('decks.test-result', [
                'wrongs' => $wrongWords,
                'result' => $result,
                'deck' => $deck
            ]);
        }


        shuffle($words);

        $word = array_pop($words);
        $request->session()->put('words', $words);
        $request->session()->put('checkedWord', $word[$langToCheck['code']]);

        return view('decks.test', [
            'deck' => $deck,
            'langToLearn' => $langToLearn,
            'langToCheck' => $langToCheck,
            'word' => $word
        ]);
    }

    public function newDeck($cid, $sid)
    {
        $subcategory = Subcategory::findOrFail($sid);
        $languages = Language::all();

        $isSubcategoryEditor = false;

        if (Auth::id() != null) {
            foreach ($subcategory->users as $user)
                if (Auth::id() == $user->id) {
                    $isSubcategoryEditor = true;
                }

            if (Auth::user()->role_id == 1) $isSubcategoryEditor = true;
        }

        return view('decks.create', [
            'subcategory' => $subcategory,
            'languages' => $languages,
            'isSubcategoryEditor' => $isSubcategoryEditor
        ]);
    }

    public function add(Request $request, $cid, $sid)
    {
        $subcategory = Subcategory::findOrFail($sid);
        $language1 = Language::findOrFail($request->input('language1'));
        $language2 = Language::findOrFail($request->input('language2'));
        $arr1 = $request->input('lang1');
        $arr2 = $request->input('lang2');
        $visibility = $request->input('visibility');
        $wordsArr = $this->newWordsArray($arr1, $arr2, $language1, $language2);
        $isSubcategoryEditor = false;
        $name = $request->input('name');

        foreach ($subcategory->users as $user)
            if (Auth::id() == $user->id) {
                $isSubcategoryEditor = true;
            }
        if (Auth::user()->role_id == 1) $isSubcategoryEditor = true;

        $isPublic = $visibility == 'public' && $isSubcategoryEditor ? true : false;

        $deck = new Deck();
        $deck->words = json_encode($wordsArr);
        $deck->name = $name;
        $deck->public = $isPublic;
        $deck->user_id = Auth::id();
        $deck->language1_id = $language1->id;
        $deck->language2_id = $language2->id;
        $deck->subcategory_id = $subcategory->id;
        $deck->save();

        return redirect('/category/' . $cid . '/subcategory/' . $sid);
    }

    public function delete(Request $request, $id)
    {
        $deck = Deck::findOrFail($id);
        $subcategory = Subcategory::findOrFail($deck->subcategory_id);

        $isSubcategorySuperEditor = false;

        foreach ($subcategory->users as $user)
            if(Auth::id() == $user->id)
                if(Auth::user()->role_id == 2)
                    $isSubcategorySuperEditor = true;

        if(Auth::id() == $deck->user_id ||
            Auth::user()->role_id == 1 ||
            $isSubcategorySuperEditor
        ) {
            $deck->delete();
        }

        return back();
    }

    public function edit($id)
    {
        $deck = Deck::findOrFail($id);
        $subcategory = Subcategory::findOrFail($deck->subcategory_id);
        $languages = Language::all();
        $words = json_decode($deck->words, true);

        $isSubcategoryEditor = false;
        $isSubcategorySuperEditor = false;

        foreach ($subcategory->users as $user)
            if(Auth::id() == $user->id) {
                $isSubcategoryEditor = true;
                if(Auth::user()->role_id == 2)
                    $isSubcategorySuperEditor = true;
            }

        if(Auth::id() == $deck->user_id ||
            Auth::user()->role_id == 1 ||
            $isSubcategorySuperEditor ||
            $isSubcategoryEditor
        ) {
            return view('decks.edit', [
                'deck' => $deck,
                'subcategory' => $subcategory,
                'languages' => $languages,
                'words' => $words,
                'isSubcategoryEditor' => $isSubcategoryEditor
            ]);
        } else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $deck = Deck::findOrFail($id);
        $subcategory = Subcategory::findOrFail($deck->subcategory_id);
        $language1 = Language::findOrFail($request->input('language1'));
        $language2 = Language::findOrFail($request->input('language2'));
        $arr1 = $request->input('lang1');
        $arr2 = $request->input('lang2');
        $visibility = $request->input('visibility');
        $wordsArr = $this->newWordsArray($arr1, $arr2, $language1, $language2);
        $isSubcategoryEditor = false;
        $name = $request->input('name');

        $isSubcategoryEditor = false;
        $isSubcategorySuperEditor = false;

        foreach ($subcategory->users as $user)
            if(Auth::id() == $user->id) {
                $isSubcategoryEditor = true;
                if(Auth::user()->role_id == 2)
                    $isSubcategorySuperEditor = true;
            }

        if(Auth::id() == $deck->user_id ||
            Auth::user()->role_id == 1 ||
            $isSubcategorySuperEditor ||
            $isSubcategoryEditor
        ) {

        } else {
            return back();
        }

        $isPublic = $visibility == 'public' && $isSubcategoryEditor ? true : false;


        $deck->words = json_encode($wordsArr);
        $deck->name = $name;
        $deck->public = $isPublic;
        $deck->user_id = Auth::id();
        $deck->language1_id = $language1->id;
        $deck->language2_id = $language2->id;
        $deck->subcategory_id = $subcategory->id;
        $deck->save();

        return redirect('/category/' . $subcategory->id . '/subcategory/' . $subcategory->category->id);
    }

    private function newWordsArray($arr1, $arr2, $lang1, $lang2)
    {
        $generatedArray = array();

        for ($i = 0; $i < count($arr1); $i++) {
            if ($arr1[$i] != null && $arr2[$i] != null) {
                array_push($generatedArray, [
                    $lang1['code'] => $arr1[$i],
                    $lang2['code'] => $arr2[$i]
                ]);
            }
        }

        return $generatedArray;
    }

    private function addPoints(Request $request, $input, $checkedAgainst)
    {
        $pointed = $request->session()->get('pointedWordsCount');
        $added = $this->checkTranslation($input, $checkedAgainst);
        $request->session()->put('pointedWordsCount', $pointed + $added);

        if ($added == 0) {
            $wrongWords = $request->session()->get('wrongWords');
            $wrongWords[$input] = $checkedAgainst;
            $request->session()->put('wrongWords', $wrongWords);
        }
    }

    private function checkTranslation($input, $checkedAgainst)
    {
        if ($checkedAgainst == $input) {
            return 1;
        }

        return 0;
    }

    private function generateWordsArray($arr, $lang1, $lang2)
    {
        $generatedArray = array();
        foreach ($arr as $key => $value) {
            array_push($generatedArray, [
                $lang1['code'] => $key,
                $lang2['code'] => $value
            ]);
        }

        return $generatedArray;
    }

    private function getMissedWords($actualWords, $wordsToCheck, $langChecked)
    {
        return $this->calculateDiff(
            $actualWords,
            $this->calculateIntersect($actualWords, $wordsToCheck, $langChecked),
            $langChecked);
    }

    private function calculateIntersect($arr1, $arr2, $lang)
    {
        return array_uintersect($arr1, $arr2, function ($val1, $val2) use ($lang) {
            return strcmp($val1[$lang['code']], $val2[$lang['code']]);
        });
    }

    private function calculateDiff($arr1, $arr2, $lang)
    {
        return array_udiff($arr1, $arr2, function ($val1, $val2) use ($lang) {
            return strcmp($val1[$lang['code']], $val2[$lang['code']]);
        });
    }
}