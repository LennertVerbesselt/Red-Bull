<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Event;
use App\Models\Event_Ticket;


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

        $event = Event::latest()->first();
        $eventTicket = new Event_Ticket;
        $eventTicket->event_id = $event->event_id;
        $eventTicket->expiration_date = $event->datetime;
        $eventTicket->save();

        return view('CMS/addevent', ['categories' => $categories]);
    }

    public function addFeaturedEventsPage() {

        $events = Event::get();

        return view('CMS/addfeaturedevents', ['events' => $events]);
    }

    public function addFeaturedEvents(Request $request) {

        dd($request);
        return view('CMS/addfeaturedevents');
    }
}
