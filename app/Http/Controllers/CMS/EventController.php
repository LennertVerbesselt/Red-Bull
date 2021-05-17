<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Event;
use App\Models\Event_Ticket;
use App\Models\Featured_Events;
use App\Models\Event_Header;


class EventController extends Controller
{
    public function index(){

        $events = Event::get();
        $eventTickets = Event_Ticket::get();
        $featuredEvents = Featured_Events::get();
        $eventheaders = Event_Header::get();

        return view('CMS/events', ['events' => $events, 'event_tickets' => $eventTickets, 'featured_events' => $featuredEvents, 'event_headers' => $eventheaders]);
    }

    public function addEventPage(){

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
        $eventTicket->event_id = $event->id;
        $eventTicket->expiration_date = $event->datetime;
        $eventTicket->save();

        $events = Event::get();
        $eventTickets = Event_Ticket::get();
        $featuredEvents = Featured_Events::get();
        $eventheaders = Event_Header::get();

        return view('CMS/events', ['events' => $events, 'event_tickets' => $eventTickets, 'featured_events' => $featuredEvents, 'event_headers' => $eventheaders]);
    }

    public function addFeaturedEventsPage() {

        $events = Event::get();

        return view('CMS/addfeaturedevents', ['events' => $events]);
    }

    public function addFeaturedEvents(Request $request) {

        

        $featuredEvents = new Featured_Events;

        $featuredEvents->start_datetime = $request->start_datetime;
        $featuredEvents->end_datetime = $request->end_datetime;

        $featuredIDs = [$request->event1, $request->event2, $request->event3, $request->event4, $request->event5];
        $featuredEvents->events = json_encode($featuredIDs);

        $featuredEvents->save();
        
        $events = Event::get();


        $events = Event::get();
        $eventTickets = Event_Ticket::get();
        $featuredEvents = Featured_Events::get();
        $eventheaders = Event_Header::get();

        return view('CMS/events', ['events' => $events, 'event_tickets' => $eventTickets, 'featured_events' => $featuredEvents, 'event_headers' => $eventheaders]);
    }

    public function uploadEventHeaderPage(){

        $events = Event::get();

        return view('CMS/uploadeventheader', ['events' => $events]);
    }

    public function uploadEventHeader(Request $request){

        $eventid = $request->event_id;
        $event = Event::find($eventid);
        
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
        $imageName = $event->id . "-" . $event->name . "-" . $fileName . ".jpg";

        //Save image to AWS
        $path = Storage::disk('s3')->putFileAs('/EventHeaders',$request->image,$imageName);

        //Set image on AWS public
        Storage::disk('s3')->setVisibility($path, 'public');

        //Create & Save new Profile Picture object
        $eventheader = new Event_Header;
        $eventheader->event_id = $event->id;
        $eventheader->filename = $path;
        $eventheader->url = Storage::disk('s3')->url($path);
        $eventheader->save();


        $events = Event::get();
        $eventTickets = Event_Ticket::get();
        $featuredEvents = Featured_Events::get();
        $eventheaders = Event_Header::get();

        return view('CMS/events', ['events' => $events, 'event_tickets' => $eventTickets, 'featured_events' => $featuredEvents, 'event_headers' => $eventheaders]);
    }
}
