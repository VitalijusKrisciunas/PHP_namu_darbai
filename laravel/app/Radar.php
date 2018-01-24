<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Radar extends Model
{
    use softDeletes;

    protected $table = 'radars';

    protected $fillable = ['date', 'number', 'distance', 'time', 'deleted_at'];
}
