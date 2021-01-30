<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Activities\IndexActivitiesService;
use App\Services\Activities\StoreActivitiesService;
use App\Services\Activities\ShowActivitiesService;
use App\Services\Activities\UpdateActivitiesService;
use App\Services\Activities\DeleteActivitiesService;
use App\Http\Requests\Activities\StoreActivitiesRequest;
use App\Http\Requests\Activities\UpdateActivitiesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class ActivitiesController extends Controller
{
    /**
     * Get all activities
     * @param IndexActivitiesService $indexActivitiesService
     * @return mixed
     */
    public function index(IndexActivitiesService $indexActivitiesService)
    {
        $response = $indexActivitiesService->run();
        return response($response);
    }

    /**
     * Create a new activity
     * @param StoreActivitiesRequest $storeActivitiesRequest
     * @param StoreActivitiesService $storeActivitiesService
     * @return Application|ResponseFactory|Response
     */
    public function store(StoreActivitiesRequest $storeActivitiesRequest, StoreActivitiesService $storeActivitiesService)
    {
        $data = $storeActivitiesRequest->validated();
        $response = $storeActivitiesService->run($data);
        return response($response);
    }

    /**
     * Get the activity by id
     * @param integer id
     * @param ShowActivitiesService $showActivitiesService
     * @return Application|ResponseFactory|Response
     */
    public function show($id, ShowActivitiesService $showActivitiesService)
    {
        $response = $showActivitiesService->run($id);
        return response($response);
    }

    /**
     * Update the activity by id
     * @param integer id
     * @param UpdateActivitiesRequest $updateActivitiesRequest
     * @param UpdateActivitiesService $updateActivitiesService
     * @return Application|ResponseFactory|Response
     */
    public function update($id, UpdateActivitiesRequest $updateActivitiesRequest, UpdateActivitiesService $updateActivitiesService)
    {
        $data = $updateActivitiesRequest->validated();
        $response = $updateActivitiesService->run($id, $data);
        return response($response);
    }

    /**
     * Delete the acitivity by id
     * @param integer id
     * @param DeleteActivitiesService $deleteActivitiesService
     * @return Application|ResponseFactory|Response
     */
    public function destroy($id, DeleteActivitiesService $deleteActivitiesService)
    {
        $response = $deleteActivitiesService->run($id);
        return response($response);
    }
}
