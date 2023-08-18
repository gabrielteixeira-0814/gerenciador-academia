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
         if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        $mensagens = [
            'office.required' => 'O nome do aparelho é obrigatório!',
            'office.string' => 'É necessário se do tipo String!',
            'office.min' => 'É necessário no mínimo 5 caracteres no nome do aparelho!',
            'office.max' => 'É necessário no Máximo 255 caracteres no nome do aparelho!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',
        ];

        $data = $request->validate([
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
        if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        $mensagens = [
            'office.required' => 'O nome do aparelho é obrigatório!',
            'office.string' => 'É necessário se do tipo String!',
            'office.min' => 'É necessário no mínimo 5 caracteres no nome do aparelho!',
            'office.max' => 'É necessário no Máximo 255 caracteres no nome do aparelho!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',
        ];

        $data = $request->validate([
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
