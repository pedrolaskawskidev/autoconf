@extends('dashboard')

@section('brand.create') 
@include('layouts.flash-message')
    <div class="card" style="margin:6.25rem">
        <div class="card-body">
            @include('brand._form', ['brand' => $brand])
        </div>
    </div>
@endsection
