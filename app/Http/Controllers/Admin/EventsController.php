<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Faculty;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\EventCategory;
use App\Room;
use App\Traits\UploadTrait;
use App\Workplace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventsController extends AdminController
{
    use UploadTrait;

    public function index(){
        $events = Event::orderBy('created_at', 'desc')->get();
        $categories = EventCategory::all();
        $faculties = Faculty::all();
        $workplaces = Workplace::all();
        $rooms = Room::all();

        return view('admin.events.index', compact('events','categories', 'faculties', 'workplaces', 'rooms'));
    }

    public function create(){
        $categories = EventCategory::all();
        $faculties = Faculty::all();
        $workplaces = Workplace::all();
        $rooms = Room::all();

        return view('admin.events.create', compact('categories', 'faculties', 'workplaces', 'rooms'));
    }

    public function store(CreateEventRequest $request){
        $event = Event::create($request->all());

        // GENERATE SLUGs
        foreach(config('settings.languages') as $key => $value){
            $slug = Str::slug($event->{"name_$key"});
            $i = 1;

            while(Event::where("slug_$key", $slug)->count() > 0){
                $slug = $slug . "-$i";
                $i++;
            }

            $event->{"slug_$key"} = $slug;
        }

        $event->save();

        $this->upload_image($request, 'image', 'events', $event);

        $files = request()->file('images');

        if( ! is_dir(public_path('data/event_images'))) {
            mkdir(public_path('data/event_images'), 0777);
        }

        if($files != null) {
            foreach ($files as $file) {
                $this->upload_event_image($request, $file, 'event_images', $event);
            }
        }

        $this->_setFlashMessage($request, 'success', "Udalosť <b>$event->name_sk</b> úspešne vytvorená.");

        return redirect()->route('events.index');
    }

    public function edit($id){
        $event = Event::findOrFail($id);
        $categories = EventCategory::all();
        $faculties = Faculty::all();
        $workplaces = Workplace::all();
        $rooms = Room::all();

        return view('admin.events.edit', compact('event', 'categories', 'faculties', 'workplaces', 'rooms'));
    }

    public function update(UpdateEventRequest $request, $id){
        $event = Event::findOrFail($id);

        $event->update($request->all());

        $event->save();

        $this->upload_image($request, 'image', 'events', $event);

        $files = request()->file('images');

        if( ! is_dir(public_path('data/event_images'))) {
            mkdir(public_path('data/event_images'), 0777);
        }

        if($files != null) {
            foreach ($files as $file) {
                $this->upload_product_image($request, $file, 'event_images', $event);
            }
        }

        $this->_setFlashMessage($request, 'success', "Udalosť <b>$event->name_sk</b> bola úspešne zmenená.");

        return redirect()->route('events.index');
    }

    public function delete(Request $request, $id){
        $event = Event::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Udalosť <b>$event->name_sk</b> bola vymazaná.");

        if(count($event->images)){
            foreach($event->images as $image){
                $image->delete();
            }
            $files = glob(public_path('data/events/' . $event->id . '/*'));
            foreach($files as $file){
                unlink($file);
            }
            if(is_dir(public_path('data/events/' . $event->id))) {
                rmdir(public_path('data/events/' . $event->id));
            }
        }

        if(count($event->event_images)){
            foreach($event->event_images as $event_image){
                $event_image->delete();
            }
            $files = glob(public_path('data/event_images/' . $event->id . '/*'));
            foreach($files as $file){
                unlink($file);
            }
            if(is_dir(public_path('data/event_images/' . $event->id))) {
                rmdir(public_path('data/event_images/' . $event->id));
            }
        }

        $event->delete();

        return redirect()->route('events.index');
    }
}
