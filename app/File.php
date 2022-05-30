<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends BaseModel
{
    protected $fillable = [
        'name_sk',
        'slug_sk',
        'name_en',
        'slug_en',
        'type'
    ];

    public function getNameAttribute(){
        return $this->_translateProperty('name');
    }

    public function getSlugAttribute(){
        return $this->_translateProperty('slug');
    }
}
