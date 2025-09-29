<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IgcseCourse extends Model
{
    //

    protected $fillable = ['title', 'duration', 'price_monthly', 'image'];

    public  function subjects()
    {
        return $this->hasMany(Subject::class, 'igcse_course_id');
    }
}
