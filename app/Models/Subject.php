<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = ['igscse_course_id', 'title', 'image'];


    public function igsceCourse()
    {
        return $this->belongsTo(IgsceCourse::class);
    }
}
