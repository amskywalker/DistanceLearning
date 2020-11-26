<?php

namespace App\Contracts;

interface DisciplinesInterface extends BaseInterface
{
    public function getActivities($id);
}
