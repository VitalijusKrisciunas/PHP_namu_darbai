<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Driver extends Model
{
    use softDeletes;
    
    protected $table = 'drivers';

    protected $primaryKey = 'driver_id';

    protected $foreignKey = 'driver_id';

    protected $fillable = ['name', 'city', 'deleted_at', 'user_id'];

    // Radarai
    public function radars(){

        return $this->hasMany(Radar::class, 'driver_id', 'driver_id');
    }

    // Adminas
    public function user(){

        return $this->belongsTo(User::class);
    }

}