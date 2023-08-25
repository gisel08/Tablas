@extends('adminlte::page')

@section('title', 'CREAR ESTUDIANTES')

@section('content_header')
    <h1>CREAR ESTUDIANTES</h1>
@stop

@section('content')
<p>Apartado de crear estudiantes.</p>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Revise los campos!</strong> Revise los campos que se le solicitan.
            @foreach ($errors->all() as $error)
            <span>{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('estudiantes.store') }}">
            @csrf

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input type="text" name="matricula" class="form-control" id="matricula">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="apellidopaterno">Apellido Paterno</label>
                        <input type="text" name="apellidopaterno" class="form-control" id="apellidopaterno">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="apellidomaterno">Apellido Materno</label>
                        <input type="text" name="apellidomaterno" class="form-control" id="apellidomaterno">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" class="form-control" id="correo">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="id_carrera">Carrera a la que pertenece</label>
                        <select name="id_carrera" class="form-control">
                            @foreach($carrera as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="id_usuario">Nombre de Usuario</label>
                        <select name="id_usuario" class="form-control">
                            @foreach($usuario as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
        
            </div>
        </form>
        

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop