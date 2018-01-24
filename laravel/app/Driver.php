<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Driver extends Model
{
    use softDeletes;
    
    protected $table = 'drivers';

    protected $primaryKey = 'driver_id';

    protected $fillable = ['name', 'city', 'deleted_at'];

}
