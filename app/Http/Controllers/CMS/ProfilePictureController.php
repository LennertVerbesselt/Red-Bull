<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile_Picture;

class ProfilePictureController extends Controller
{
    public function uploadProfilePicturePage(){
        $users = User::get();

        return view('CMS/uploadprofilepicture', ['users' => $users]);
    }

    public function uploadProfilePicture(Request $request) {

        $path = $request->file('image')->store('image', 's3');

        dd($path);

    }
}
