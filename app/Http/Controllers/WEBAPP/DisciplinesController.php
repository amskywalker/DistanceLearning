<?php

namespace App\Http\Controllers\WEBAPP;

use App\Http\Controllers\Controller;
use App\Services\Disciplines\StoreDisciplinesService;
use App\Services\Disciplines\IndexDisciplinesService;
use App\Services\Disciplines\ShowDisciplinesService;
use App\Services\Disciplines\UpdateDisciplinesService;
use App\Services\Disciplines\DeleteDisciplinesService;
use App\Http\Requests\Disciplines\StoreDisciplinesRequest;
use App\Http\Requests\Disciplines\UpdateDisciplinesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Inertia\Inertia;

class DisciplinesController extends Controller
{
    /**
     * Get all discipline
     * @param IndexDisciplinesService $indexDisciplineService
     * @return mixed
     */
    public function index(IndexDisciplinesService $indexDisciplineService)
    {
        $disciplines = $indexDisciplineService->run();
        return Inertia::render('Disciplines/Index', compact('disciplines'));
    }

    /**
     * Create a new discipline
     * @param StoreDisciplinesRequest $storeDisciplinesRequest
     * @param StoreDisciplinesService $storeDisciplineService
     * @return mixed
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
     * @param ShowDisciplinesService $showDisciplineService
     * @return Application|ResponseFactory|Response
     */
    public function show($id, ShowDisciplinesService $showDisciplineService)
    {
        $response = $showDisciplineService->run($id);
        return response($response);
    }

    /**
     * Update the discipline by id
     * @param integer id
     * @param UpdateDisciplinesRequest $updateDisciplinesRequest
     * @param UpdateDisciplinesService $updateDisciplineService
     * @return Application|ResponseFactory|Response
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
     * @param DeleteDisciplinesService $deleteDisciplineService
     * @return Application|ResponseFactory|Response
     */
    public function destroy($id, DeleteDisciplinesService $deleteDisciplineService)
    {
        $response = $deleteDisciplineService->run($id);
        return response($response);
    }
}
