<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\ContactEmailRequest;
use App\Mail\ContactMail;
use App\Event;
use App\EventCategory;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index(){
        $events = Event::orderBy('created_at', 'desc')->get();

        return view('frontend.pages.index', compact( 'events'));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function calendar(Request $request, $datum){
        if ($request->has('date')) {
            $date = $request->get('date');
            $events = Event::whereDate('date', $request->get('date'))->get();
        } else {
            $events = Event::orderBy('created_at', 'desc')->get();
            $date = $datum;
        }

        return view('frontend.pages.calendar' ,compact('events', 'date'));
    }

    public function email(ContactEmailRequest $request){
        $recipient = env('MAIL_RECIPIENT', 'matejmozola1@gmail.com');
        $scroll = 1;

        Mail::to($recipient)->send(new ContactMail($request->all()));

        if(count(Mail::failures()) > 0){
            $error = trans('texts.Your message could not be send');
        }else{
            $success = trans('texts.Your message was sent successfully');
        }

        return view('frontend.pages.contact', compact('scroll', 'error', 'success'));
    }

    public function download_file($id){
        $dl = File::find($id);
        $path = public_path('data/files/' . $dl->name_sk . '.' . $dl->type);
        return response()->download($path);
    }

    public function student(){
        return view('frontend.student.index');
    }
    public function studentEvents(){
        return view('frontend.student.events.index');
    }
    public function studentWorkplaces(){
        return view('frontend.student.workplaces.index');
    }

}
