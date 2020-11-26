<?php

namespace App\Http\Controllers;

use App\Services\Disciplines\GetActivitiesDisciplinesService;

class DisciplineActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Services\Disciplines\GetActivitiesDisciplinesService
     */
    public function index($id, GetActivitiesDisciplinesService $getActivitiesDisciplinesService)
    {
        $response = $getActivitiesDisciplinesService->run($id);
        return response($response);
    }
}
