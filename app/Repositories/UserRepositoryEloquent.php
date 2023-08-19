<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class UserRepositoryEloquent implements UserRepositoryInterface
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

    public function users()
    {
        return $this->model->all();
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

    public function getDataUser($cpf)
    {
        $findUser = $this->model->where('cpf', $cpf)->select('id','cpf','name','email')->get();
        if ($findUser[0]) {
            return response()->json($findUser[0]);
        }
        return response()->json("Não foi encontrado nenhum usuário");
    }
}

?>
