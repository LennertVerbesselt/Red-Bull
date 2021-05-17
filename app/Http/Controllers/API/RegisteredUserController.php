<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Profile;
use App\Models\User_Interests_Categories;
use App\Models\Profile_Statistics;
use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Profile_Picture;


use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Auth\Datetime; 
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ]);

        //Create a user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Create a profile in the database && link it to the user
        $profile = Profile::create([
            'username' => $user->name,
            'first_name' => '',
            'last_name' => '',
            'user_id' => $user->id,
        ]);

        //create a interests categories in the database && link it to the user
        $user_interests_categories = User_Interests_Categories::create([
            'user_id' => $user->id,
        ]);

        //Initiate Profile statistics && link it to the user
        $profile_statistics = Profile_Statistics::create([
            'user_id' => $user->id,
        ]);


        //Create a currency counter for each category && link it to the user
        $categories = DB::table('categories')->get();

        foreach($categories as $category) {
            $currency_points = Currency_Points::create([
                'category_id' => $category->category_id,
                'user_id' => $user->id,
            ]);
        }

        //Create a challenge_progression item for every challenge
        $challenges = Challenge::get();

        foreach($challenges as $challenge){
            $challenge_progression = Challenge_Progression::create([
                'challenge_id' => $challenge->id,
                'user_id' => $user->id,
            ]);
        }

        //Create Default profile picture element
        $profile_picture = Profile_Picture::create([
            'user_id' => $user->id,
            'filename' => 'default.jpg',
            'url' => 'https://redbullapp.s3.eu-west-2.amazonaws.com/ProfilePictures/default.jpg',
            'active' => 1,
        ]);





        event(new Registered($user));

        $user = User::latest()->first();

        return $user;
    }
}
