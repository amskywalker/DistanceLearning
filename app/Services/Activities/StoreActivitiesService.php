<?php

namespace App\Services\Activities;

use App\Contracts\ActivitiesInterface;

class StoreActivitiesService
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
    public function run($data)
    {
        try {
            $this->activitiesInterface->save($data);
            return [
                'message' => 'Stored Successfully',
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
