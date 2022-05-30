<?php

namespace App\Traits;

use App\EventImage;
use Gregwar\Image\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait UploadTrait{

    public function upload_image(Request $request, $file, $dir, Model $model, $column = false){
        $settings = config("images.$dir");

        if($request->hasFile($file)){
            $path = $request->file($file)->store($dir . '/' . $model->id);
            $basename = basename($path);
            $dir_name = public_path('data/' . $dir . '/' . $model->id . '/');

            $data = [];

            foreach($settings as $type => $size){
                $type_name = $type . '_' . $basename;

                if(isset($size['scale']) && $size['scale']){
                    $img = Image::open($dir_name . $basename);
                    $img->zoomCrop($size['width'], $size['height'], 'transparent', 'center')->save($dir_name . $type_name);
                }elseif(isset($size['crop']) && $size['crop']){
                    $img = Image::open($dir_name . $basename);
                    $img->scaleResize($size['width'], $size['height'])->save($dir_name . $type_name);
                }else{
                    $img = Image::open($dir_name . $basename);
                    $img->cropResize($size['width'], $size['height'])->save($dir_name . $type_name);
                }

                $temp = Image::open($dir_name . $type_name);
                $data[$type . '_name'] = $type_name;
            }

            if($column){
                if($model->images()->where($column, 1)->count() > 0){
                    $image = $model->images()->where($column, 1)->first();
                    $image->update([
                        'image' => $data['image_name'],
                        'thumb' => $data['thumb_name']
                    ]);
                }else{
                    $model->images()->create([
                        'image' => $data['image_name'],
                        'thumb' => $data['thumb_name'],
                        $column => 1
                    ]);
                }
            }else{
                $model->images()->create([
                    'image' => $data['image_name'],
                    'thumb' => $data['thumb_name']
                ]);
            }
        }
    }

    public function upload_event_image(Request $request, $file, $dir, Model $model) {

        $path = $file->store('/' . $dir . '/' . $model->id);
        $basename = basename($path);
        $dir_name = public_path('data/' . $dir . '/' . $model->id . '/');
        $original = 'image_' . $basename;
        $thumbnail = 'thumb_' . $basename;

        $img = Image::open($dir_name . $basename);
        $type_name = 'image_' . $basename;
        $img->scaleResize(1920,1080,'transparent','center')->save($dir_name . $type_name);
        $type_name = 'thumb_' . $basename;
        $img->scaleResize(300,200,'transparent','center')->save($dir_name . $type_name);

        EventImage::create([
            'image' => $original,
            'thumb' => $thumbnail,
            'event_id' => $model->id,
        ]);
    }

}
