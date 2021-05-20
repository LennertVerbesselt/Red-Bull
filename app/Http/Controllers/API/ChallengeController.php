<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Challenge_Set;
use App\Models\Challenge;
use App\Models\Challenge_Progression;


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
}
