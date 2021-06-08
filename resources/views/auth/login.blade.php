@extends('layouts.index')
@section('css')
<!-- aqui agregar links de hojas de estilos independientes -->
@endsection

@section('content')
    <!-- ingresar la pagina a desarrollar aqui-->
    <div class="container">
        <div class="container-fluid">
            <div class="card my-5">
                <div class="card-body">
                    <form>
                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                        <label for="inputEmail" class="visually-hidden">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputPassword" class="visually-hidden">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox mb-3">
                          <label>
                            <input type="checkbox" value="remember-me"> Remember me
                          </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('partials.footer')
@endsection
@section('scripts')
<!-- aqui agregar javascritps independientes -->
@endsection
