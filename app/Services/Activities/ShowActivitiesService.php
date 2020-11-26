<?php

namespace App\Services\Activities;

use App\Contracts\ActivitiesInterface;

class ShowActivitiesService
{
    /**
     * @var ActivitiesInterface
     */
    private $activitiesInterface;

    public function __construct(ActivitiesInterface $activitiesInterface)
    {
        $this->activitiesInterface = $activitiesInterface;
    }

    /**
     * @param $data
     * @return array[]|mixed
     */
    public function run($id)
    {
        try {
            return [
                'data' => $this->activitiesInterface->find($id),
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
