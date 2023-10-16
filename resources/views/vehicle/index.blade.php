@extends('dashboard')

@section('vehicle.index')
    @include('layouts.flash-message')

    <div class="card">
        <div class="card-body">
            <div style="text-align: right; padding:1rem">
                <a href="{{ route('vehicle.create') }}">
                    <button type="button" class="btn btn-outline-success">Cadastrar</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fabricante</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Combustível</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>
                                @php
                                    $brand_image = '';
                                    foreach ($brands as $brand) {
                                        if ($vehicle->brand_id == $brand->id) {
                                            $brand_image = $brand->image;
                                            break;
                                        }
                                    }
                                @endphp
                                <img src="{{ url('storage/' . $brand_image ?: $logo) }}" alt="logo"
                                    class="img-thumbnail" width="50px" height="50px" />
                            </td>
                            <td> <img src="{{ url('storage/' . $vehicle->image ?: $logo) }}" alt="veiculo_imagem"
                                    class="img-thumbnail" width="50px" height="50px" />
                            </td>
                            <td>
                                @php
                                    $model_vehicle = '';
                                    foreach ($models as $model) {
                                        if ($vehicle->vehicle_model_id == $model->id) {
                                            $model_vehicle = $model->name;
                                            break;
                                        }
                                    }
                                @endphp
                                {{ strtoupper($model_vehicle) }}
                            </td>
                            <td>{{ $vehicle->name }}</td>
                            <td>{{ strtoupper($vehicle->plate) }}</td>
                            <td>{{ ucfirst($vehicle->fuel) }}</td>
                            <td>{{ ucfirst($vehicle->color) }}</td>
                            <td>
                                <a href="{{ route('vehicle.edit', ['id' => $vehicle->id]) }}">
                                    <button type="button" class="btn btn-outline-primary" title="Editar"><i
                                            class="bi bi-pencil-square"></i></button>
                                </a>
                                <a href="{{ route('vehicle.destroy', ['id' => $vehicle->id]) }}">
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
