@extends('adminlte::page')

@section('title', 'Editar Ingrediente')

@section('content_header')

    <h1>Editar ingrediente</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')

    <form method="POST" action="{{ route('ingredientes.update', $ingrediente->id) }}" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
                    <label for="id">Id do Ingrediente</label>

                    <input type="text" class="form-control" disabled id="id" name="id" placeholder="Id do ingrediente"
                    value="{{ $ingrediente->id }}">

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('nome') }}
                        </span>
                    @endif

                <div>

                <div class="form-group">
                    <label for="nome">Nome do Ingrediente
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome do ingrediente" value="{{ $ingrediente->nome }}">

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('nome') }}
                        </span>
                    @endif

                <div>

               

            </div>

            
        </div>       
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('ingredientes.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
        </div>
       
    </form>

@stop