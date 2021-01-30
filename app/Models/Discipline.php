<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = "disciplines";
    public $fillable = ['name','openinghours','teacher'];
    /**
     * Function to get activities to disciplines
     */
    public function activities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Activity::class, 'disciplines_id', 'id');
    }

}
