<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RemoteClass extends Model
{
    
    public function disciplines()
    {  
        return $this->belongsTo(Discipline::class,'disciplines_id','id');  
    }
    public function today()
    {  
        return RemoteClass::where('date', '=',Carbon::today('GMT-3')->toDateString())->get();  
    }
}
