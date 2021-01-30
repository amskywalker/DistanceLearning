<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $casts = [
        'delivery_date' => 'datetime:dd/mm/yyyy',
    ];
    public $fillable = ['title', 'disciplines_id', 'description', 'delivery_date'];

    public function setDeliveryDateAttribute($value): string
    {
        return $this->attributes['delivery_date'] =
            Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function getDeliveryDateAttribute($value): string
    {
        return $this->attributes['delivery_date'] =
            Carbon::parse($value)->format('d/m/Y');
    }
}
