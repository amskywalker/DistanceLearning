<?php

namespace App\Http\Controllers;

use App\Services\Disciplines\StoreDisciplinesService;
use App\Services\Disciplines\IndexDisciplinesService;
use App\Services\Disciplines\ShowDisciplinesService;
use App\Services\Disciplines\UpdateDisciplinesService;
use App\Services\Disciplines\DeleteDisciplinesService;
use App\Http\Requests\Disciplines\StoreDisciplinesRequest;
use App\Http\Requests\Disciplines\UpdateDisciplinesRequest;

class DisciplinesController extends Controller
{
    /**
     * Get all discipline
     * @param \App\Services\Disciplines\IndexDisciplinesService
     */
    public function index(IndexDisciplinesService $indexDisciplineService)
    {
        $response = $indexDisciplineService->run();
        return response($response);
    }
    /**
     * Create a new discipline
     * @param \App\Http\Requests\Disciplines\StoreDisciplinesRequest
     * @param \App\Services\Disciplines\StoreDisciplinesService
     */
    public function store(StoreDisciplinesRequest $storeDisciplinesRequest, StoreDisciplinesService $storeDisciplineService)
    {
        $data = $storeDisciplinesRequest->validated();
        $response = $storeDisciplineService->run($data);
        return response($response);
    }
    /**
     * Get the discipline by id
     * @param integer id
     * @param \App\Services\Disciplines\ShowDisciplinesService
     */
    public function show($id, ShowDisciplinesService $showDisciplineService)
    {
        $response = $showDisciplineService->run($id);
        return response($response);
    }
    /**
     * Update the discipline by id
     * @param integer id
     * @param \App\Http\Requests\Disciplines\UpdateDisciplinesRequest
     */
    public function update($id, UpdateDisciplinesRequest $updateDisciplinesRequest, UpdateDisciplinesService $updateDisciplineService)
    {
        $data = $updateDisciplinesRequest->validated();
        $response = $updateDisciplineService->run($id, $data);
        return response($response);
    }
    /**
     * Delete the discipline by id
     * @param integer id
     * @param \App\Services\Disciplines\DeleteDisciplinesService
     */
    public function destroy($id, DeleteDisciplinesService $deleteDisciplineService)
    {
        $response = $deleteDisciplineService->run($id);
        return response($response);
    }
}
