<?php

namespace App;

class Room extends BaseModel
{
    protected $fillable = [
        'name_sk',
        'name_en',
        'slug_sk',
        'slug_en',
        'description_sk',
        'description_en'
    ];
    public function getNameAttribute(){
        return $this->_translateProperty('name');
    }

    public function getSlugAttribute(){
        return $this->_translateProperty('slug');
    }
    public function getDescriptionAttribute(){
        return $this->_translateProperty('description');
    }
}
