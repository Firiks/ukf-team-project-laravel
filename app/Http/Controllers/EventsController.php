<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\User;
use App\Workplace;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request){
        $events = Event::orderBy('date', 'asc');

        if($category = $request->event_category_id){
            $events = $events->where('event_category_id', $category);
        }
        if($workplace = $request->workplace_id){
            $events = $events->where('workplace_id', $workplace);
        }

        $events = $events->paginate(8);

        $categories = EventCategory::orderBy('created_at', 'desc')->get();
        $workplaces = Workplace::orderBy('created_at', 'desc')->get();

        return view('frontend.events.index' ,compact('events','categories', 'workplaces'));
    }

    public function show($language, $slug){
        $event = Event::where("slug_" . $language ,$slug)->firstOrFail();
        $users = User::all();
        return view('frontend.events.show', compact('event', 'users'));
    }

    public function attend($id){
        $event = Event::findOrFail($id);
        if ($event->participants_max == $event->participants){
            $this->_setFlashMessage("Udalost je uz plna");
        } else {
            $event->participants = $event->participants + 1;
            $this->setFlashMessage("Prihlasenia na udalost bolo uspesne");
        }
        return redirect()->route('web.event', ['language' => app()->getLocale(), 'slug' => $event->slug]);
    }
}
