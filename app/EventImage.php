<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $fillable = [
        'image',
        'thumb',
        'event_id'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
