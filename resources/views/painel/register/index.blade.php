@extends('adminlte::page')

@section('title', 'Registrar Empregado')

@section('content_header')
    <h1>Registrar novo Empregado</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Cadastro</h3>
        </div>
        <div class="box-body">
            @include('painel.includes.alerts')

            <form method="POST" action="{{ route('register.employed') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@stop