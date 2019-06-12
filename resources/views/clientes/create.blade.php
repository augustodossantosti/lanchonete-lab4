@extends('adminlte::page')

@section('title', 'Novo Cliente')

@section('content_header')

    <h1>Novo Cliente</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')

    <form method="POST" action="{{ route('clientes.store') }}" role="form">
        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
                <label for="cpf">CPF
                        <span class="text-red">*</span>
                    </label>
                    <input type="text" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                    id="cpf" name="cpf" placeholder="CPF"

                    @if($errors->has('cpf'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cpf') }}
                        </span>
                    @endif

                    <div class="form-group">
                    <label for="nome">Nome
                        <span class="text-red">*</span>
                    </label>
                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome"

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('nome') }}
                        </span>
                    @endif                   
                    </div>

                    <div class="form-group">
                    <label for="endereco">Endereço
                        <span class="text-red">*</span>
                    </label>
                    <input type="text" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                    id="endereco" name="endereco" placeholder="Endereço"

                    @if($errors->has('endereco'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('endereco') }}
                        </span>
                    @endif
                    </div>

                    <div class="form-group">
                    <label for="cep">CEP
                        <span class="text-red">*</span>
                    </label>
                    <input type="text" class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}"
                    id="cep" name="cep" placeholder="XXXXX-XXX"

                    @if($errors->has('cep'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cep') }}
                        </span>
                    @endif
                    </div>

                    <div class="form-group">
                    <label for="cidade">Cidade
                        <span class="text-red">*</span>
                    </label>
                    <input type="text" class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                    id="cidade" name="cidade" placeholder="Cidade"

                    @if($errors->has('cidade'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('cidade') }}
                        </span>
                    @endif
                    </div>

                    <div class="form-group">
                    <label for="telefone">Telefone
                        <span class="text-red">*</span>
                    </label>
                    <input type="text" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                    id="telefone" name="telefone" placeholder="XXXXXXXX"

                    @if($errors->has('telefone'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('telefone') }}
                        </span>
                    @endif
                    </div>


                <div>

            </div>
        </div>       
    
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
    </form>

@stop