<?php

namespace App\Services;
use App\Repositories\ClientRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;

class ClientService
{
    private $repo;

    public function __construct(ClientRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        if (!$request['is_employee']) {
            $request['is_employee'] = 0;
        }

        $mensagens = [
            'name.required' => 'O nome do cliente é obrigatório!',
            'name.string' => 'É necessário se do tipo string!',

            'user_id.int' => 'É necessário se do tipo INT!',

            'client_type_id.required' => 'O id do tipo do cliente é obrigatório!',
            'client_type_id.int' => 'É necessário se do tipo INT!',

            'age.required' => 'A Idade do cliente é obrigatório!',
            'age.int' => 'É necessário se do tipo INT!',

            'weight.required' => 'O peso do cliente é obrigatório!',
            'weight.numeric' => 'É necessário se do tipo Numeric!',

            'height.required' => 'A altura do cliente é obrigatório!',
            'height.numeric' => 'É necessário se do tipo Numeric!',

            'is_employee.required' => 'O is_employee do funciónario é obrigatório!',
            'is_enabled.required' => 'O is_enabled do tipo do cliente é obrigatório!',
        ];

        $data = $request->validate([
            'name' => 'required|string',
            'user_id' => 'int|nullable',
            'client_type_id' => 'required|int',
            'age' => 'required|int',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'is_employee' => 'required|boolean',
            'is_enabled' => 'required|boolean',

        ], $mensagens);

        return $this->repo->store($data);
    }

    public function clients()
    {
        return $this->repo->clients();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
        if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        if (!$request['is_employee']) {
            $request['is_employee'] = 0;
        }

        $mensagens = [
            'name.required' => 'O nome do cliente é obrigatório!',
            'name.string' => 'É necessário se do tipo string!',

            'user_id.int' => 'É necessário se do tipo INT!',

            'client_type_id.required' => 'O id do tipo do cliente é obrigatório!',
            'client_type_id.int' => 'É necessário se do tipo INT!',

            'age.required' => 'A Idade do cliente é obrigatório!',
            'age.int' => 'É necessário se do tipo INT!',

            'weight.required' => 'O peso do cliente é obrigatório!',
            'weight.numeric' => 'É necessário se do tipo Numeric!',

            'height.required' => 'A altura do cliente é obrigatório!',
            'height.numeric' => 'É necessário se do tipo Numeric!',

            'is_employee.required' => 'O is_employee do funciónario é obrigatório!',
            'is_enabled.required' => 'O is_enabled do tipo do cliente é obrigatório!',
        ];

        $data = $request->validate([
            'name' => 'required|string',
            'user_id' => 'int|nullable',
            'client_type_id' => 'required|int',
            'age' => 'required|int',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'is_employee' => 'required|boolean',
            'is_enabled' => 'required|boolean',

        ], $mensagens);


        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>
