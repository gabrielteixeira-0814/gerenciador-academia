<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class ClientRepositoryEloquent implements ClientRepositoryInterface
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

    public function clients()
    {
        return $this->model->with('user')->with('clients_type')->get();
    }

    public function get($id)
    {
        return $this->model->findOrFail($id)->with('user')->with('clients_type')->get();
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
