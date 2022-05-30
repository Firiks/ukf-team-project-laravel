<?php

namespace App\Http\Controllers\Admin;

use App\Image;

class ImagesController extends AdminController
{
    public function delete($id){
        $image = Image::findOrFail($id);

        $image->delete();

        return back();
    }
}