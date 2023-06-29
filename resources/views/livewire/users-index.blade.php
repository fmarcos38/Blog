<div>
    <div class="card">

        {{--  serchBar  --}}
        <div class="card-header">
            <input class="form-control" placeholder="ing nomb o email del user">
        </div>

        {{--  tabla users  --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--  para la paginación  --}}
        <div class="card-footer">
            {{$users->links()}}
        </div>
    </div>
</div>
