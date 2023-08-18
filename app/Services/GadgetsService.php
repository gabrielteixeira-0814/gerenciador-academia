<?php

namespace App\Services;
use App\Repositories\GadgetsRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;

class GadgetsService
{
    private $repo;

    public function __construct(GadgetsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        $mensagens = [
            'name.required' => 'O nome do aparelho é obrigatório!',
            'name.string' => 'É necessário se do tipo String!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do aparelho!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do aparelho!',

            'description.required' => 'O descrição do de aparelho é obrigatório!',
            'description.string' => 'É necessario se do tipo String!',
            'description.min' => 'É necessário no mínimo 5 caracteres na descrição do aparelho!',
            'description.max' => 'É necessário no Máximo 255 caracteres na descrição do aparelho!',

            'quantity.required' => 'A quantidade do aparelho é obrigatório!',
            'quantity.int' => 'É necessário se do tipo INT!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',

        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:255',
            'quantity' => 'required|int',
            'is_enabled' => 'required|boolean'
        ], $mensagens);

        return $this->repo->store($data);
    }

    public function gadgets()
    {
        return $this->repo->gadgets();
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
            'name.required' => 'O nome do aparelho é obrigatório!',
            'name.string' => 'É necessário se do tipo String!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do aparelho!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do aparelho!',

            'description.required' => 'O descrição do de aparelho é obrigatório!',
            'description.string' => 'É necessario se do tipo String!',
            'description.min' => 'É necessário no mínimo 5 caracteres na descrição do aparelho!',
            'description.max' => 'É necessário no Máximo 255 caracteres na descrição do aparelho!',

            'quantity.required' => 'A quantidade do aparelho é obrigatório!',
            'quantity.int' => 'É necessário se do tipo INT!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',

        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:255',
            'quantity' => 'required|int',
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
