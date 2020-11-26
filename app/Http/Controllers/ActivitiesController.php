<?php

namespace App\Http\Controllers;

use App\Services\Activities\IndexActivitiesService;
use App\Services\Activities\StoreActivitiesService;
use App\Services\Activities\ShowActivitiesService;
use App\Services\Activities\UpdateActivitiesService;
use App\Services\Activities\DeleteActivitiesService;
use App\Http\Requests\Activities\StoreActivitiesRequest;
use App\Http\Requests\Activities\UpdateActivitiesRequest;

class ActivitiesController extends Controller
{
    /**
     * Get all activities
     * @param \App\Services\Activities\IndexActivitiesService
     */
    public function index(IndexActivitiesService $indexActivitiesService)
    {
        $response = $indexActivitiesService->run();
        return response($response);
    }

    /**
     * Create a new activity
     * @param \App\Http\Requests\Activities\StoreActivitiesRequest
     * @param \App\Services\Activities\StoreActivitiesService
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
     * @param \App\Services\Activities\ShowActivitiesService
     */
    public function show($id, ShowActivitiesService $showActivitiesService)
    {
        $response = $showActivitiesService->run($id);
        return response($response);
    }
    /**
     * Update the activity by id
     * @param integer id
     * @param \App\Http\Requests\Activities\UpdateActivitiesRequest
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
     * @param \App\Services\Activities\DeleteActivitiesService
     */
    public function destroy($id, DeleteActivitiesService $deleteActivitiesService)
    {
        $response = $deleteActivitiesService->run($id);
        return response($response);
    }
}
