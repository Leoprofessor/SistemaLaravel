@extends('templates.template')

@section('content')

    <h1 class="text-center">sistema de gestão de colaborador</h1>
    <div class="text-center mt-3 mb-4">

        <a href="{{url('cargos/create')}}">


            <button class="btn-success">cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">cpf</th>
                <th scope="col">salario</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
@foreach($cargo as $cargos)

        @php

        $user=$cargos->find($cargos->id)->relUsers;

        @endphp
        <tr>
        <th scope="row">{{$cargos->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->cpf}}</td>
        <td>{{$cargos->salario}}</td>
            <td>
                <a href="{{url("cargos/$cargos->id")}}">
                    <button class="btn-dark">visualizar</button>

                </a>
                <a href="{{url("cargos/$cargos->id/edit")}}">
                    <button class="btn-primary">editar</button>

                </a>
                <a href="{{url("cargos/$cargos->id")}}" class="js-del">
                    <button class="btn-danger">excluir</button>

                </a>


            </td>
    </tr>

@endforeach


            </tbody>
        </table>
    </div>
@endsection