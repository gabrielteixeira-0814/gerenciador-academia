<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $service)
    {
        // $this->middleware('auth');

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title_table = 'Usuários';
        $title_action = 'Tabela';
        $users = $this->service->users();
        return view('user.list', compact('users', 'title_table', 'title_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title_table = 'Usuários';
        $title_action = 'Formulário';
        return view('user.form', compact('title_table', 'title_action'));
    }

    public function users()
    {
        return $this->service->users();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        if (!$this->service->store($request)) {
            return back()->with('error', 'Não foi possível criar o usuário!');
        }
        return back()->with('success', 'Usuário criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title_table = 'Usuário';
        $title_action = 'Detalhes';
        $data = $this->service->get($id);
        return view('user.show', compact('data', 'title_table', 'title_action'));
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        if (!$this->service->destroy($id)) {
            return back()->with('error', 'Não foi possível excluir o usuário!');
        }

        return back()->with('success', 'Usuário criado com sucesso.');
    }
}
