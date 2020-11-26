<?php

namespace App\Services\Disciplines;

use App\Contracts\DisciplinesInterface;

class GetActivitiesDisciplinesService
{
    /**
     * @var DisciplinesInterface
     */
    private $disciplinesInterface;

    public function __construct(DisciplinesInterface $disciplinesInterface)
    {
        $this->disciplinesInterface = $disciplinesInterface;
    }
    /**
     * @param $data
     * @return array[]|mixed
     */
    public function run($id)
    {
        try {
            return [
                'data' => $this->disciplinesInterface->getActivities($id),
                'status' => '200',
            ];
        } catch (\Exception $e) {
            return [
                'errors' => [
                    'title' => $e->getMessage(),
                ]
            ];
        }
    }
}
