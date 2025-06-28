<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CambridgeExamCourse extends Model
{
    //
    protected $fillable = [
        'name',
        'duration',
        'months',
        'image',
    ];
}
