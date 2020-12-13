<?php

namespace App\Http\Controllers\Pracovnik;

use App\Event;
use App\EventCategory;
use App\Faculty;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\CodeMail;
use App\Room;
use App\User;
use App\Workplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;

class PracovnikController extends Controller
{
    use UploadTrait;

    public function index(Request $request){
        $user = $request->user()->id;
        $events = Event::where('user_id', $user)->orderBy('date', 'asc')->get();
        return view('frontend.pracovnik.index',  compact('events'));
    }

    public function settings($language){
        $user = Auth::user();
        return view('frontend.pracovnik.settings', compact('user', 'language'));
    }

    public function update(UpdateUserRequest $request){
        $user = User::findOrFail($request->user()->id);

        if(strcmp($request->password_confirmation, $request->password)){
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $user->save();

            $this->upload_image($request, 'image', 'users', $user);

            $this->_setFlashMessage($request, 'success', "Profil bol úspešne zmenený.");
        } else {
            $this->_setFlashMessage($request, 'error', "Heslá sa nezhodujú.");
        }

        return redirect()->route('pracovnik.profile', ['language' => app()->getLocale() , 'user' => $user]);
    }

    protected function _setFlashMessage(Request $request, $type, $message){
        $request->session()->flash('type', $type);
        $request->session()->flash('message', $message);
    }

    public function pracovnikEvents(){
        $events = Event::orderBy('created_at', 'desc')->get();
        $categories = EventCategory::all();

        return view('frontend.pracovnik.events.index', compact('events','categories'));
    }

    public function pracovnikEventCreate(){
        $categories = EventCategory::all();
        $faculties = Faculty::all();
        $workplaces = Workplace::all();
        $rooms = Room::all();

        return view('frontend.pracovnik.events.create', compact('categories', 'faculties', 'workplaces', 'rooms'));
    }

    public function pracovnikEventStore(CreateEventRequest $request){
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

        return redirect()->route('pracovnik.events', ['language' => app()->getLocale()]);
    }

    public function pracovnikWorkplaces(){
        $workplaces = Workplace::orderBy('created_at', 'desc')->get();
        return view('frontend.pracovnik.workplaces.index', compact('workplaces'));
    }

    public function pracovnikWorkplacesRequest(Request $request, $language, $id) {
        $workplace = Workplace::findOrFail($id);
        $kod = Str::random(6);


        $data = ['message' => $kod];
        Mail::to($request->user()->email)->send(new CodeMail($data));

        return view('frontend.pracovnik.workplaces.request', compact('workplace', 'language', 'kod'));
    }
    public function pracovnikWorkplacesRequestStore() {
        return "TU NEVIEM AKO OVERIT KOD...";
    }
}
