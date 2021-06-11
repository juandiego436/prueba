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
           <div class="col-12">
               <div class="card">
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
                      <h2>{{ $title }}</h2>
                      <form class="row my-5" action="{{ isset($user) ? route('admin.update') : route('admin.save') }}" method="POST">
                      @csrf
                      @isset($user)
                          <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                      @endisset
                      <div class="col-md-6">
                      <label for="name" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre" value="{{ isset($user) ? $user->name : old('name') }}" required>
                      </div>
                      @if(isset($user))
                      @else
                      <div class="col-md-6">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}" required>
                      </div>
                      @endif


                      <div class="col-md-6">
                        <label for="name" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                      </div>

                        <div class="col-md-6">
                          <label for="name" class="form-label">Confirme Contraseña</label>
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese celular" value="{{ isset($user) ? $user->phone : old('phone') }}">
                        </div>
                        @if(isset($user))
                        @else
                        <div class="col-md-6">
                            <label for="name" class="form-label">Cedula</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su cedula" value="{{ isset($user) ? $user->dni : old('dni') }}">
                         </div>
                        @endif
                        <div class="col-md-6">
                            <label for="name" class="form-label">Fecha de Nacimiento</label>
                            <input type="text" class="form-control" id="date_birth" name="date_birth" placeholder="Ingrese su fecha de nacimiento" value="{{ isset($user) ? $user->date_birth : old('date_birth') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Pais</label>
                            <select class="form-control" id="country" name="country" onchange="filter();">
                                <option value="">Selecion Pais</option>
                                    @forelse($countries as $key => $country)
                                        <option value="{{$country->id }}"
                                            @isset($user)
                                                @if($country->id == $user->city->country_id)
                                                    selected
                                                @endif
                                            @endisset
                                            >{{ $country->name }}</option>
                                    @empty

                                    @endforelse
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Ciudad</label>
                              <select class="form-control" id="city" name="city">
                                  @if(isset($user))
                                  <option value="{{ $user->city_id }}">{{ $user->city->name }}</option>
                                  @else
                                  <option value="">Seleccione Ciudad</option>
                                  @endif
                              </select>
                        </div>

                        <div class="col-md-8 my-5">
                            <button class="btn btn-primary" type="submit">{{ isset($user) ? 'Actualizar' : 'Registrar' }}</button>
                        </div>
                      </form>
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
<script>
     flatpickr("#date_birth", {
        altInput: true,
        altFormat: "d/M/Y",
        dateFormat: "Y-m-d",
        locale: "es"
    });

    function filter() {
        var id = document.getElementById("country").value;
        var cities = document.getElementById("city");
        var city = JSON.parse('{!! $cities !!}');
        console.log(city);
        cities.innerHTML="";
        for(var i = 0; i<city.length; i++)
        {
            if(city[i].country_id==id)
            {
                var newOption = new Option(city[i].name,city[i].id);
                cities.add(newOption,undefined);
            }
        }
    }
</script>
@if(Session::has('server'))
<script>

  Swal.fire(
          '{{ Session::get('server') }}',
          '',
          'error'
      );
</script>
@endif
@endsection
