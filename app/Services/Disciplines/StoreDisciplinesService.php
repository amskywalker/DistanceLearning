<?php

namespace App\Services\Disciplines;

use App\Contracts\DisciplinesInterface;

class StoreDisciplinesService
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
    public function run($data)
    {
        try {
            $this->disciplinesInterface->save($data);
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
