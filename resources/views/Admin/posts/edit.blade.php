@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edita post</h1>
@stop

@section('content')

{{--  es para el aleta una vez actualizada la categoría  --}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('alert')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        
        {{--  atento a PARA enviar arch dentro del form DEBO declarar 'files'=> true  --}}
        {!! Form::model($post, ['route' => ['admin.posts.update',$post], 'autocomplite' => 'off', 'files' => true, 'method' => 'put']) !!} {{--  el 1er parametro es la data del post q quiero editar  --}}
        
            @include('admin.posts.partials.form')

            {{--  botón crear post  --}}
            {!! Form::submit('Actualizar Post', ['class' => 'btn btn-primary']) !!}                

        {!! Form::close() !!}
        
        
    </div>
</div>
@stop

{{--  seccion para estilos  --}}
@section('css')
    //<link rel="stylesheet" href="/css/admin_custom.css">

    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

{{--  ESTA es la section para escribir JS  --}}
{{--  abro una nueva sesion PARA utilizar el pluing q bajé  --}}
@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>    
    {{--  pluing para q se copie en el input slug lo mismo q en el input name  --}}
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({  //id del input q toma la info
                setEvents: 'keyup keydown blur',
                getPut: '#slug',    //id del input donde se a replicar lo del input anterior pero con '-'
                space: '-'
            });
        });
    </script>


    {{--  CKEditor 5  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    {{--  CKEditor 5  --}}
    <script>
        ClassicEditor//copio el cont del script para c/textarea y le agrego su id en document.querySelector
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );          
        
    </script>

    {{--  scrip para el cambio de img  --}}
    <script>
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

@endsection