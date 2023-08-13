<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MaintenanceService;

class MaintenanceController extends Controller
{
    private $service;

    public function __construct(MaintenanceService $service)
    {
        $this->service = $service;
    }

    public function maintenances()
    {
        return $this->service->maintenances();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->destroy($id);
    }
}
