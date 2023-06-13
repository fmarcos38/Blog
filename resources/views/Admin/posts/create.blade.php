@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crea nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplite' => 'off']) !!}
            
                {{--  creo un input oculto para tener el ID del user logueado  --}}     
                {{--  en realidad va  esto--> auth()->user()->id Q es para obt el ID del user log [PERO como me da error se lo harcodeo]            --}}
                {!! Form::hidden('user_id', 1) !!}
                
                {{--  label e input  --}}
                <div class="form-group">                    
                    {!! Form::label('name', 'Nombre:') !!}                    
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ing nombre']) !!} 
                    
                    {{--  msj de validación  --}}
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                {{--  label e input  --}}
                <div class="form-group">                    
                    {!! Form::label('slug', 'Slug:') !!}                    
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ing slug', 'readonly']) !!} 
                    
                    {{--  msj de validación  --}}
                    @error('slug')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                {{--  select  categorías--}}
                <div class="form-group">                    
                    {!! Form::label('category_id', 'Categoría') !!}                    
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}  
                    
                    {{--  msj de validación  --}}
                    @error('category_id')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                {{--  select etiquetas  --}}
                <div class="form-group">
                    <p class="font-weigth-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            
                            {!! Form::checkbox('tags[]', $tag->id, null ) !!}{{--  esto es codigo  laravel Colective --}}
                            {{$tag->name}}
                            
                        </label>
                    @endforeach

                    {{--  msj de validación  --}}
                    @error('tags')
                        <br>
                        <small>{{$message}}</small>
                    @enderror
                </div>

                {{--  con esta opción LE doy al user la posibilidad de q elija si lo publica o lo deja en borrador  --}}
                <div class="form-group">
                    <p class="font-weigth-bold">Estado</p>

                    <label>                        
                        {!! Form::radio('status', 1, true ) !!}
                        Borrador
                    </label>

                    <label>                        
                        {!! Form::radio('status', 2 ) !!}
                        Publicado
                    </label>

                    {{--  msj de validación  --}}
                    @error('status')
                        <small>{{$message}}</small>
                    @enderror
                </div>
                {{--  extracto del post  --}}
                <div class="form-group">                    
                    {!! Form::label('extract', 'Extracto del Post:') !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                    {{--  msj de validación  --}}
                    @error('extract')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                {{--  cuerpo del post  --}}
                <div class="form-group">                    
                    {!! Form::label('body', 'Cuerpo del Post:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                    {{--  msj de validación  --}}
                    @error('body')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                {{--  botón crear post  --}}
                {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}                

            {!! Form::close() !!}
            
            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

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
    
@endsection