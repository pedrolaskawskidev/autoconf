@extends('dashboard')

@section('brand.index')
@include('layouts.flash-message')
    <div class="card">
        <div class="card-body">
            <div style="text-align: right; padding:1rem">
                <a href="{{ route('brand.create') }}">
                    <button type="button" class="btn btn-outline-success">Cadastrar</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Ativo</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brand as $brands)
                        <tr>
                            <td>{{ $brands->id }}</td>
                            <td>{{ $brands->name }}</td>
                            <td> <img src="{{ url('storage/'. $brands->image ?: $logo) }}" alt="logo" class="img-thumbnail" width="50px" height="50px" /></td>
                            <td>{{ $brands->deleted ? 'Não' : 'Sim' }}</td>
                            <td>
                                <a href="{{ route('brand.edit', ['id' => $brands->id]) }}">
                                <button type="button" class="btn btn-outline-primary" title="Editar"><i
                                    class="bi bi-pencil-square"></i></button>
                                </a>
                                <a href="{{ route('brand.destroy', ['id' => $brands->id]) }}">
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
