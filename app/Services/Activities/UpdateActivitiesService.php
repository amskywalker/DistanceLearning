<?php

namespace App\Services\Activities;

use App\Contracts\ActivitiesInterface;

class UpdateActivitiesService
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
     * @param $id
     * @return 
     */
    public function run($id, array $array)
    {
        try {
            $this->activitiesInterface->update($id, $array);
            return [
                'message' => 'Updated Successfully',
                'status' => '200'
            ];
        } catch (\Exception $e) {
            return [
                'errors' => [
                    'title' => $e->getMessage(),
                ],
            ];
        }
    }
}
