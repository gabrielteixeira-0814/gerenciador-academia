<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\Client_typeService;

class ClientController extends Controller
{
    private $service;

    public function __construct(ClientService $service, Client_typeService $service_client_type)
    {
        $this->middleware('auth');
        $this->service = $service;
        $this->service_client_type = $service_client_type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title_table = 'Clientes';
        $title_action = 'Tabela';
        $clients = $this->service->clients();
        return view('client.list', compact('clients', 'title_table', 'title_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title_table = 'Clientes';
        $title_action = 'Formulário';
        $title_function = 'Criar';
        $list_clients_type = $this->service_client_type->clients_type();

        return view('client.form', compact('title_table', 'title_action', 'title_function', 'list_clients_type'));
    }

    public function clients()
    {
        return $this->service->clients();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        if (!$this->service->store($request)) {
            return back()->with('error', 'Não foi possível criar o cliente!');
        }
        return back()->with('success', 'Cliente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title_table = 'Cliente';
        $title_action = 'Detalhes';
        $data = $this->service->get($id);
        return view('client.show', compact('data', 'title_table', 'title_action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title_table = 'Cliente';
        $title_action = 'Formulário';
        $title_function = 'Editar';
        $list_clients_type = $this->service_client_type->clients_type();

        if (!($data = $this->service->get($id))) {
            return back()->with('error', 'Não foi encontrar o cliente!');
        }

        //return $data;

        return view('client.form', compact('data', 'title_table', 'title_action', 'title_function', 'list_clients_type'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->service->update($request, $id)) {
            return back()->with('error', 'Não foi possível editar o cliente!');
        }
        return back()->with('success', 'Cliente editado com sucesso.');
    }

    public function delete($id)
    {
        if (!$this->service->destroy($id)) {
            return back()->with('error', 'Não foi possível excluir o cliente!');
        }

        return back()->with('success', 'Cliente excluido com sucesso.');
    }
}
