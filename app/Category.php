<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Lesson(){
        return $this->hasMany('App\Lesson');
    }
}
