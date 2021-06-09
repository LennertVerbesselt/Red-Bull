<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Challenge_Set;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Challenge_Badge;
use App\Models\QR;
use App\Models\User_Interests_Categories;



class ChallengeController extends Controller
{
    public function getChallengeSets() {

        $challengesets = Challenge_Set::get();
        return ['challengesets' => $challengesets];
    }

    public function getChallenges(Request $request) {

        $challenge_set_id = $request->challengesetid;
        $challenges = Challenge::wherechallenge_set_id($challenge_set_id)->get();
        return['challenges' => $challenges];
    }

    public function getChallenge(Request $request) {

        $challengeid = $request->challengeid;
        $challenge = Challenge::find($challengeid);
        return['challenge' => $challenge];
    }

    public function getChallengeBadge(Request $request){
        $challengeid = $request->challengeid;
        $badge = Challenge_Badge::wherechallenge_id($challengeid)->get();
        return ['badge' => $badge];
    }

    public function getChallengeProgression(Request $request) {
        $challengeid = $request->challengeid;
        $userid = Auth::user()->id;
        

        $progression = Challenge_Progression::where('challenge_id', $challengeid)->where('user_id', $userid)->get();
        return['challengeprogression' => $progression];
    }

    public function checkQRCode(Request $request) {

        $qrcode = $request->qrcode;
        $challengeid = $request->challengeid;

        $qrcodes = QR::get();
        $qrcodeexists = QR::where('code', $qrcode)->where('available', 1)->get()->first();
        
        if($qrcodeexists == null){
            return ['status' => false];
        } 
        else {
            if($challengeid == null) {
                return ['status' => true, 'challengedefined' => false];
            } else {
                $userid = Auth::user()->id;
                $user = User::find($userid);

                $challenge = Challenge::find($challengeid);

                $progression = Challenge_Progression::where('challenge_id', $challengeid)->where('user_id', $user->id)->get()->first();
                $progression->increment('cans_scanned');
                $progression->save();

                if($progression->cans_scanned == $challenge->cans_needed_to_unlock){
                    $progression->locked = 0;
                    $progression->unlocked = 1;
                    $progression->save();
                }

                $qrcodeexists->available = 0;
                //$qrcodeexists->save();
                return ['status' => true, 'challengedefined' => true];
            }
        }

        //return['status' => $status, 'challengedefined' => $challengedefined];
    }

    public function getChallengesPage(){

        $categories = Category::get();
        $challengesets = Challenge_Set::get();
        $challenges = Challenge::get();
        $challengebadges = Challenge_Badge::get();
        $challengeprogressions = Challenge_Progression::where('user_id', Auth::user()->id)->get();
        $favourites = (array) json_decode(User_interests_Categories::where('user_id', Auth::user()->id)->get()->first()->favourites);

        $challengespage = [];

        foreach($categories as $category){
            $categorysub = [];

            $categorysub['category_id'] = $category->category_id;
            $categorysub['category_name'] = $category->category_name;

            if($favourites[$category->category_name]){
                $categorysub['favourite'] = true;
            } else {
                $categorysub['favourite'] = false;
            }

            foreach($challengesets as $challengeset){

                if($challengeset->category_id == $category->category_id){
                    $challengesubset = [];
                    $completed = 0;
                    $total = 0;

                    $challengesubset['id'] = $challengeset->id;
                    $challengesubset['event_id'] = $challengeset->event_id;
                    $challengesubset['category_id'] = $challengeset->category_id;
                    $challengesubset['name'] = $challengeset->name;
                    $challengesubset['length'] = $challengeset->length;
                    $challengesubset['difficulty'] = $challengeset->difficulty;
                    $challengesubset['active_untill'] = $challengeset->active_untill;

                    foreach($challenges as $challenge){

                        if($challenge->challenge_set_id === $challengeset->id){
                            $challengesub = [];

                            $challengesub['id'] = $challenge->id;
                            $challengesub['challenge_set_id'] = $challenge->challenge_set_id;
                            $challengesub['name'] = $challenge->name;
                            $challengesub['difficulty'] = $challenge->difficulty;
                            $challengesub['description'] = $challenge->description;
                            $challengesub['points'] = $challenge->points;
                            $challengesub['cans_needed_to_unlock'] = $challenge->cans_needed_to_unlock;
                            $challengesub['upvote_ratio'] = $challenge->upvote_ratio;

                            foreach($challengebadges as $challengebadge){
                                if($challengebadge->challenge_id == $challenge->id){
                                    $challengesub['badge'] = $challengebadge->url;
                                }
                            }
                            foreach($challengeprogressions as $challengeprogression){
                                if($challengeprogression->challenge_id == $challenge->id){
                                    $challengesub['progression'] = $challengeprogression;
                                    if($challengeprogression->complete){
                                        $completed++;
                                    }
                                    $total++;
                                }
                            }

                            $percentage = $completed/$total * 100;

                            $challengesubset['percentage'] = $percentage;
                            $challengesubset['completed'] = $completed;
                            $challengesubset['total'] = $total;

                            $challengesubset['challenges'][$challenge->id] = $challengesub;
                        }
                    }

                    $categorysub['challengesets'][$challengeset->id] = $challengesubset;

                }
            }

            array_push($challengespage, $categorysub);
        }




        $favourites = (array) json_decode(User_interests_Categories::where('user_id', Auth::user()->id)->get()->first()->favourites);
        
        $FavouriteCategories = [];

        foreach($categories as $category) {
            if($favourites[$category->category_name]){
                array_push($FavouriteCategories, $category);
            }
        }

        return ['challengespage' => $challengespage, 'favouritecategories' => $favourites];
    }
}
