<?php

namespace App;

class Image extends BaseModel
{
    protected $fillable = [
        'image',
        'thumb',
        'profile'
    ];

    public function imageable(){
        return $this->morphTo('imageable');
    }
}
