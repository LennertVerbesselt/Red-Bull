<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Challenge_Set;
use App\Models\Challenge;
use App\Models\Challenge_Progression;




class ChallengeController extends Controller
{
    public function index(){
        $challengeSets = Challenge_Set::get();
        $events = Event::get();
        $categories = Category::get();
        $challenges = Challenge::get();

        return view('CMS/challenges', ['challenge_sets' => $challengeSets, 'events' => $events, 'categories' => $categories, 'challenges' => $challenges]);
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
        $challenges = Challenge::get();

        return view('CMS/challenges', ['challenge_sets' => $challengeSets, 'events' => $events, 'categories' => $categories, 'challenges' => $challenges]);
    }

    public function addChallengePage()
    {
        $events = Event::get();
        $categories = Category::get();
        $challengeSets = Challenge_Set::get();

        return view('CMS/addchallenge', ['events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets]);
    }


    public function addChallenge(Request $request)
    {
        $challenge = new Challenge;
        $challenge->challenge_set_id = $request->challenge_set_id;
        $challenge->name = $request->name;
        $challenge->difficulty = $request->difficulty;
        $challenge->description = $request->description;
        $challenge->cans_needed_to_unlock = $request->cans_needed;
        $challenge->upvote_ratio = $request->upvote_ratio;

        $challenge->save();

        $challenge = Challenge::latest()->first();
        $users = User::get();
        foreach($users as $user){
            $challenge_progression = new Challenge_Progression;
            $challenge_progression->user_id = $user->id;
            $challenge_progression->challenge_id = $challenge->id;
            $challenge_progression->save();
         }

        $events = Event::get();
        $categories = Category::get();
        $challengeSets = Challenge_Set::get();

        return view('CMS/addchallenge', ['events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets]);
    }





}