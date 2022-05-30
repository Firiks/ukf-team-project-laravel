<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getFormattedCreatedAtAttribute(){
        return Carbon::parse($this->created_at)->format('d.m.Y H:i:s');
    }

    public function getFormattedUpdatedAdAttribute(){
        return Carbon::parse($this->updated_at)->format('d.m.Y H:i:s');
    }

    protected function _translateProperty($property, $returnNull = false){
        $translatedStr = $this->{$property . '_' . app()->getLocale()};

        $returnValue = $returnNull ? null : $this->{$property . '_sk'};

        return isset($translatedStr) && $translatedStr != "" ? $translatedStr : $returnValue;
    }
}
