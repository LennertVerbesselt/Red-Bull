<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Event;
use App\Models\Challenge_Set;



class ChallengeController extends Controller
{
    public function index(){
        $challengeSets = Challenge_Set::get();
        $events = Event::get();
        $categories = Category::get();

        return view('CMS/challenges', ['challenge_sets' => $challengeSets, 'events' => $events, 'categories' => $categories]);
    }

    public function addChallengeSetPage()
    {
        $events = Event::get();
        $categories = Category::get();

        return view('CMS/addchallengeset', ['events' => $events, 'categories' => $categories]);
    }

    public function addChallengeSet(Request $request){

        //Add new Challenge Set
        $challengeSet = new Challenge_Set;
        $challengeSet->category_id = $request->category;
        $challengeSet->event_id = $request->event;
        $challengeSet->name = $request->name;
        $challengeSet->length = $request->length;
        $challengeSet->difficulty = $request->difficulty;
        $challengeSet->active_untill = $request->active_untill;
        $challengeSet->save();

        $challengeSets = Challenge_Set::get();
        $events = Event::get();
        $categories = Category::get();

        return view('CMS/challenges', ['challenge_sets' => $challengeSets, 'events' => $events, 'categories' => $categories]);
    }





}