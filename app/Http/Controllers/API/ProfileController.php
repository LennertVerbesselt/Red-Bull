<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follower;
use App\Models\Profile;
use App\Models\User_Interests_Categories;
use App\Models\Profile_Statistics;
use App\Models\Profile_Picture;

use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Challenge_Badge;
use App\Models\Challenge_Set;


use App\Models\Event;
use App\Models\Event_Ticket;
use App\Models\Featured_Events;
use App\Models\Event_Header;

use App\Models\Post;
use App\Models\Post_Image;
use App\Models\Post_Upvotes;
use App\Models\Post_Downvotes;


class ProfileController extends Controller
{
    function getProfileData(){
        $profiledata = [];

        $userid = Auth::user()->id;
        $user = User::find($userid);

        $profile = Profile::where('user_id', $user->id)->get()->first();

        $profilepicture = Profile_Picture::where('user_id', $user->id)->where('active', true)->get()->first();

        $profilestatistics = Profile_Statistics::where('user_id', $user->id)->get()->first();

        $currencypoints = Currency_Points::where('user_id', $user->id)->orderby('points', 'DESC')->get();

        $categories = Category::get();

        foreach($currencypoints as $cu) {
            foreach($categories as $ca) {
                if($cu->category_id === $ca->category_id){
                    $cu['category_name'] = $ca->category_name;
                }
            }
        }

        $profiledata['user'] = $user;
        $profiledata['profile'] = $profile;
        $profiledata['profilepicture'] = $profilepicture;
        $profiledata['profilestatistics'] = $profilestatistics;
        $profiledata['currencypoints'] = $currencypoints;
        $profiledata['categories'] = $categories;


        return ['profiledata' => $profiledata];
    }
}
