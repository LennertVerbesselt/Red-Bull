<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Challenge_Set;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Challenge_Badge;
use App\Models\Challenge_sets_Icon;




class ChallengeController extends Controller
{
    public function index(){
        $challengeSets = Challenge_Set::get();
        $events = Event::get();
        $categories = Category::get();
        $challenges = Challenge::get();
        $challengebadges = Challenge_Badge::get();
        $icons = Challenge_sets_Icon::get();

        return view('CMS/challenges', ['challenges' => $challenges, 'events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets, 'challengebadges' => $challengebadges, 'challengeseticons' => $icons]);
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

        $newset = Challenge_Set::latest()->first();

        //Set default icon for challenge
        $icon = Challenge_sets_Icon::create([
            'challenge_set_id' => $newset->id,
            'filename' => 'default.svg',
            'url' => 'https://redbullapp.s3.eu-west-2.amazonaws.com/ChallengeSetIcons/default.png',
        ]);

        $challengeSets = Challenge_Set::get();
        $events = Event::get();
        $categories = Category::get();
        $challenges = Challenge::get();
        $challengebadges = Challenge_Badge::get();
        $icons = Challenge_sets_Icon::get();

        return view('CMS/challenges', ['challenges' => $challenges, 'events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets, 'challengebadges' => $challengebadges, 'challengeseticons' => $icons]);
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
        $challenge->points = $request->points;
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

         //Set default badge for challenge
         $badge = Challenge_Badge::create([
            'challenge_id' => $challenge->id,
            'filename' => 'default.svg',
            'url' => 'https://redbullapp.s3.eu-west-2.amazonaws.com/ChallengeBadges/default.png',
        ]);

        $events = Event::get();
        $challenges = Challenge::get();
        $categories = Category::get();
        $challengeSets = Challenge_Set::get();
        $challengebadges = Challenge_Badge::get();
        $icons = Challenge_sets_Icon::get();

        return view('CMS/challenges', ['challenges' => $challenges, 'events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets, 'challengebadges' => $challengebadges, 'challengeseticons' => $icons]);
    }

    public function uploadChallengeBadgePage(){
        $events = Event::get();
        $challenges = Challenge::get();
        $categories = Category::get();
        $challengeSets = Challenge_Set::get();
        $challengebadges = Challenge_Badge::get();
        $icons = Challenge_sets_Icon::get();

        return view('CMS/uploadchallengebadge', ['challenges' => $challenges, 'events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets, 'challengebadges' => $challengebadges, 'challengeseticons' => $icons]);
    }

    public function uploadChallengeBadge(Request $request) {
        $challengeid = $request->challenge_id;
        $challenge = Challenge::find($challengeid);
        
        //Generate Filename
        $FileNameValueLength = 40;
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $fileName = '';
        for($i = 0; $i < $FileNameValueLength; $i++) {
            $number = random_int(0, 36);
            $character = base_convert($number, 10, 36);
            $fileName .= $character;
        }

        //Compile image name with generated name and readable data for debugging
        $imageName = $challenge->id . "-" . $challenge->name . "-" . $fileName . ".jpg";

        //Save image to AWS
        $path = Storage::disk('s3')->putFileAs('/ChallengeBadges',$request->image,$imageName);

        //Set image on AWS public
        Storage::disk('s3')->setVisibility($path, 'public');

        //Create & Save new Challenge Badge object
        $badge = new Challenge_Badge;
        $badge->challenge_id = $challenge->id;
        $badge->filename = $path;
        $badge->url = Storage::disk('s3')->url($path);
        $badge->save();

        //Remove previous header image unless it is the placeholder image
        $bs = Challenge_Badge::get();
        $lastbadge = Challenge_Badge::latest()->first();
        foreach($bs as $b){
            if($b->challenge_id == $challenge->id && $b->id != $lastbadge->id && $b->filename != "default.jpg"){
                
                Storage::disk('s3')->delete($b->filename);
            } 
        }

        $events = Event::get();
        $challenges = Challenge::get();
        $categories = Category::get();
        $challengeSets = Challenge_Set::get();
        $challengebadges = Challenge_Badge::get();
        $icons = Challenge_sets_Icon::get();

        return view('CMS/challenges', ['challenges' => $challenges, 'events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets, 'challengebadges' => $challengebadges, 'challengeseticons' => $icons]);
    }

    public function uploadChallengeSetIconPage()
    {
        $c = Challenge_Set::get();

        return view('CMS/uploadchallengeseticon', ['challengesets' => $c]);
    }

    public function uploadChallengeSetIcon(Request $request){

        $challengesetid = $request->challenge_set_id;
        $challengeset = Challenge_Set::find($challengesetid);
        
        //Generate Filename
        $FileNameValueLength = 40;
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $fileName = '';
        for($i = 0; $i < $FileNameValueLength; $i++) {
            $number = random_int(0, 36);
            $character = base_convert($number, 10, 36);
            $fileName .= $character;
        }

        //Compile image name with generated name and readable data for debugging
        $imageName = $challengeset->id . "-" . $challengeset->name . "-" . $fileName . ".png";

        //Save image to AWS
        $path = Storage::disk('s3')->putFileAs('/ChallengeSetIcons',$request->image,$imageName);

        //Set image on AWS public
        Storage::disk('s3')->setVisibility($path, 'public');

        //Create & Save new Challenge Badge object
        $i = new Challenge_sets_Icon;
        $i->challenge_set_id = $challengeset->id;
        $i->filename = $path;
        $i->url = Storage::disk('s3')->url($path);
        $i->save();

        //Remove previous header image unless it is the placeholder image
        $alli = Challenge_sets_Icon::get();
        $lasti = Challenge_sets_Icon::latest()->first();
        foreach($alli as $i){
            if($i->challenge_set_id == $challengeset->id && $i->id != $lasti->id && $i->filename != "default.png"){
                
                Storage::disk('s3')->delete($i->filename);
            } 
        }

        $events = Event::get();
        $challenges = Challenge::get();
        $categories = Category::get();
        $challengeSets = Challenge_Set::get();
        $challengebadges = Challenge_Badge::get();
        $icons = Challenge_sets_Icon::get();

        return view('CMS/challenges', ['challenges' => $challenges, 'events' => $events, 'categories' => $categories, 'challenge_sets' => $challengeSets, 'challengebadges' => $challengebadges, 'challengeseticons' => $icons]);
    }




}