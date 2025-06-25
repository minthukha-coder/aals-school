<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalCourse extends Model
{
    //
    protected $fillable = [
        'title',
        'duration',
        'image',
    ];
}
