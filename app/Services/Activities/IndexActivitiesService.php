<?php

namespace App\Services\Activities;

use App\Contracts\ActivitiesInterface;
use Carbon\Carbon;

class IndexActivitiesService
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
    public function run()
    {
        try {
            return [
                'data' => $this->activitiesInterface->index(),
                'status' => '200'
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
