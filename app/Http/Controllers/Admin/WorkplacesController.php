<?php

namespace App\Http\Controllers\Admin;

use App\Faculty;
use App\Http\Requests\CreateWorkplaceRequest;
use App\Http\Requests\UpdateWorkplaceRequest;
use App\Workplace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkplacesController extends AdminController
{
    public function index(){
        $workplaces = Workplace::orderBy('created_at', 'desc')->get();
        $faculties = Faculty::all();

        return view('admin.workplaces.index', compact('workplaces', 'faculties'));
    }

    public function create(){
        $faculties = Faculty::all();
        $workplaces = Workplace::all();

        return view('admin.workplaces.create', compact('faculties', 'workplaces'));
    }

    public function store(CreateWorkplaceRequest $request){
        $workplace = Workplace::create($request->all());

        // GENERATE SLUGs
        foreach(config('settings.languages') as $key => $value){
            $slug = Str::slug($workplace->{"name_$key"});
            $i = 1;

            while(Workplace::where("slug_$key", $slug)->count() > 0){
                $slug = $slug . "-$i";
                $i++;
            }

            $workplace->{"slug_$key"} = $slug;
        }

        $workplace->save();

        $this->_setFlashMessage($request, 'success', "Pracovisko <b>$workplace->name_sk</b> bolo úspešne vytvorené.");

        return redirect()->route('workplaces.index');
    }

    public function edit($id){
        $workplace = Workplace::findOrFail($id);
        $faculties = Faculty::all();

        return view('admin.workplaces.edit', compact('faculties', 'workplace'));

    }

    public function update(UpdateWorkplaceRequest $request, $id){
        $workplace = Workplace::findOrFail($id);

        $workplace->update($request->all());

        $workplace->save();

        $this->_setFlashMessage($request, 'success', "Pracovisko <b>$workplace->name_sk</b> bolo úspešne zmenené.");

        return redirect()->route('workplaces.index');
    }

    public function delete(Request $request, $id){
        $workplace = Workplace::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Pracovisko <b>$workplace->name_sk</b> bolo vymazané.");

        $workplace->delete();

        return redirect()->route('workplaces.index');
    }
}
