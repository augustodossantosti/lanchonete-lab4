@extends('adminlte::page')

@section('title', 'Novo Pedido')

@section('content_header')

    <h1>Novo pedido</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')

    <form method="POST" action="{{ route('pedidos.store') }}" role="form">
        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
                    <label for="cpf">CPF<span class="text-red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" id="cpf" name="cpf" placeholder="CPF">

                    @if($errors->has('cpf'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cpf') }}
                        </span>
                    @endif

                    <label for="valor_total">Valor do Pedido<span class="text-red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" id="valor_total" name="valor_total" placeholder="Valor do Pedido">

                    @if($errors->has('valor_total'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('valor_total') }}
                        </span>
                    @endif

                <div>

            </div>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
    </form>

@stop
