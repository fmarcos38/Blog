<div class="card">
    {{--  buscador  --}}
    <div class="card-header">
        <input  wire:model="search" class="form-control" placeholder="ing nomb de un post"/>
    </div>
    
    @if ($posts->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2"></th>
            </thead>

            <tbody>
                @foreach ($posts as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $item)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.posts.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{--  paginación  --}}
    <div class="card-footer">
        {{$posts->links()}}
    </div>
    @else
    
    <div class="card-body">
        <strong>No hay registros</strong>
    </div>
    
    @endif
</div>
