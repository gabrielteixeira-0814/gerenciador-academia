@extends('layouts.layout')

@section('content')
<div class="pagetitle">
    <h1>{{ $title_table ? 'Manutenções' : '-' }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">{{ $title_action ?? '-' }}</li>
        <li class="breadcrumb-item">{{ $title_table ? 'Manutenções' : '-' }}</li>
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
            <form action="{{ !isset($data) ? route('maintenance.store') : route('maintenance.update', $data->id)}}" method="POST" class="row g-3 justify-content-center">
                @if (!isset($data))
                    @method('POST')
                @else
                    @method('PUT')
                @endif
                @csrf

                @error('gadgets_id', 'is_enabled', 'date', 'interval')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-7">
                    <label for="gadgets_id" class="form-label">Aparelhos</label>
                    <select id="gadgets_id" name="gadgets_id" class="form-select">
                        <option>Selecione</option>
                        @foreach($list_gadgets AS $gadgets)
                            <option value="{{ $gadgets->id }}" {{ $gadgets->id ===  ($data->gadgets->id ?? '') ? 'selected' :  '' }}>{{ $gadgets->name }}</option>
                        @endforeach
                    </select>
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
                    <label for="inputDate" class="col-sm-12 col-form-label">Data do Agendamento</label>
                    <div class="col-sm-6">
                      <input type="date" name="date" value="{{ $data->date ?? '' }}" class="form-control">
                    </div>
                </div>

                <div class="col-9">
                    <label for="interval" class="form-label">Intervalo</label>
                    <input type="text" name="interval" class="form-control" id="interval" value="{{ isset($data) != '' ? $data->interval :  old('interval') }}">
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
