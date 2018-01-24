<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $primaryKey = 'driver_id';

    protected $fillable = ['name', 'city'];

}
