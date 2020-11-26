<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $dates = ['delivery_date'];
    public $fillable = ['title', 'disciplines_id', 'description', 'delivery_date'];
}
