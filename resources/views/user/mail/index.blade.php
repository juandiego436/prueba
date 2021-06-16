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
                        <div class="card-header">
                            <a class="btn btn-primary" href="{{ route('user.mail.send') }}">Enviar correo</a>
                        </div>
                        <div class="card-body">
                            <h2>Lista de mensajes enviados</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Filtro</label>
                                    <input class="form-control" id="search" name="search" />
                                </div>
                            </div>
                            <div class="table-responsive my-5">
                                <table id="inbox" class="table table-striped table-md">
                                    <thead class="table-dark">
                                        <tr>
                                        <th>N°</th>
                                        <th>Enviado</th>
                                        <th>Asunto</th>
                                        <th>Estado</th>
                                        <th>Fecha de envio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mails as $key => $mail)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $mail->from }}</td>
                                                <td>{{ $mail->subject }}</td>
                                                <td>{!! $mail->status() !!}</td>
                                                <td>{{ $mail->date_formatted }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    No hay correo enviados
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-md-center">
                                {{$mails->links()}}
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
<script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#inbox tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
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
