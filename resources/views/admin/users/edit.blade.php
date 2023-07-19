@extends('adminlte::page')

@section('title', 'Blog Admin Usuarios')

@section('content_header')
    <h4>Asignar un Rol</h4>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}}</p>

            <h2 class="h5">Listado de Roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>                    
                @endforeach

                {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/all.min.css')}}">
    <link rel="stylesheet" href="sweetalert2.min.css"> --}}
@stop

@section('js')
    
   
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
     --}}
    {{-- <script src="sweetalert2.all.min.js"></script> --}}

   
@stop