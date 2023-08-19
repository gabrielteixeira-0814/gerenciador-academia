@extends('layouts.layout')

@section('content')
<div class="pagetitle">
    <h1>{{ $title_table ? 'Clientes' : '-' }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">{{ $title_action ?? '-' }}</li>
        <li class="breadcrumb-item">{{ $title_table ? 'Clientes' : '-' }}</li>
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
            <form action="{{ !isset($data) ? route('client.store') : route('client.update', $data->id)}}" method="POST" class="row g-3 justify-content-center">
                @if (!isset($data))
                    @method('POST')
                @else
                    @method('PUT')
                @endif
                @csrf

                @error('name', 'email', 'type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-9">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control cpf" id="cpf" value="{{ isset($dataUser) != '' ? isset($dataUser->cpf) :  old('cpf') }}" placeholder="99999999999" name="cpf" {{ isset($dataUser) != '' ? "disabled" :  "" }}>
                </div>

                <input type="hidden" class="form-control" id="user_id" name="user_id" value="">

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
                    <label for="client_type_id" class="form-label">Tipo de Cliente</label>
                    <select id="client_type_id" name="client_type_id" class="form-select">
                        <option>Selecione</option>
                        @foreach($list_clients_type AS $clients_type)
                            <option value="{{ $clients_type->id }}" {{ isset($clients_type) && $clients_type->id ===  (isset($data->gadgets->id) ?? '') ? 'selected' :  '' }}>{{ $clients_type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-9">
                    <label for="age" class="form-label">Idade</label>
                    <input type="text" name="age" class="form-control" id="age" value="{{ isset($data) != '' ? $data->age :  old('age') }}">
                </div>

                <div class="col-9">
                    <label for="weight" class="form-label">Peso</label>
                    <input type="text" name="weight" class="form-control" id="weight" value="{{ isset($data) != '' ? $data->age :  old('weight') }}">
                </div>

                <div class="col-9">
                    <label for="height" class="form-label">Altura</label>
                    <input type="text" name="height" class="form-control" id="height" value="{{ isset($data) != '' ? $data->age :  old('height') }}">
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


@section('script')


<script>
    $("#cpf").blur(function() {
        let cpf = $("#cpf").val();

        $.ajax({
        type: "GET",
        url: "{{ route('user.getDataUser') }}",
        'data': {cpf: cpf},
        datatype: "json",
        success: function(data) {

        if(data) {
            $("#name").val(data.name);
            $("#user_id").val(data.id);

        }
    },
        error: function (data) {
                alert("Não há nenhum registro com esse CPF, verifique se está correto!");
            }
        });
    });

</script>

@endsection
