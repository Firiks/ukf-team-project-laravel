<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends BaseModel
{
    protected $fillable = [
        'name_sk',
        'name_en',
        'slug_sk',
        'slug_en'
    ];

    public function workplaces(){
        return $this->hasMany('App\Workplace');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function getNameAttribute(){
        return $this->_translateProperty('name');
    }

    public function getSlugAttribute(){
        return $this->_translateProperty('slug');
    }
}
