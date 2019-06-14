@extends('adminlte::page')

@section('title', 'Editar Pedidos')

@section('content_header')

    <h1>Editar Pedidos</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')

    <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="id">Id do Pedido</label>

                    <input type="text" class="form-control" disabled id="id" name="id" placeholder="Id do Pedido"
                    value="{{ $pedido->id }}">

                <div>

                <div class="form-group">
                    <label for="cpf">CPF
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                    id="cpf" name="cpf" placeholder="CPF" value="{{ $pedido->cpf }}">

                    @if($errors->has('cpf'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cpf') }}
                        </span>
                    @endif
                <div>

                <div class="form-group">
                    <label for="valor">Valor do Pedido
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('valor_total') ? 'is-invalid' : '' }}"
                    id="valor_total" name="valor_total" placeholder="Valor do pedido" value="{{ $pedido->valor_total }}">

                    @if($errors->has('valor_total'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('valor_total') }}
                        </span>
                    @endif
                <div>
            </div>
        </div>

        <div class="form-group">
            <a class="btn btn-default" href="{{ route('pedidos.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
        </div>
    </form>

@stop
