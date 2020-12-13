<?php

namespace App\Http\Controllers\Student;

use App\Event;
use App\EventCategory;
use App\Faculty;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\CodeMail;
use App\Mail\TestMail;
use App\Room;
use App\User;
use App\Workplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use App\Mail\ContactMail;

class StudentController extends Controller
{
    use UploadTrait;

    public function index(Request $request){
        $user = $request->user()->id;
        $events = Event::where('user_id', $user)->orderBy('date', 'asc')->get();
        return view('frontend.student.index',  compact('events'));
    }

    public function settings($language){
        $user = Auth::user();

        return view('frontend.student.settings', compact('user', 'language'));
    }

    public function update(UpdateUserRequest $request){
        $user = Auth::user();
        $user->update($request->all());
        $user->fill(['password' => Hash::make($request->input('password'))]);
        $user->save();
        $this->_setFlashMessage($request, 'success', "Vaše údaje boli úspešne zmenené.");
        return redirect()->route('web.student', app()->getLocale());
    }

    protected function _setFlashMessage(Request $request, $type, $message){
        $request->session()->flash('type', $type);
        $request->session()->flash('message', $message);
    }

    public function studentEvents(){
        $events = Event::orderBy('created_at', 'desc')->get();
        $categories = EventCategory::all();

        return view('frontend.student.events.index', compact('events','categories'));
    }

    public function studentEventCreate(){
        $faculties = Faculty::all();
        $categories = EventCategory::all();
        $faculties = Faculty::all();
        $workplaces = Workplace::all();
        $rooms = Room::all();

        return view('frontend.student.events.create', compact('categories', 'faculties', 'workplaces', 'rooms'));
    }

    public function studentEventStore(CreateEventRequest $request){
        $event = Event::create($request->all());

        $event->{"user_id"} = $request->user()->id;

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

        return redirect()->route('student.events', ['language' => app()->getLocale()]);
    }

    public function studentWorkplaces(){
        $workplaces = Workplace::orderBy('created_at', 'desc')->get();

        return view('frontend.student.workplaces.index', compact('workplaces'));
    }

    public function studentWorkplacesRequest($language, $id) {
        $workplace = Workplace::findOrFail($id);

        return view('frontend.student.workplaces.request', compact('workplace', 'language'));
    }

    public function studentWorkplacesRequestStore(Request $request, $id) {
        $workplace = Workplace::findOrFail($id);
        $user = Auth::user();
        $rcode = $request->input("kod");
        $wcode = $workplace->code;

        if ($rcode == $wcode) {
            $user->{"workplace_id"} = $workplace->id;
            $user->save();
            $this->_setFlashMessage($request,'success',"Priradenie na pracovisko prebehlo úspešne");
        } else {
            $this->_setFlashMessage($request,'error',"Zadaný kód sa nezhoduje s kódom pracoviska");
        }
        return redirect()->route('student.workplaces', ['language' => app()->getLocale()]);
    }

}
