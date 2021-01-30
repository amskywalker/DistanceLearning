<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Disciplines\GetActivitiesDisciplinesService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class DisciplineActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @param GetActivitiesDisciplinesService $getActivitiesDisciplinesService
     * @return GetActivitiesDisciplinesService|Application|ResponseFactory|Response
     */
    public function index($id, GetActivitiesDisciplinesService $getActivitiesDisciplinesService)
    {
        $response = $getActivitiesDisciplinesService->run($id);
        return response($response);
    }
}
