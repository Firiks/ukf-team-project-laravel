<?php

namespace App;

class Workplace extends BaseModel
{
    protected $fillable = [
        'name_sk',
        'name_en',
        'slug_sk',
        'slug_en',
        'faculty_id'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function getNameAttribute(){
        return $this->_translateProperty('name');
    }

    public function getSlugAttribute(){
        return $this->_translateProperty('slug');
    }
}
