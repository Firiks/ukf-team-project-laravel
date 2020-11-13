<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Workplace;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class UsersController extends AdminController
{
    use UploadTrait;

    public function index(){
        $users = User::orderBy('created_at', 'desc')->get();
        $workplaces = Workplace::all();

        return view('admin.users.index', compact('users','workplaces'));
    }

    public function create(){
        $workplaces = Workplace::all();

        return view('admin.users.create', compact('workplaces'));
    }

    public function store(CreateUserRequest $request){
        $user = User::create($request->all());

        $user->save();

        $this->upload_image($request, 'image', 'users', $user);

        $this->_setFlashMessage($request, 'success', "Užívateľ <b>$user->name</b> úspešne vytvorený.");

        return redirect()->route('users.index');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $workplaces = Workplace::all();

        return view('admin.users.edit', compact('user', 'workplaces'));
    }

    public function update(UpdateUserRequest $request, $id){
        $user = User::findOrFail($id);

        $user->update($request->all());

        $user->save();

        $this->upload_image($request, 'image', 'users', $user);

        $this->_setFlashMessage($request, 'success', "Užívateľ <b>$user->name</b> bol úspešne zmenený.");

        return redirect()->route('users.index');
    }

    public function delete(Request $request, $id){
        $user = User::findOrFail($id);

        $this->_setFlashMessage($request, 'success', "Užívateľ <b>$user->name</b> bol vymazaný.");

        if(count($user->images)){
            foreach($user->images as $image){
                $image->delete();
            }
            $files = glob(public_path('data/users/' . $user->id . '/*'));
            foreach($files as $file){
                unlink($file);
            }
            if(is_dir(public_path('data/users/' . $user->id))) {
                rmdir(public_path('data/users/' . $user->id));
            }
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    public function student(){
        $workplaces = Workplace::all();
        return view('frontend.students.index', compact('workplaces'));
    }

    public function worker(){
        $workplaces = Workplace::all();
        return view('frontend.workers.index', compact('workplaces'));
    }

}
