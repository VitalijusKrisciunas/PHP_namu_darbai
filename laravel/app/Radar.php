<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
//use App\Driver;


class Radar extends Model
{
    use softDeletes;

    protected $table = 'radars';

    protected $fillable = ['date', 'number',
     'distance', 'time', 'deleted_at'];

    public function driver(){

        return $this->belongsTo(Driver::class, 'driver_id', 'driver_id');
    }
}
