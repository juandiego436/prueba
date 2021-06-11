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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">{{ Auth::guard('user')->user()->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <label class="form-control">Correo</label>
                                <p class="">{{ Auth::guard('user')->user()->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control">Telefono</label>
                                <p class="">{{ Auth::guard('user')->user()->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control"></label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control"></label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control"></label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control"></label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('partials.footer')
    </div>
</div>
@endsection
@section('scripts')
<!-- aqui agregar javascritps independientes -->
@endsection
