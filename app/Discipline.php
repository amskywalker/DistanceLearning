<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function remote_classes()
    {
        return $this->hasMany(RemoteClass::class, 'disciplines_id', 'id');
    }
}
