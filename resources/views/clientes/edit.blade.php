@extends('adminlte::page')

@section('title', 'Editar Clientes')

@section('content_header')

    <h1>Editar cliente</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')



    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
                    <label for="cpf">CPF</label>

                    <input type="text" class="form-control" disabled id="cpf" name="cpf" placeholder="CPF"
                    value="{{ old('cpf', $cliente->cpf) }}">

                    @if($errors->has('cpf'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cpf') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="nome">Nome
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome" value="{{ old('nome', $cliente->nome) }}">

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('nome') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="endereco">Endereço
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                    id="endereco" name="endereco" placeholder="Endereço" value="{{ $cliente->endereco }}">

                    @if($errors->has('endereco'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('endereco') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="cep">CEP
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}"
                    id="cep" name="cep" placeholder="XXXXX-XXX" value="{{ $cliente->cep }}">

                    @if($errors->has('cep'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cep') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="cidade">Cidade
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                    id="cidade" name="cidade" placeholder="Cidade" value="{{ $cliente->cidade }}">

                    @if($errors->has('cidade'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cidade') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="telefone">Telefone
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                    id="telefone" name="telefone" placeholder="XXXXXXXX" value="{{ $cliente->telefone }}">

                    @if($errors->has('telefone'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('telefone') }}
                        </span>
                    @endif

                <div>               

            </div>

            
        </div>       
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('clientes.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
        </div>
       
    </form>

@stop