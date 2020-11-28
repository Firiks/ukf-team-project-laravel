<?php

namespace App;

class Event extends BaseModel
{
    protected $fillable = [
        'name_sk',
        'slug_sk',
        'description_sk',
        'name_en',
        'slug_en',
        'description_en',
        'event_category_id',
        'faculty_id',
        'workplace_id',
        'room_id',
        'date'
    ];

    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }

    public function event_images(){
        return $this->hasMany('App\EventImage');
    }

    public function event_category(){
        return $this->belongsTo('App\EventCategory');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function workplace(){
        return $this->belongsTo('App\Workplace');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }

    public function getNameAttribute(){
        return $this->_translateProperty('name');
    }

    public function getSlugAttribute(){
        return $this->_translateProperty('slug');
    }

    public function getDescriptionAttribute(){
        return $this->_translateProperty('description');
    }

    public function get_image($image){
        $path = 'data/events/' . $this->id . '/';
        $image_path = $path . $image;

        return $image_path;
    }

    public function get_thumb($image){
        $path = 'data/events/' . $this->id . '/';
        $image_path = $path . $image;

        return $image_path;
    }

    public function get_event_image($event_image){
        $path = 'data/event_images/' . $this->id . '/';
        $image_path = $path . $event_image;

        return $image_path;
    }

    public function get_event_thumb($event_image){
        $path = 'data/event_images/' . $this->id . '/';
        $image_path = $path . $event_image;

        return $image_path;
    }

    public function getProfileImageAttribute(){
        $path = 'data/events/' . $this->id . '/';

        if($this->images->where('profile', 1)->count() > 0){
            return $path . $this->images()->where('profile', 1)->first()->image;
        }else{
            return false;
        }
    }

    public function getProfileThumbAttribute(){
        $path = 'data/events/' . $this->id . '/';

        if($this->images->where('profile', 1)->count() > 0){
            return $path . $this->images()->where('profile', 1)->first()->thumb;
        }else{
            return false;
        }
    }
}
