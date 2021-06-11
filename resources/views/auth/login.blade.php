@extends('layouts.index')
@section('css')
<!-- aqui agregar links de hojas de estilos independientes -->
@endsection

@section('content')
    <!-- ingresar la pagina a desarrollar aqui-->
    <div class="container">
        <div class="container-fluid">
                <div class="row justify-content-center my-5">
                    <div class="col-md-6">
                        <div class="card border-primary my-5">
                           @if ($errors->any())
                               <div class="alert alert-danger">
                                  <ul>
                                   @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                   @endforeach
                                </ul>
                               </div>
                            @endif
                           <div class="card-body">
                            <form class="form-control" action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <h1 class="h3 mb-3 fw-normal">Inicio de sesion</h1>
                                <label for="inputEmail" class="visually-hidden">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                                <label for="inputPassword" class="visually-hidden">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="checkbox mb-3">
                                  <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                  </label>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                            </form>
                           </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@include('partials.footer')
@endsection
@section('scripts')
<!-- aqui agregar javascritps independientes -->
@if(Session::has('error'))
<script>

  Swal.fire(
          '{{ Session::get('error') }}',
          '',
          'error'
      );
</script>
@endif
@endsection
