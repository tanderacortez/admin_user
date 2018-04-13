@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard Axei</h1>
@stop

@section('content')

    <p>Olá {{Auth::user()->name}}, seja bem-vindo(a) ao seu Painel de Controle!</p>

@stop