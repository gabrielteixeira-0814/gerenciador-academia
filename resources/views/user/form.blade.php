@extends('layouts.layout')

@section('content')
<div class="pagetitle">
    <h1>{{ $title_table ? 'Usuário' : '-' }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">{{ $title_action ?? '-' }}</li>
        <li class="breadcrumb-item active">{{ $title_table ? 'Usuário' : '-' }}</li>
      </ol>
    </nav>
</div>
<!-- End Page Title -->
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-8"><h5 class="card-title">{{ $title_table }}</h5></div>
            </div>
            <!-- Vertical Form -->
            <form class="row g-3">
                <div class="col-8">
                  <label for="name" class="form-label">Nome</label>
                  <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                          Example checkbox
                        </label>
                      </div>
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="col-12">
                    <label for="type" class="form-label">Tipo Usuário</label>
                    <select id="type" name="type" class="form-select">
                      <option value="comum" selected>Comum</option>
                      <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Senha</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirmar senha</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                  </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
            <!-- Vertical Form -->
          </div>
        </div>

      </div>
    </div>
</section>
@endsection
