<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;

class FilesController extends AdminController
{

    public function index(){
        $files = File::orderBy('created_at', 'desc')->get();

        return view('admin.files.index', compact('files'));
    }

    public function create(){

        return view('admin.files.create', compact('files'));
    }

    public function store(CreateFileRequest $request){
        $file = File::create($request->all());

        // GENERATE SLUGs
        foreach(config('settings.languages') as $key => $value){
            $slug = Str::slug($file->{"name_$key"});
            $i = 1;

            while(File::where("slug_$key", $slug)->count() > 0){
                $slug = $slug . "-$i";
                $i++;
            }

            $file->{"slug_$key"} = $slug;
        }

        $uploaded_file = request()->file('file');
        if( ! is_dir(public_path('data/files'))) {
            mkdir(public_path('data/files'), 0777);
        }
        if ($uploaded_file != null) {
            $filename = $file->name_sk . '.' . $uploaded_file->getClientOriginalExtension();
            $directory = public_path('data/files');
            $uploaded_file->move($directory, $filename);
        }

        $file->type = $uploaded_file->getClientOriginalExtension();

        $file->save();

        $this->_setFlashMessage($request, 'success', "Súbor <b>$file->name_sk</b> bol úspešne vytvorený.");

        return redirect()->route('files.index');
    }

    public function edit($id){
        $file = File::findOrFail($id);

        return view('admin.files.edit', compact('file'));
    }

    public function update(UpdateFileRequest $request, $id){
        $file = File::findOrFail($id);

        $file->update($request->all());

        $uploaded_file = request()->file('file');
        if( ! is_dir(public_path('data/files'))) {
            mkdir(public_path('data/files'), 0777);
        }
        if ($uploaded_file != null) {
            $filename = $file->name_sk . '.' . $uploaded_file->getClientOriginalExtension();
            $directory = public_path('data/files');
            $uploaded_file->move($directory, $filename);
        }

        $file->type = $uploaded_file->getClientOriginalExtension();

        $file->save();

        $this->_setFlashMessage($request, 'success', "Súbor <b>$file->name_sk</b> bol úspešne zmenený.");

        return redirect()->route('files.index');
    }

    public function delete(Request $request, $id){
        $file = File::findOrFail($id);

        $dir = public_path('data/files/');
        $file_name = $file->name_sk . '.' . $file->type;
        unlink($dir . $file_name);

        $this->_setFlashMessage($request, 'success', "Súbor <b>$file->name_sk</b> bol vymazaný.");

        $file->delete();

        return redirect()->route('files.index');
    }

}
