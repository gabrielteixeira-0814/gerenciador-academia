<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GadgetsService;

class GadgetsController extends Controller
{
    private $service;

    public function __construct(GadgetsService $service)
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
        $title_table = 'Aparelho';
        $title_action = 'Tabela';
        $data = $this->service->gadgets();
        // $data = Employee::with('user')->findOrFail(1);
        return view('gadgets.list', compact('data', 'title_table', 'title_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title_table = 'Aparelho';
        $title_action = 'Formulário';
        $title_function = 'Criar';
        return view('gadgets.form', compact('title_table', 'title_action', 'title_function'));
    }

    public function gadgets()
    {
        return $this->service->gadgets();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        if (!$this->service->store($request)) {
            return back()->with('error', 'Não foi possível criar o aparelho!');
        }
        return back()->with('success', 'Aparelho criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title_table = 'Aparelho';
        $title_action = 'Detalhes';
        $data = $this->service->get($id);
        return view('gadgets.show', compact('data', 'title_table', 'title_action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title_table = 'Aparelho';
        $title_action = 'Formulário';
        $title_function = 'Editar';

        if (!($data = $this->service->get($id))) {
            return back()->with('error', 'Não foi encontrado o Aparelho!');
        }

        return view('gadgets.form', compact('data', 'title_table', 'title_action', 'title_function'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->service->update($request, $id)) {
            return back()->with('error', 'Não foi possível editar o Aparelho!');
        }
        return back()->with('success', 'Aparelho editado com sucesso.');
    }

    public function delete($id)
    {
        if (!$this->service->destroy($id)) {
            return back()->with('error', 'Não foi possível excluir o Aparelho!');
        }

        return back()->with('success', 'Aparelho excluido com sucesso.');
    }
}
