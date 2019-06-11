@extends('adminlte::page')

@section('title', 'Ingredientes')

@section('content_header')

    <h1>Ingredientes</h1>

@stop

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            <div class="btn-group">
                <a class="btn btn-success btn-sm" href='{{ route("ingredientes.create") }}'>
                    <i class="fa fa-plus"></i> Inserir um novo ingrediente
                </a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover table-responsive" id="table-ingredientes">
                <thead>
                    <tr>
                        <th class="col-1">Id</th>
                        <th>Nome do Ingrediente</th>
                        <th class="col-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingredientes as $p)
                    <tr>
                        <td>
                            {{ $p->id }}
                        </td>

                        <td>
                            {{ $p->nome }}
                        </td>
                        <td>
                            <!-- edição de dados -->
                            <a class='btn btn-warning btn-sm'  style="float:left;margin-right: 2px;"
                            href='{{ route("ingredientes.edit", $p->id) }}' role='button'>
                                <i class='fa fa-pencil'></i>
                            </a>

                            <!-- exclusão do registro -->
                            <form action="{{ route('ingredientes.destroy', $p->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button type='submit' class='btn btn-danger btn-sm'  style="float:left">
                                    <i class='fa fa-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            <table>
        </div>
    </div>
@stop



@section('css')


@stop



@section('js')

    <script>
        $(document).ready(function() {
            $('#table-ingredientes').DataTable(
                {
                    "paging": false,
                    "info": false,
                    "searching": false,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                    },
                    "processing": true,
                }
            );
        });
    </script>

@stop