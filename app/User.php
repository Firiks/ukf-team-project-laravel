<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'admin',
        'super_admin',
        'student',
        'pracovnik',
        'workplace_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }

    public function workplace(){
        return $this->belongsTo('App\Workplace');
    }

    public function get_image($image){
        $path = 'data/users/' . $this->id . '/';
        $image_path = $path . $image;

        return $image_path;
    }

    public function get_thumb($image){
        $path = 'data/users/' . $this->id . '/';
        $image_path = $path . $image;

        return $image_path;
    }

    public function getProfileImageAttribute(){
        $path = 'data/users/' . $this->id . '/';

        if($this->images->where('profile', 1)->count() > 0){
            return $path . $this->images()->where('profile', 1)->first()->image;
        }else{
            return false;
        }
    }

    public function getProfileThumbAttribute(){
        $path = 'data/users/' . $this->id . '/';

        if($this->images->where('profile', 1)->count() > 0){
            return $path . $this->images()->where('profile', 1)->first()->thumb;
        }else{
            return false;
        }
    }

}
