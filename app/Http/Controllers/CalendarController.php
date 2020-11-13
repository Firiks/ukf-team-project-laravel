<?php

namespace App\Http\Controllers;

use App\Event;

class CalendarController extends Controller
{
    public function index(){
        $events = Event::orderBy('created_at', 'desc')->get();

        return view('frontend.calendar.index' ,compact('events'));
    }

    public function show(){
        $events = Event::orderBy('created_at', 'desc')->get();

        return view('frontend.calendar.show', compact('events'));
    }
}
