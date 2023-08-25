@extends('adminlte::page')

@section('title', 'DIVISIONES')

@section('content_header')
    <h1>DIVISIONES</h1>
@stop

@section('content')

@can('crear-divivision')
<a class="btn btn-primary" href="{{route('divisiones.create') }}">Crear Nuevo</a>
@endcan
<div class="table-responsive mt-4">

<table id="divionest" class="table">
    {{-- <caption>Hola esto es la tabla de divisiones</caption> --}}
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($division as $division)
        <tr>
            <td>{{$division->id}}</td>
            <td>{{$division->nombre}}</td>
            <td>
                @can('editar-division')
                    <a  class="btn btn-warning "  href="{{route('divisiones.edit', $division->id)}}">Editar</a>
                @endcan
                @can('eliminar-division')
                <form method="POST" action="{{ route('divisiones.destroy', $division->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>                
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> {{-- Es para lo de datatable --}}
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> {{-- Es para lo de datatable --}}
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> {{-- Es para lo de datatable --}}

<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#divionest').DataTable( {
            language: {
                    "lengthMenu": "Mostrar MENU registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del START al END de un total de TOTAL registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de MAX registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing":"Procesando...",
                },
            //para usar los botones
            responsive: "true",
            dom: 'Bfrtip',
            buttons: [
                            {
                                extend:    'excelHtml5',
                                text:      '<i class="fas fa-file-excel"></i> ',
                                titleAttr: 'Exportar a Excel',
                                className: 'bg-green'
                            },
                            {
                                extend:    'pdfHtml5',
                                text:      '<i class="fas fa-file-pdf"></i> ',
                                titleAttr: 'Exportar a PDF',
                                className: 'bg-red'
                            },
                            {
                                extend:    'print',
                                text:      '<i class="fa fa-print"></i> ',
                                titleAttr: 'Imprimir',
                                className: 'bg-info'
                            },
                            {
                                extend:    'copy',
                                text:      '<i class="fa fa-copy"></i> ',
                                titleAttr: 'Copiar Tabla',
                                className: 'bg-warning'
                            },

                    ]
                } );
        } );

    </script>
@stop