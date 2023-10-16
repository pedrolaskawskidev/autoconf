@extends('dashboard')

@section('vehicle_model.index')
@include('layouts.flash-message')

<div class="card">
    <div class="card-body">
        <div style="text-align: right; padding:1rem">
            <a href="{{ route('model.create') }}">
                <button type="button" class="btn btn-outline-success">Cadastrar</button>
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->name }}</td>
                        <td> <img src="{{ url('storage/'. $model->brand_image ?: $logo) }}" alt="logo" class="img-thumbnail" width="50px" height="50px" /></td>
                        <td>{{ $model->deleted ? 'Não' : 'Sim' }}</td>
                        <td>
                            <a href="{{ route('vehicle_model.edit', ['id' => $model->id]) }}">
                            <button type="button" class="btn btn-outline-primary" title="Editar"><i
                                class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="{{ route('vehicle_model.destroy', ['id' => $model->id]) }}">
                                <button type="button" class="btn btn-outline-danger" title="Exlcuir"><i
                                        class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection