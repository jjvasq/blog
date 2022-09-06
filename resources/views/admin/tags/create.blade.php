@extends('adminlte::page')

@section('title', 'Blog Admin')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.tags.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre: ') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Etiqueta:']) !!}
                
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug: ') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la Etiqueta:', 'readonly']) !!}
                    @error('slug')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                 {{--    <label for="">Color:</label>

                    <select name="color" id="" class="form-control">
                        <option value="red">Color Rojo</option>
                        <option value="green">Color Verde</option>
                        <option value="blue">Color Azul</option>
                    </select> --}}
                    {!! Form::label('color', 'Color:') !!}
                    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
                    @error('color')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                {!! Form::submit('Crear Etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

@endsection