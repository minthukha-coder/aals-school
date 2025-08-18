<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //

    protected $fillable = ['name', 'salary','date','place','responsibilities','requirements', 'highlight', 'benefits'];
}
