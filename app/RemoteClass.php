<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemoteClass extends Model
{
    
    public function disciplines()
    {  
        return $this->belongsTo(Discipline::class,'disciplines_id','id');  
    }
}
