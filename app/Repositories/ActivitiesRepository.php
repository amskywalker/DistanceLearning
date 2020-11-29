<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Contracts\ActivitiesInterface;
use Illuminate\Support\Facades\DB;

class ActivitiesRepository extends AbstractRepository implements ActivitiesInterface
{
    protected $model = Activity::class;
    public function index()
    {
        return
            $this->model::select('id', 'disciplines_id', 'title', 'description', 'delivery_date')
            ->when(!empty(request()->get('today')), function ($query) {
                return $query->where(DB::raw('cast(delivery_date as date)'), '=', today()->toDateString());
            })
            ->when(!empty(request()->get('valids')), function ($query) {
                return $query->where(DB::raw('cast(delivery_date as date)'), '>=', today()->toDateString());
            })
            ->when(!empty(request()->get('invalids')), function ($query) {
                return $query->where(DB::raw('cast(delivery_date as date)'), '<', today()->toDateString());
            })
            ->when(!empty(request()->get('week')), function ($query) {
                return $query
                ->whereBetween(DB::raw('cast(delivery_date as date)'), [today()->toDateString(), today()->addDays(7)->toDateString()]);
            })
            ->latest('id')
            ->get();
    }
}
