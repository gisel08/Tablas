@extends('adminlte::page')

@section('title', 'CREAR ROLES')

@section('content_header')
    <h1>CREAR ROLES</h1>
@stop

@section('content')

    <p>Apartado de crear roles.</p>
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

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf <!-- Agrega esto para protección contra ataques CSRF -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre del rol</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Permisos del Rol:</label><br>
                            @foreach ($permission as $value)
                                <label>
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                    {{ $value->name }}
                                </label><br>
                            @endforeach
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