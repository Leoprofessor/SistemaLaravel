@extends('templates.template')

@section('content')

    <h1 class="text-center">visualizar</h1>


    <div class="col-8 m-auto">
    @php
        $user=$cargo->find($cargo->id)->relUsers;
    @endphp

    Nome: {{$user->name}}<br>
    Email: {{$user->email}}<br>
    Cargo: {{$cargo->title}}<br>
    Salario: {{$cargo->salario}}<br>
    Serviço: {{$cargo->servico}}<br>
    </div>
@endsection