<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ClientRepositoryInterface
{
    public function __construct(Model $model);
    public function store(array $data);
    public function clients();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}





?>
