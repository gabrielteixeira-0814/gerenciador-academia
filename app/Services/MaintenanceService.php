<?php

namespace App\Services;
use App\Repositories\MaintenanceRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;

class MaintenanceService
{
    private $repo;

    public function __construct(MaintenanceRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'gadgets_id.required' => 'O nome do aparelho é obrigatório!',
            'gadgets_id.int' => 'É necessário se do tipo INT!',

            'date.required' => 'O data do de aparelho é obrigatório!',
            'date.date' => 'É necessario se do tipo data!',

            'interval.required' => 'O intervalo da manutenção do aparelho é obrigatório!',
            'interval.int' => 'É necessário se do tipo INT!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',

        ];

        $data = $request->validate([
            'gadgets_id' => 'required|int',
            'date' => 'required|date',
            'interval' => 'required|int',
            'is_enabled' => 'required|boolean'
        ], $mensagens);

        return $this->repo->store($data);
    }

    public function maintenances()
    {
        return $this->repo->maintenances();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
        $mensagens = [
            'gadgets_id.required' => 'O nome do aparelho é obrigatório!',
            'gadgets_id.int' => 'É necessário se do tipo INT!',

            'date.required' => 'O data do de aparelho é obrigatório!',
            'date.date' => 'É necessario se do tipo data!',

            'interval.required' => 'O intervalo da manutenção do aparelho é obrigatório!',
            'interval.int' => 'É necessário se do tipo INT!',

            'is_enabled.required' => 'O is_enabled do aparelho é obrigatório!',
            'is_enabled.boolean' => 'É necessário se do tipo boolean!',

        ];

        $data = $request->validate([
            'gadgets_id' => 'required|int',
            'date' => 'required|date',
            'interval' => 'required|int',
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
