<?php

namespace App\Repositories;

use App\Contracts\BaseInterface;

class AbstractRepository implements BaseInterface
{
    /**
     * Object that will be cited by the child repositories
     * @var
     */
    protected $model;

    /**
     * Assigns the model to the variable
     */
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }
    /**
     * Method responsible for receiving the model
     */
    protected function resolveModel()
    {
        return app($this->model);
    }
    /**
     * Method responsible for saving objects in the database
     * @param $array
     * @return mixed
     */
    public function save($array)
    {
        if (isset($array['id'])) {
            $obj = $this->model::find($array['id']);
            if ($obj)
                $obj->update($array);
            else
                $obj = $this->model::create($array);
            return $obj;
        } else
            return $this->model::create($array);
    }

    /**
     * methods responsible for searching all objects of a certain type
     * @return mixed
     */
    public function all()
    {
        return $this->model::all();
    }

    /**
     * Fetch a specific object from a past id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Set a specific object from an id
     * @param $id
     * @param $array
     * @return mixed
     */
    public function update($id, $array)
    {
        $obj = $this->model::find($id);
        return $obj->update($array);
    }

    /**
     * Delete a specific object
     * @param $id
     * @return mixed|void
     */
    public function delete($id)
    {
        $obj = $this->model::find($id);
        return $obj->delete();
    }
}
