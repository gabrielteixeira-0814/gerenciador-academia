<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MaintenanceService;
use App\Services\GadgetsService;

class MaintenanceController extends Controller
{
    private $service;

    public function __construct(MaintenanceService $service, GadgetsService $service_gadgets)
    {
        $this->service = $service;
        $this->service_gadgets = $service_gadgets;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title_table = 'Manutenções';
        $title_action = 'Tabela';
        $data = $this->service->maintenances();

        return view('maintenance.list', compact('data', 'title_table', 'title_action'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title_table = 'Manutenções';
        $title_action = 'Formulário';
        $title_function = 'Criar';
        $list_gadgets = $this->service_gadgets->gadgets();

        return view('maintenance.form', compact('title_table', 'title_action', 'title_function', 'list_gadgets'));
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
        if (!$this->service->store($request)) {
            return back()->with('error', 'Não foi possível criar a manutenção!');
        }
        return back()->with('success', 'Manutenção agendada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title_table = 'Manutenções';
        $title_action = 'Detalhes';
        $data = $this->service->get($id)[0];
        return view('maintenance.show', compact('data', 'title_table', 'title_action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title_table = 'Manutenções';
        $title_action = 'Formulário';
        $title_function = 'Editar';
        $list_gadgets = $this->service_gadgets->gadgets();

        if (!($data = $this->service->get($id))) {
            return back()->with('error', 'Não foi encontrar o usuário!');
        }

        return view('maintenance.form', compact('data', 'title_table', 'title_action', 'title_function', 'list_gadgets'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->service->update($request, $id)) {
            return back()->with('error', 'Não foi possível editar a manutenção!');
        }
        return back()->with('success', 'Manutenção editada com sucesso.');
    }

    public function delete($id)
    {
        if (!$this->service->destroy($id)) {
            return back()->with('error', 'Não foi possível excluir a manutenção!');
        }

        return back()->with('success', 'Manutenção excluida com sucesso.');
    }
}
