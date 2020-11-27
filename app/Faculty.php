<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faculties';

    public function workplaces(){
        return $this->hasMany('App\Workplace');
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

}
