<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FacultiesController extends AdminController
{
    public function index(){
        $faculties = Faculty::orderBy('created_at', 'desc')->get();

        return view('admin.faculties.index', compact('faculties'));
    }

    public function create(){

        return view('admin.faculties.create');
    }

    public function store(CreateFacultyRequest $request){
        $faculty = Faculty::create($request->all());

        // GENERATE SLUGs
        foreach(config('settings.languages') as $key => $value){
            $slug = Str::slug($faculty->{"name_$key"});
            $i = 1;

            while(Faculty::where("slug_$key", $slug)->count() > 0){
                $slug = $slug . "-$i";
                $i++;
            }

            $faculty->{"slug_$key"} = $slug;
        }

        $faculty->save();

        $this->_setFlashMessage($request, 'success', "Fakulta <b>$faculty->name_sk</b> bola úspešne vytvorená.");

        return redirect()->route('faculties.index');
    }

    public function edit($id){
        $faculty = Faculty::findOrFail($id);

        return view('admin.faculties.edit', compact('faculty'));
    }

    public function update(UpdateFacultyRequest $request, $id){
        $faculty = Faculty::findOrFail($id);

        $faculty->update($request->all());

        $faculty->save();

        $this->_setFlashMessage($request, 'success', "Fakulta <b>$faculty->name_sk</b> bola úspešne zmenená.");

        return redirect()->route('faculties.index');
    }

    public function delete(Request $request, $id){
        $faculty = Faculty::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Fakulta <b>$faculty->name_sk</b> bola vymazaná.");

        $faculty->delete();

        return redirect()->route('faculties.index');
    }
}
