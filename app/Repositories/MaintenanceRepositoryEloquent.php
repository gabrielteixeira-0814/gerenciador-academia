<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRepositoryEloquent implements MaintenanceRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function maintenances()
    {
        return $this->model->with('gadgets')->get();
    }

    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}

?>
