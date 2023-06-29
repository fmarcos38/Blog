@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
    {{--  boton q me dirige al form crear post  --}}
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo post</a>
    
    <h1>Listado post</h1>
    
@stop

@section('content')
    {{--  es para el aleta una vez actualizada la categoría  --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('alert')}}</strong>
        </div>
    @endif
    
    @livewire('admin.posts-index') {{--  importo componente  --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop