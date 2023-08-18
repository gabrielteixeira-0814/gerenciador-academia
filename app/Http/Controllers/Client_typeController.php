<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client_typeService;

class Client_typeController extends Controller
{
    private $service;

    public function __construct(Client_typeService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title_table = 'Tipo de Cliente';
        $title_action = 'Tabela';
        $data = $this->service->clients_type();
        // $data = Employee::with('user')->findOrFail(1);
        return view('client_type.list', compact('data', 'title_table', 'title_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title_table = 'Tipo de Cliente';
        $title_action = 'Tipo de Cliente';
        $title_function = 'Criar';
        return view('client_type.form', compact('title_table', 'title_action', 'title_function'));
    }

    public function clients_type()
    {
        return $this->service->clients_type();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        if (!$this->service->store($request)) {
            return back()->with('error', 'Não foi possível criar o tipo do cliente!');
        }

        return back()->with('success', 'Tipo do cliente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title_table = 'Tipo de Cliente';
        $title_action = 'Detalhes';
        $data = $this->service->get($id);
        return view('client_type.show', compact('data', 'title_table', 'title_action'));
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
