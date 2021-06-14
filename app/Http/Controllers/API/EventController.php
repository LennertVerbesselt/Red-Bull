<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Category;
use App\Models\Event;
use App\Models\Event_Ticket;
use App\Models\Featured_Events;
use App\Models\Event_Header;


class EventController extends Controller
{
    public function getFeaturedEvents(){
        $featuredevents = Featured_Events::get();

        $now = date('Y-m-d H:i:s');
        $now = date('Y-m-d H:i:s', strtotime($now));

        $currentfeatured = new Featured_Events;
        foreach($featuredevents as $featuredevent) {
            if ($now >= $featuredevent->start_datetime && $now <= $featuredevent->end_datetime) {
                $currentfeatured = $featuredevent;
            }       
        }

        $featuredeventsforvue = [];

        $currentfeaturedevents = json_decode($currentfeatured->events);
        
        
        foreach($currentfeaturedevents as $featuredevent) {
            $event = Event::find($featuredevent);
            
            $eventheaders = Event_Header::get();
            foreach($eventheaders as $eventheader) {
                if($eventheader->event_id == $featuredevent){
                    $currenteventheader = $eventheader->url;
                } 
                
            }
            $eventandheader = [];
            array_push($eventandheader, $event);
            array_push($eventandheader, $currenteventheader);

            array_push($featuredeventsforvue, $eventandheader);
        }

        return ['featuredevents'=> $featuredeventsforvue];
    }

    public function getEvents() {
         $events=Event::get();
         return (['events'=>$events]);

    }
}
