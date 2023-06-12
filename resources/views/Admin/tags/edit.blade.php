@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('alert')}}</strong>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!} {{--  $tag--> es el nombre del elemnt q quiero modif, desp declaro la ruta y el metodo del form  --}}
                {{--  import el arch form.blade.php  --}}
                @include('admin.tags.partials.form')

                {{--  boton  --}}
                
                {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}
                

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