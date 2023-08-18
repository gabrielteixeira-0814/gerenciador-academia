@extends('layouts.layout')

@section('content')
<div class="pagetitle">
    <h1>{{ $title_table ? 'Aparelho' : '-' }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">{{ $title_action ?? '-' }}</li>
        <li class="breadcrumb-item">{{ $title_table ? 'Aparelho' : '-' }}</li>
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
            <form action="{{ !isset($data) ? route('gadgets.store') : route('gadgets.update', $data->id)}}" method="POST" class="row g-3 justify-content-center">
                @if (!isset($data))
                    @method('POST')
                @else
                    @method('PUT')
                @endif
                @csrf

                @error('name', 'is_enabled', 'quantity', 'quantity')
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
                    <label for="quantity" class="form-label">Quantidade</label>
                    <input type="quantity" name="quantity" class="form-control" id="quantity" value="{{ isset($data) != '' ? $data->quantity :  old('quantity') }}">
                </div>

                <div class="col-9">
                    <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="description" name="description" value="{{ isset($data) != '' ? $data->description :  old('description') }}" style="height: 100px">
                            {{ $data->description}}
                        </textarea>
                    </div>
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
