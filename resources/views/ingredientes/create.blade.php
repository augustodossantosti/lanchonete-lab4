@extends('adminlte::page')

@section('title', 'Novo Ingrediente')

@section('content_header')

    <h1>Novo ingrediente</h1>

@stop

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')

    <form method="POST" action="{{ route('ingredientes.store') }}" role="form">
        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
                    <label for="nome">Nome do Ingrediente
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome do ingrediente">

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                            {{ $errors->first('nome') }}
                        </span>
                    @endif

                <div>

            </div>
        </div>       
    
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
    </form>

@stop