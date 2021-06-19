<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follower;
use App\Models\Profile_Statistics;


class UserController extends Controller
{
    public function follow(Request $request) {
        $user = User::find(Auth::user()->id);
        $postuserid = $request->postuserid;
        $postuser = User::find($postuserid);

        $pf = Follower::where('followed', $postuser->id)->where('following', $user->id)->get()->first();

        if($pf == null) {
            $f = new Follower;
            $f->followed = $postuser->id;
            $f->following = $user->id;
            $f->save();

            $followedstats = Profile_Statistics::where('user_id', $postuser->id)->get()->first();
            $followedstats->increment('followers');
            $followedstats->save();

            $followingstats = Profile_Statistics::where('user_id', $user->id)->get()->first();
            $followingstats->increment('following');
            $followingstats->save();

            return['followed' => $f];
        } else {
            return ['alreadyfollowed' =>$pf];
        }

        
    }

    public function unfollow(Request $request) {
        $user = User::find(Auth::user()->id);
        $postuserid = $request->postuserid;
        $postuser = User::find($postuserid);

        $f = Follower::where('followed', $postuser->id)->where('following', $user->id)->get()->first();
        $f->delete();

        $followedstats = Profile_Statistics::where('user_id', $postuser->id)->get()->first();
            $followedstats->decrement('followers');
            $followedstats->save();

            $followingstats = Profile_Statistics::where('user_id', $user->id)->get()->first();
            $followingstats->decrement('following');
            $followingstats->save();

        return ['unfollowed' => $f];
    }
}
