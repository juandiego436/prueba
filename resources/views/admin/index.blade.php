@extends('layouts.index')
@section('css')
<!-- aqui agregar links de hojas de estilos independientes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
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
                <div class="card-header">
                    <a href="{{route('admin.create')}}" class="btn btn-primary">Crear Usuario</a>
                </div>
                <div class="card-body">
                    <h2>Listado de Usuario</h2>
                        <div class="table-responsive my-4">
                            <table id="myTable" class="table table-striped table-md">
                                <thead class="table-dark">
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Cedula</th>
                                        <th>Edad</th>
                                        <th>Pais</th>
                                        <th>Ciudad</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->dni }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>{{ $user->city->country->name }}</td>
                                        <td>{{ $user->city->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.find', $user->id) }}" class="mx-3"><i class="fas fa-edit"></i><span>Actualizar</span></a>
                                            <a href="{{ route('admin.delete', $user->id) }}" class="mx-3"><i class="fas fa-trash"></i><span>Eliminar</span></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                         No hay Usuarios registrados
                                        </td>
                                     </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>

@if(Session::has('success'))
<script>

  Swal.fire(
          '{{ Session::get('success') }}',
          '',
          'success'
      );
</script>
@endif

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
