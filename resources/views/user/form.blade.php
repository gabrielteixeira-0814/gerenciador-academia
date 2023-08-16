@extends('layouts.layout')

@section('content')
<div class="pagetitle">
    <h1>{{ $title_table ? 'Usuário' : '-' }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">{{ $title_action ?? '-' }}</li>
        <li class="breadcrumb-item">{{ $title_table ? 'Usuário' : '-' }}</li>
        @if ($title_function)
        <li class="breadcrumb-item active">{{ $title_function ?? '-' }}</li>
        @endif
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
            <form action="{{ !isset($data) ? route('user.store') : route('user.update', $data->id)}}" method="POST" class="row g-3 justify-content-center">
                @if (!isset($data))
                    @method('POST')
                @else
                    @method('PUT')
                @endif
                @csrf

                @error('name', 'email', 'type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-7">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ isset($data) != '' ? $data->name :  old('name') }}">
                </div>
                <div class="col-2" style="padding-top: 38px">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_enabled" name="is_enabled" value="1" {{  isset($data) && $data->is_enabled? 'checked' :  '' }}>
                        <label class="form-check-label" for="gridCheck1">
                        Ativo
                        </label>
                    </div>
                </div>
                <div class="col-9">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ isset($data) != '' ? $data->email :  old('email') }}">
                </div>
                <div class="col-9">
                    <label for="type" class="form-label">Tipo Usuário</label>
                    <select id="type" name="type" class="form-select">
                        <option value="comum" {{ isset($data) && $data->type ===  'comum' ? 'selected' :  '' }}>Comum</option>
                        <option value="admin" {{ isset($data) && $data->type === 'admin' ? 'selected' :  '' }}>Admin</option>
                    </select>
                </div>

                @if (!isset($data))
                    <div class="col-9">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="col-9">
                        <label for="password_confirmation" class="form-label">Confirmar senha</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>
                @endif
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
