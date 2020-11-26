<?php

namespace App\Services\Activities;

use App\Contracts\ActivitiesInterface;

class DeleteActivitiesService
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
            $this->activitiesInterface->delete($id);
            return [
                'message' => 'Deleted Successfully',
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
