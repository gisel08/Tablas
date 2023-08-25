@extends('adminlte::page')

@section('title', 'EDITAR ROL')

@section('content_header')
    <h1>EEDITAR ROL</h1>
@stop


@section('content')

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



        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre del rol</label>
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Permisos del Rol:</label><br>
                        @foreach ($permission as $value)
                        <label>
                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
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
