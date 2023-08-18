<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    private $service;

    public function __construct(EmployeeService $service)
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
        $title_table = 'Funcionários';
        $title_action = 'Tabela';
        $data = $this->service->employees();
        // $data = Employee::with('user')->findOrFail(1);
        return view('employee.list', compact('data', 'title_table', 'title_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title_table = 'Funcionário';
        $title_action = 'Formulário';
        $title_function = 'Criar';
        return view('employee.form', compact('title_table', 'title_action', 'title_function'));
    }

    public function employees()
    {
        return $this->service->employees();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        if (!$this->service->store($request)) {
            return back()->with('error', 'Não foi possível criar o cargo!');
        }
        return back()->with('success', 'Cargo criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title_table = 'Funcionário';
        $title_action = 'Detalhes';
        $data = $this->service->get($id);
        return view('employee.show', compact('data', 'title_table', 'title_action'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title_table = 'Funcionário';
        $title_action = 'Formulário';
        $title_function = 'Editar';

        if (!($data = $this->service->get($id))) {
            return back()->with('error', 'Não foi encontrado o funcionário!');
        }

        return view('employee.form', compact('data', 'title_table', 'title_action', 'title_function'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->service->update($request, $id)) {
            return back()->with('error', 'Não foi possível editar o cargo!');
        }
        return back()->with('success', 'Cargo editado com sucesso.');
    }

    public function delete($id)
    {
        if (!$this->service->destroy($id)) {
            return back()->with('error', 'Não foi possível excluir o cargo!');
        }

        return back()->with('success', 'Cargo excluido com sucesso.');
    }
}
