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
        $this->middleware('auth');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title_table = 'Tipo de Cliente';
        $title_action = 'Formulário';
        $title_function = 'Editar';

        if (!($data = $this->service->get($id))) {
            return back()->with('error', 'Não foi encontrado o tipo de Cliente!');
        }

        return view('client_type.form', compact('data', 'title_table', 'title_action', 'title_function'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->service->update($request, $id)) {
            return back()->with('error', 'Não foi possível editar o tipo de Cliente!');
        }
        return back()->with('success', 'Tipo de Cliente editado com sucesso.');
    }

    public function delete($id)
    {
        if (!$this->service->destroy($id)) {
            return back()->with('error', 'Não foi possível excluir o tipo de Cliente!');
        }

        return back()->with('success', 'Tipo de Cliente excluido com sucesso.');
    }
}
