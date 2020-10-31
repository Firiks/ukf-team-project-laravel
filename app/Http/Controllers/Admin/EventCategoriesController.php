<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventCategoriesController extends AdminController
{
    public function index(){
        $event_categories = EventCategory::orderBy('created_at', 'desc')->get();

        return view('admin.event_categories.index', compact('event_categories'));
    }

    public function create(){

        return view('admin.event_categories.create');
    }

    public function store(CreateEventCategoryRequest $request){
        $event_category = EventCategory::create($request->all());

        // GENERATE SLUGs
        foreach(config('settings.languages') as $key => $value){
            $slug = Str::slug($event_category->{"name_$key"});
            $i = 1;

            while(EventCategory::where("slug_$key", $slug)->count() > 0){
                $slug = $slug . "-$i";
                $i++;
            }

            $event_category->{"slug_$key"} = $slug;
        }

        $event_category->save();

        $this->_setFlashMessage($request, 'success', "Kategória udalostí <b>$event_category->name_sk</b> bola úspešne vytvorená.");

        return redirect()->route('event_categories.index');
    }

    public function edit($id){
        $event_category = EventCategory::findOrFail($id);

        return view('admin.event_categories.edit', compact('event_category'));
    }

    public function update(UpdateEventCategoryRequest $request, $id){
        $event_category = EventCategory::findOrFail($id);

        $event_category->update($request->all());

        $event_category->save();

        $this->_setFlashMessage($request, 'success', "Kategória udalostí <b>$event_category->name_sk</b> bola úspešne zmenená.");

        return redirect()->route('event_categories.index');
    }

    public function delete(Request $request, $id){
        $event_category = EventCategory::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Kategória udalostí <b>$event_category->name_sk</b> bola vymazaná.");

        $event_category->delete();

        return redirect()->route('event_categories.index');
    }
}
