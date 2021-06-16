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
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.mail.save') }}" method="POST">
                            @csrf
                            <div class="col-md-10 my-3">
                                <label class="form-label">De: </label>
                                <input class="form-control"  id="to" name="to" value="{{ Auth::guard('user')->user()->email}}" readonly/>
                            </div>
                            <div class="col-md-10">
                                <label class="form-label">Para</label>
                                <input class="form-control" type="email"  id="from" name="from" value="{{ old('from') }}" required/>
                            </div>
                            <div class="col-md-10 my-3">
                                <label class="form-label">Asunto</label>
                                <input class="form-control" type="text"  id="subject" name="subject" value="{{ old('subject') }}" required/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Para</label>
                                <textarea id="message" name="message"></textarea>
                            </div>
                            <div class="col-md-6 my-3">
                                <button class="btn btn-primary" type="submit">Guardar</button>
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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'message' );
</script>
@endsection
