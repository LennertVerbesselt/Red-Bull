<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
use App\Models\Profile;
use App\Models\Currency_Points;
use App\Models\Profile_Statistics;
use App\Models\Profile_Picture;


class UserController extends Controller
{
    public function index(){
        $users = User::get();
        $categories = Category::get();
        $profiles = Profile::get();
        $currency_points = Currency_Points::get();
        $profile_statistics = Profile_statistics::get();
        $profile_pictures = Profile_Picture::get();
        $profile_pictures = Profile_Picture::get();
        

        return view('CMS/users', ['users' => $users, 'categories' => $categories, 'profiles' => $profiles, 'currency_points' => $currency_points, 'profile_statistics' => $profile_statistics, 'profile_pictures' => $profile_pictures]);
    }

    





}