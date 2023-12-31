@extends('layouts.layout')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">{{ $title_action ?? '-' }}</li>
        <li class="breadcrumb-item active">{{ $title_table }}</li>
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
                <div class="col-4">
                    <p class="card-title text-end">
                        <button type="button" class="btn btn-primary btn-sm">
                            <a href="{{ route('client.create')}}" class="text-decoration-none text-white">NOVO</a>
                        </button>
                    </p>
                </div>
            </div>
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul style="list-style: none;">
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul style="list-style: none;">
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Usuário</th>
                  <th scope="col">Tipo de Cliente</th>
                  <th scope="col">Status</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{ $client->id ?? '-' }}</th>
                    <td>{{ $client->name ?? '-' }}</td>
                    <td>{{ isset($client->user->id) ? 'SIM' : 'NÃO' }}</td>
                    <td>{{ $client->clients_type->type ?? '-' }}</td>
                    <td>{{ $client->is_enabled ? 'Ativo' :  'Inativo' }}</td>
                    <td>
                        <a href='{{route('client.show',$client->id)}}' class='btn btn-secondary btn-sm'><i class="bi bi-eye-fill"></i></a>
                        <a href='{{route('client.edit',$client->id)}}' class='btn btn-success btn-sm'><i class="bi bi-pencil"></i></a>
                        <a href="{{route('delete_client',$client->id)}}" class='btn btn-danger btn-sm'><i class="bi bi-trash-fill"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
</section>
@endsection
