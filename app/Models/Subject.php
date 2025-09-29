<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = ['igcse_course_id', 'title', 'image'];


    public function igcseCourse()
    {
        return $this->belongsTo(IgcseCourse::class);
    }
}
