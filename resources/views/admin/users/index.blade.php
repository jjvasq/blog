@extends('adminlte::page')

@section('title', 'Blog Admin Usuarios')

@section('content_header')
    <h4>Listados de Usuarios:</h4>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/all.min.css')}}">
    <link rel="stylesheet" href="sweetalert2.min.css">
@stop

@section('js')
    
   
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    
    {{-- <script src="sweetalert2.all.min.js"></script> --}}

    <script>
         $('#addPostModal').on('show.bs.modal', event => {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );


        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

    </script>

    {{-- Alertas de Sweetalert --}}
    <script>
        Livewire.on('alert', function(message){
            Swal.fire(
                'Good job!',
                'VAmos Carajo!',
                'success'
            )
        })
    </script>
    
    <script>
        window.addEventListener('close-modal-show', event =>{
            $('#detallePost').modal('hide');
        });
        
        window.addEventListener('open-modal-show', event =>{
            $('#detallePost').modal('show');
        });
    </script>
@stop