@extends('layouts.index')
@section('css')
<!-- aqui agregar links de hojas de estilos independientes -->
@endsection

@section('content')
@include('partials.header')
<div class="container-fluid">
    <div class="row">
        @include('partials.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1>Vista Usuario</h1>
        </main>
        @include('partials.footer')
    </div>
</div>
@endsection
@section('scripts')
<!-- aqui agregar javascritps independientes -->
@endsection
