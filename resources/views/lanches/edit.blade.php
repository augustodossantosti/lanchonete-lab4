@extends('adminlte::page')

@section('title', 'Editar Lanches')

@section('content_header')

    <h1>Editar lanches</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')

    <form method="POST" action="{{ route('lanches.update', $lanche->id) }}" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="id">Id do Lanche</label>

                    <input type="text" class="form-control" disabled id="id" name="id" placeholder="Id do lanche"
                    value="{{ $lanche->id }}">

                <div>

                <div class="form-group">
                    <label for="nome">Nome do Lanche
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome do lanche" value="{{ $lanche->nome }}">

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('nome') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="valor">Valor do Lanche
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}"
                    id="valor" name="valor" placeholder="Valor do lanche" value="{{ $lanche->valor }}">

                    @if($errors->has('valor'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('valor') }}
                        </span>
                    @endif
                <div>
            </div>
        </div>

        <div class="panel panel-default">

            <div class="panel-heading clearfix">
                Ingredientes
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="table-ingredientes">
                    <thead>
                        <tr>
                            <th class="col-1">Id</th>
                            <th>Nome do Ingrediente</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lanche->ingredientes()->get() as $i)
                        <tr>
                            <td>
                                {{ $i->id }}
                            </td>

                            <td>
                                {{ $i->nome }}
                            </td>
                            <td>
                                {{ $i->pivot->quantidade }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                <table>
            </div>
        </div>

        <div class="form-group">
            <a class="btn btn-default" href="{{ route('lanches.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
        </div>
    </form>

@stop
