<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function remote_classes()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id');
    }

    public function valids()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id')
            ->whereDate('date', '>=', Carbon::today('GMT-3')->toDateString());
    }
    public function archiveds()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id')
            ->whereDate('date', '<=', Carbon::today('GMT-3')->toDateString());
    }
}
