<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IgsceCourse extends Model
{
    //

    protected $fillable = ['title', 'duration', 'price_monthly', 'image'];

    public  function subjects()
    {
        return $this->hasMany(Subject::class, 'igscse_course_id');
    }
}
