@extends('dashboard')

@section('vehicle_model.create') 
@include('layouts.flash-message')
    <div class="card" style="margin:6.25rem">
        <div class="card-body">
            @include('vehicle_model._form', ['model' => $model, 'brand' => $brand])
        </div>
    </div>
@endsection
