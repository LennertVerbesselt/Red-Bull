<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Event;


class EventController extends Controller
{
    public function index(){

        $categories = Category::get();

        return view('CMS/addevent', ['categories' => $categories]);
    }

    public function addEvent(Request $request){


        $categories = Category::get();

        //Add new event
        $event = new Event;
        $event->category_id = $request->category;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->location = $request->location;
        $event->datetime = $request->datetime;
        $event->total_tickets_available = $request->availableTickets;
        $event->tickets_sold = $request->ticketsSold;
        $event->save();

        return view('CMS/addevent', ['categories' => $categories]);
    }
}
