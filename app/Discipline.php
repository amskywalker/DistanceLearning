<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    private $table = "disciplines";
    /**
    * Function to get all remote classes
    */
    public function remote_classes()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id');
    }

    /**
    * Function to get valids remote classes
    */
    public function valids()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id')
            ->whereDate('date', '>=', Carbon::today('GMT-3')->toDateString());
    }
    /**
     * Function to get archiveds remote classes
     */
    public function archiveds()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id')
            ->whereDate('date', '<=', Carbon::today('GMT-3')->toDateString());
    }


    /**
     * Function to get all activities
     */
    public function activities(){
        return $this->hasMany(Activity::class, 'disciplines_id', 'id');
    }

}
