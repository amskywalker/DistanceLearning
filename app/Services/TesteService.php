<?php

namespace App\Services;

use App\Repositories\DisciplinesRepository;

class TesteService
{
    public function run($id)
    {
        $disciplines = (new DisciplinesRepository)->find($id);
        dd($disciplines->activities()->get());
    }
}
