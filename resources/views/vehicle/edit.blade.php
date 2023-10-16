@extends('dashboard')

@section('vehicle.create') 
@include('layouts.flash-message')
    <div class="card" style="margin:6.25rem">
        <div class="card-body">
            @include('vehicle._form', ['vehicle' => $vehicle, 'model' => $model, 'brand' => $brand])
        </div>
    </div>
@endsection