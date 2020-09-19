<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name','description','slug','image','video','category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
