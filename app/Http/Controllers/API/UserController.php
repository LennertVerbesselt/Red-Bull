<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follower;


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

        return ['unfollowed' => $f];
    }
}
