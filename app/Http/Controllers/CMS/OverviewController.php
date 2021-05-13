<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Profile_Statistics;
use App\Models\User;
use App\Models\Event;
use App\Models\Event_Ticket;
use App\Models\Featured_Events;


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
      $event_tickets = Event_Ticket::get();
      $featured_events = Featured_events::get();

      return view('CMS/overview', ['users' => $users, 'profiles' => $profiles, 'currency_points' => $currency_points, 'profile_statistics' => $profile_statistics, 'categories' => $categories, 'events' => $events, 'event_tickets' => $event_tickets, 'featured_events' => $featured_events]);
    }





}