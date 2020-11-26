<?php

namespace App\Services\Disciplines;

use App\Contracts\DisciplinesInterface;

class UpdateDisciplinesService
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
     * @param $id
     * @return 
     */
    public function run($id, array $array)
    {
        try {
            $this->disciplinesInterface->update($id, $array);
            return [
                'message' => 'Updated Successfully',
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
