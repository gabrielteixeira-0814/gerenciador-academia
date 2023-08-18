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
            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Detalhes do Funcionário</h5>

                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 label fw-bold">Cargo</div>
                  <div class="col-lg-9 col-md-8">{{ $data->office ?? '-' }}</div>
                </div>

                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 label fw-bold">Status</div>
                  <div class="col-lg-9 col-md-8">{{ $data->is_enabled ? 'Ativo' :  'Inativo' }}</div>
                </div>

                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 label fw-bold">Data de Cadastro</div>
                  <div class="col-lg-9 col-md-8">{{ date("d/m/Y", strtotime($data->created_at)) ?? '-' }} </div>
                </div>
              </div>
          </div>
        </div>

      </div>
    </div>
</section>
@endsection
