<?php

namespace App\Repositories;

use App\Contracts\DisciplinesInterface;
use App\Models\Discipline;

class DisciplinesRepository extends AbstractRepository implements DisciplinesInterface
{
    protected $model = Discipline::class;

    // public function index($request){
    //     if ( $request->has('data') )
    //     {
    //         return "oi";
    //     }else{
    //         return $this->all();
    //     }
    // }
    public function getActivities($id){
        $disciplines = Discipline::find($id);
        return $disciplines->activities()->get();
    }
}
