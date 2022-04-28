@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar uma nova planta</h2>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Opa!</strong> Encontramos problemas com sua entrada.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form action="{{ route('plantas.store') }}" method="POST">
    @csrf

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" placeholder="Nome">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <input type="text" name="descricao" value="{{ old('descricao') }}" class="form-control" placeholder="Descrição">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Latitude:</strong>
                <input type="number" step="any" name="latitude" value="{{ old('latitude') }}" class="form-control" placeholder="Latitude">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Longitude:</strong>
                <input type="number" step="any" name="longitude" value="{{ old('longitude') }}" class="form-control" placeholder="Longitude">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 d-flex justify-content-center gap-2">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-danger" href="{{ route('plantas.index') }}"> Voltar</a>
        </div>

    </div>

</form>
@endsection