<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundationCourse extends Model
{
    //
    protected $fillable = [
        'title',
        'age',
        'duration',
        'image'
    ];
}
