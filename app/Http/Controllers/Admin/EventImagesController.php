<?php

namespace App\Http\Controllers\Admin;

use App\EventImage;

class EventImagesController extends AdminController
{
    public function delete($id){
        $event_image = EventImage::findOrFail($id);

        $event_image->delete();

        return back();
    }
}
