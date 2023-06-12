@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar</h1>
@stop

{{--  sección del contenido de la vista  --}}
@section('content')

    {{--  es para el aleta una vez actualizada la categoría  --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('alert')}}</strong>
        </div>
    @endif

    <div class="card">
    <div class="card-body">
        {{--  utilizo el Form pero de la herramienta q bajé laravel collective  --}}            
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'methos' => 'put']) !!}   {{--  dentro del array está la ruta  --}}
        
            {{--  item uno  --}}
            <div class="form-group">                    
                {!! Form::label('name', 'Nombre') !!}  {{--  declaro un <label>   --}}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ing el nomb de la categoría']) !!} {{--  input tipo text -> Parametro 1: el nombre, param2: si quiero pasarle algún atributo, param3: class  --}}

                {{--  muestro error  --}}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
        
            {{--  item dos  --}}
            <div class="form-group">                    
                {!! Form::label('slug', 'Slug') !!}  {{--  declaro un <label>   --}}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ing el slug de la categoría', 'readonly']) !!} {{--  input tipo text -> Parametro 1: el nombre, param2: si quiero pasarle algún atributo, param3: class  ['readonly(solo lectura)']--}}

                {{--  muestro error  --}}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {{--  btn  --}}                
            {!! Form::submit('Actualizar Categoría', ['class' => 'btn btn-primary']) !!}
            
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

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({  //id del input q toma la info
                setEvents: 'keyup keydown blur',
                getPut: '#slug',    //id del input donde se a replicar lo del input anterior pero con '-'
                space: '-'
            });
        });
    </script>
@endsection