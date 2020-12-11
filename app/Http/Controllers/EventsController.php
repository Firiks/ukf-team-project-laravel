<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request){
        $events = Event::orderBy('date', 'asc');

        if($category = $request->event_category_id){
            $events = $events->where('event_category_id', $category);
        }

        $events = $events->paginate(8);
        $categories = EventCategory::orderBy('created_at', 'desc')->get();

        return view('frontend.events.index' ,compact('events','categories'));
    }

    public function show($language, $slug){
        $event = Event::where("slug_" . $language ,$slug)->firstOrFail();
        $users = User::all();
        return view('frontend.events.show', compact('event', 'users'));
    }
}
