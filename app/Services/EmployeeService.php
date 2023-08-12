<?php

namespace App\Services;
use App\Repositories\EmployeeRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;

class EmployeeService
{
    private $repo;

    public function __construct(EmployeeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'user_id.required' => 'O id do usuário é obrigatório!',
            'user_id.int' => 'É necessário se do tipo INT!',

            'office.required' => 'O nome do aparelho é obrigatório!',
            'office.string' => 'É necessário se do tipo String!',
            'office.min' => 'É necessário no mínimo 5 caracteres no nome do aparelho!',
            'office.max' => 'É necessário no Máximo 255 caracteres no nome do aparelho!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',
        ];

        $data = $request->validate([
            'user_id' => 'required|int',
            'office' => 'required|string|min:5|max:255',
            'is_enabled' => 'required|boolean'
        ], $mensagens);

        return $this->repo->store($data);
    }

    public function employees()
    {
        return $this->repo->employees();
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

            'office.required' => 'O nome do aparelho é obrigatório!',
            'office.string' => 'É necessário se do tipo String!',
            'office.min' => 'É necessário no mínimo 5 caracteres no nome do aparelho!',
            'office.max' => 'É necessário no Máximo 255 caracteres no nome do aparelho!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',
        ];

        $data = $request->validate([
            'user_id' => 'required|int',
            'office' => 'required|string|min:5|max:255',
            'is_enabled' => 'required|boolean'
        ], $mensagens);

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>
