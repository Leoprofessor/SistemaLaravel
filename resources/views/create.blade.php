@extends('templates.template')

@section('content')

    <h1 class="text-center">@if(isset($cargo))Editar @else Cadastrar @endif</h1>



{{--        @if(isse($erros) && count($erros)>0)--}}
{{--        <div class="text-center mt-4 mb-4 p-2 alert-danger">--}}
{{--            @foreach($erros->all() as $erro)--}}
{{--                {{$erro}}--}}
{{--            @endforeach--}}

{{--        </div>--}}
{{--        @endif--}}
    <div class="col-8 m-auto">

        @if(isset($cargo))
            <form name="formEdit" id="formEdit" method="post" action="{{url("cargos/$cargo->id")}}" >
                {{ method_field('PUT') }}

        @else
            <form name="formCad" id="formCad" method="post" action="{{url('cargos')}}" >
        @endif



                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <input class="form-control" type="text" name="title" id="title" placeholder="Cargo:" value="{{$cargo->title or ''}}" required><br>
    <select class="form-control" name="id_user" id="id_user" required>
        <option value="{{$cargo->relUsers->id or ''}}">{{$cargo->relUsers->name or 'Colaborador'}}</option>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>

        @endforeach

    </select><br>
    <input class="form-control" type="text" name="servico" id="servico" placeholder="Serviços:" value="{{$cargo->servico or ''}}"  required><br>
    <input class="form-control" type="text" name="salario" id="salario" placeholder="Salario:" value="{{$cargo->salario or ''}}" required><br>
    <input class="btn-primary" type="submit" value="@if(isset($cargo))Editar @else Cadastrar @endif">




</form>


    </div>
@endsection