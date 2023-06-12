@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crea etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.tags.store']) !!}
            
                {{--  import el arch form.blade.php  --}}
                @include('admin.tags.partials.form')
                {{--  boton  --}}
                {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}
                
            
            {!! Form::close() !!}
            
            
        </div>
    </div>
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


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop