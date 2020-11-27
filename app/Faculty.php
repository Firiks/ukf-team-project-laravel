<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
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

    public function getNameAttribute(){
        return $this->_translateProperty('name');
    }

    public function getSlugAttribute(){
        return $this->_translateProperty('slug');
    }
}
