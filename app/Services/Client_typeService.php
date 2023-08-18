<?php

namespace App\Services;
use App\Repositories\Client_typeRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;

class Client_typeService
{
    private $repo;

    public function __construct(Client_typeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'type.required' => 'O nome do tipo do cliente é obrigatório!',
            'type.min' => 'É necessário no mínimo 3 caracteres no tipo do cliente!',
            'type.max' => 'É necessário no Máximo 255 caracteres no tipo do cliente!',

            'is_enabled.required' => 'O is_enabled do tipo do cliente é obrigatório!',
        ];

        $data = $request->validate([
            'type' => 'required|string|min:3|max:255',
            'is_enabled' => 'required|boolean',

        ], $mensagens);

        return $this->repo->store($data);
    }

    public function clients_type()
    {
        return $this->repo->clients_type();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
        $mensagens = [
            'type.required' => 'O nome do tipo do cliente é obrigatório!',
            'type.min' => 'É necessário no mínimo 5 caracteres no tipo do cliente!',
            'type.max' => 'É necessário no Máximo 255 caracteres no tipo do cliente!',

            'is_enabled.required' => 'O is_enabled do tipo do cliente é obrigatório!',
        ];

        $data = $request->validate([
            'type' => 'required|string|min:5|max:255',
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
