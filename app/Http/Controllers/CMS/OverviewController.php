<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Profile_Statistics;
use App\Models\User;
use App\Models\Event;



class OverviewController extends Controller
{
    public function index()
    {

      $users = User::get();
      $profiles = Profile::get();
      $categories = Category::get();
      $currency_points = Currency_Points::get();
      $profile_statistics = Profile_statistics::get();
      $events = Event::get();

      return view('CMS/overview', ['users' => $users, 'profiles' => $profiles, 'currency_points' => $currency_points, 'profile_statistics' => $profile_statistics, 'categories' => $categories, 'events' => $events]);
    }





}