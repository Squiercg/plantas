@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-center">
            <h2>Lista de plantas</h2>
        </div>
        <div class="d-flex justify-content-start">
            <a class="btn btn-success" href="{{ route('plantas.create') }}"> Adicionar planta</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table table-bordered mt-4">
    <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Latitude</th>
        <th>Logitude</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($plantas as $planta)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $planta->nome }}</td>
        <td>{{ $planta->descricao }}</td>
        <td>{{ $planta->latitude }}</td>
        <td>{{ $planta->longitude }}</td>
        <td>
            <form action="{{ route('plantas.destroy',$planta->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('plantas.show',$planta->id) }}">Mostrar</a>

                <a class="btn btn-primary" href="{{ route('plantas.edit',$planta->id) }}">Editar</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<script>

</script>

{!! $plantas->links() !!}

@endsection