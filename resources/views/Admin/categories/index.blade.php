@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista categorías</h1>
@stop

@section('content')

    {{--  es para el aleta una vez actualizada la categoría  --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('alert')}}</strong>
        </div>
    @endif
    
    {{--  estas Vistas estan desarrolladas con Boostrap -->asi q utilizo sus clases para dar estilos  --}}
    <div class="card">

        {{--  etiqta header de boostrap  --}}
        <div class="card-header">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary btn-sm">Agregar Categoría</a>
        </div>

        {{--  etiqta para la tabla  --}}
        <div class="card-body">
            {{--  creo tabla  --}}
            <table class="table table-stripe">
                {{--  encabezado  --}}
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                {{--  contenido  --}}
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                <a href=" {{route('admin.categories.edit', $category)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    {{--  creo el btn  --}}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

{{--  @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop  --}}