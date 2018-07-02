
@if(isset($permissions))
    <div class="table-responsive">
    <table class="table table-borderless table-hover">
        <thead>
        <tr>
            <th>Módulo</th>
            <th>Uri</th>
            <th>Permiso</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions AS $permission)
            <tr>
                <td>{{$permission->module}}</td>
                <td>{{$permission->uri}}</td>

                @if($permission->method == 'GET' or $permission->method == 'HEAD')
                    <td ><span class="fa fa-eye"></span> Ver ({{$permission->method}})</td>
                @elseif($permission->method == 'POST')
                    <td><span class="fa fa-plus"></span> Crear </td>
                @elseif($permission->method == 'PUT' or $permission->method == 'PATCH')
                    <td><span class="fa fa-edit"></span> Editar ({{$permission->method}})</td>
                @elseif($permission->method == 'DELETE')
                    <td><span class="fa fa-remove"></span> Borrar</td>
                @endif

                @if($permission->allow)
                    <td>
                        <input type="checkbox" name="permissions[{{$permission->id}}]" checked>
                    </td>
                @else
                    <td>
                        <input type="checkbox" name="permissions[{{$permission->id}}]">
                    </td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
        <div class="pagination-wrapper"> {!! $permissions->appends(['search' => Request::get('search'), 'rolId' => Request::get('rolId')])->render() !!} </div>

    </div>

@endif

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>
