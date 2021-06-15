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
                        <div class="card-header bg-dark">
                            <h2 class="text-white text-center"><strong>{{ Auth::guard('user')->user()->name }}</strong></h2>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <label class="form-label">Correo</label>
                                <p><strong>{{ Auth::guard('user')->user()->email }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Telefono</label>
                                <p><strong>{{ Auth::guard('user')->user()->phone }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cedula</label>
                                <p><strong>{{ Auth::guard('user')->user()->dni }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Edad</label>
                                <p><strong>{{ Auth::guard('user')->user()->age }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fecha de nacimiento</label>
                                <p><strong>{{ Carbon\Carbon::parse(Auth::guard('user')->user()->date_birth)->format('d-m-Y') }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pais</label>
                                <p><strong>{{ Auth::guard('user')->user()->city->country->name }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ciudad</label>
                                <p><strong>{{ Auth::guard('user')->user()->city->name }}</strong></p>
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
