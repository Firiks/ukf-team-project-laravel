<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomsController extends AdminController
{
    public function index(){
        $rooms = Room::orderBy('created_at', 'desc')->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create(){

        return view('admin.rooms.create');
    }

    public function store(CreateRoomRequest $request){
        $room = Room::create($request->all());

        // GENERATE SLUGs
        foreach(config('settings.languages') as $key => $value){
            $slug = Str::slug($room->{"name_$key"});
            $i = 1;

            while(Room::where("slug_$key", $slug)->count() > 0){
                $slug = $slug . "-$i";
                $i++;
            }

            $room->{"slug_$key"} = $slug;
        }

        $room->save();

        $this->_setFlashMessage($request, 'success', "Miestonsť <b>$room->name_sk</b> bola úspešne vytvorená.");

        return redirect()->route('rooms.index');
    }

    public function edit($id){
        $room = Room::findOrFail($id);

        return view('admin.rooms.edit', compact('room'));
    }

    public function update(UpdateRoomRequest $request, $id){
        $room = Room::findOrFail($id);

        $room->update($request->all());

        $room->save();

        $this->_setFlashMessage($request, 'success', "Miestnosť <b>$room->name_sk</b> bola úspešne zmenená.");

        return redirect()->route('rooms.index');
    }

    public function delete(Request $request, $id){
        $room = Room::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Miesnosť <b>$room->name_sk</b> bola vymazaná.");

        $room->delete();

        return redirect()->route('rooms.index');
    }
}
