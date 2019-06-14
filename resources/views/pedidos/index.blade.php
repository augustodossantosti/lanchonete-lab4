@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')

    <h1>Pedidos</h1>

@stop


@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('message') }}
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="btn-group">
                <a class="btn btn-primary btn-sm" href='{{ route("pedidos.create") }}'>
                    <i class="fa fa-plus"></i> Inserir um novo Pedido
                </a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover table-responsive" id="table-pedidos">
                <thead>
                    <tr>
                        <th class="col-1">Id</th>
                        <th>CPF</th>
                        <th>Valor Total</th>
                        <th>Data</th>
                        <th class="col-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $p)
                    <tr>
                        <td>
                            {{ $p->id }}
                        </td>

                        <td>
                            {{ $p->cpf }}
                        </td>
                        <td>
                            {{ $p->valor_total }}
                        </td>
                        <td>
                            {{ $p->data }}
                        </td>
                        <td>
                            <!-- edição de dados -->
                            <a class='btn btn-warning btn-sm'  style="float:left;margin-right: 2px;"
                            href='{{ route("pedidos.edit", $p->id) }}' role='button'>
                                <i class='fa fa-pencil'></i>
                            </a>

                            <!-- exclusão do registro -->
                            <form action="{{ route('pedidos.destroy', $p->id) }}" method="post">
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
            $('#table-pedidos').DataTable(
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
