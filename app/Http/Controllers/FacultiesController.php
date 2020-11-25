<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    public function index(Request $request){
        $faculties = Faculty::orderBy('name')->get();

        return view('frontend.fakulta.index' , compact('faculties'));
    }

    public function show($language, $slug){
        $faculty = Faculty::where("slug_" . $language ,$slug)->firstOrFail();

        return view('frontend.fakulta.show', compact('faculty'));
    }
}
