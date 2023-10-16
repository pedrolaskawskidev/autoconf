@extends('dashboard')

@section('vehicle.create') 
@include('layouts.flash-message')
    <div class="card" style="margin:6.25rem">
        <div class="card-body">
            @include('vehicle._form', ['vehicle' => null, 'brand' => $brand, 'model' => $model])
        </div>
    </div>
@endsection
