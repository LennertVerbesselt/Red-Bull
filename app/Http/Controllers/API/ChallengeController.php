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

                $progression = Challenge_Progression::where('challenge_id', $challengeid)->where('user_id', $userid)->get()->first();
                $progression->increment('cans_scanned');
                $progression->save();

                if($progression->cans_scanned == $challenge->cans_needed_to_unlock){
                    $progression->locked = 0;
                    $progression->unlocked = 1;
                    $progression->save();
                }

                $qrcodeexists->available = 0;
                $qrcodeexists->save();
                return ['status' => true, 'challengedefined' => true];
            }
        }

        //return['status' => $status, 'challengedefined' => $challengedefined];
    }
}
