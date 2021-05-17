<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Models\Category;
use App\Models\User;
use App\Models\Profile;
use App\Models\Currency_Points;
use App\Models\Profile_Statistics;
use App\Models\Profile_Picture;

class ProfilePictureController extends Controller
{
    public function uploadProfilePicturePage(){
        $users = User::get();

        return view('CMS/uploadprofilepicture', ['users' => $users]);
    }

    public function uploadProfilePicture(Request $request) {

        $userid = $request->user_id;
        $user = User::find($userid);
        
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
        $imageName = $user->id . "-" . $user->name . "-" . $fileName . ".jpg";

        //Save image to AWS
        $path = Storage::disk('s3')->putFileAs('/ProfilePictures',$request->image,$imageName);

        //Set image on AWS public
        Storage::disk('s3')->setVisibility($path, 'public');

        //Create & Save new Profile Picture object
        $profilepicture = new Profile_Picture;
        $profilepicture->user_id = $user->id;
        $profilepicture->filename = $path;
        $profilepicture->url = Storage::disk('s3')->url($path);
        $profilepicture->active = True;
        $profilepicture->save();

        //Check for previous profile picture && Deactivate previous profile picture
        $previousprofilepictures = Profile_Picture::get();
        $currentprofilepicture = Profile_Picture::latest()->first();
        foreach($previousprofilepictures as $profilepicture) {
            if ($profilepicture->user_id == $currentprofilepicture->user_id && $profilepicture->id != $currentprofilepicture->id){
                $profilepicture->active = False;
                $profilepicture->save();
            }
        }
        
        $users = User::get();
        $categories = Category::get();
        $profiles = Profile::get();
        $currency_points = Currency_Points::get();
        $profile_statistics = Profile_statistics::get();
        $profile_pictures = Profile_Picture::get();
        

        return view('CMS/users', ['users' => $users, 'categories' => $categories, 'profiles' => $profiles, 'currency_points' => $currency_points, 'profile_statistics' => $profile_statistics, 'profile_pictures' => $profile_pictures]);

    }
    
}
