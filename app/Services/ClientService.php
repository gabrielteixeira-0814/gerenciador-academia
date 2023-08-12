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
        $mensagens = [
            'user_id.required' => 'O id do usuário é obrigatório!',
            'user_id.int' => 'É necessário se do tipo INT!',

            'employee_id.required' => 'O id do funcionário é obrigatório!',
            'employee_id.int' => 'É necessário se do tipo INT!',

            'client_type_id.required' => 'O id do tipo do cliente é obrigatório!',
            'client_type_id.int' => 'É necessário se do tipo INT!',

            'date.required' => 'O data da entrada do cliente é obrigatório!',
            'date.date' => 'É necessario se do tipo data!',

            'age.required' => 'A Idade do cliente é obrigatório!',
            'age.int' => 'É necessário se do tipo INT!',

            'weight.required' => 'O peso do cliente é obrigatório!',
            'weight.numeric' => 'É necessário se do tipo Numeric!',

            'height.required' => 'A altura do cliente é obrigatório!',
            'height.numeric' => 'É necessário se do tipo Numeric!',

            'is_enabled.required' => 'O is_enabled do tipo do cliente é obrigatório!',
        ];

        $data = $request->validate([
            'user_id' => 'required|int',
            'employee_id' => 'required|int',
            'client_type_id' => 'required|int',
            'date' => 'required|date',
            'age' => 'required|int',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
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
        $mensagens = [
            'user_id.required' => 'O id do usuário é obrigatório!',
            'user_id.int' => 'É necessário se do tipo INT!',

            'employee_id.required' => 'O id do funcionário é obrigatório!',
            'employee_id.int' => 'É necessário se do tipo INT!',

            'client_type_id.required' => 'O id do tipo do cliente é obrigatório!',
            'client_type_id.int' => 'É necessário se do tipo INT!',

            'date.required' => 'O data da entrada do cliente é obrigatório!',
            'date.date' => 'É necessario se do tipo data!',

            'age.required' => 'A Idade do cliente é obrigatório!',
            'age.int' => 'É necessário se do tipo INT!',

            'weight.required' => 'O peso do cliente é obrigatório!',
            'weight.numeric' => 'É necessário se do tipo Numeric!',

            'height.required' => 'A altura do cliente é obrigatório!',
            'height.numeric' => 'É necessário se do tipo Numeric!',

            'is_enabled.required' => 'O is_enabled do tipo do cliente é obrigatório!',
        ];

        $data = $request->validate([
            'user_id' => 'required|int',
            'employee_id' => 'required|int',
            'client_type_id' => 'required|int',
            'date' => 'required|date',
            'age' => 'required|int',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
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
