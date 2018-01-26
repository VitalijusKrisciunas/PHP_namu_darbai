<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Radar extends Model
{
    use softDeletes;

    protected $table = 'radars';

    protected $fillable = ['date', 'number',
     'distance', 'time', 'deleted_at', 'driver_id', 'user_id'];

    // Vairuotojas
    public function driver(){

        return $this->belongsTo(Driver::class, 'driver_id', 'driver_id');
    }

    // Adminas
    public function user(){

        return $this->belongsTo(User::class);
    }
}
