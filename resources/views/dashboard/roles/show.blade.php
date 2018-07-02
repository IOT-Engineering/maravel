@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">
            <section class="content">
                <div class="box box-warning">
                    <div class="box-header bg-warning">
                        <h3 class="box-title">Rol {{ $role->id }}</h3>
                        <div class="pull-right box-tools">
                            <a href="{{ url('admin/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                            <a href="{{ url('admin/roles/' . $role->id . '/edit') }}" title="Edit Rol"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                            <form method="POST" action="{{ url('admin/roles/' . $role->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                         <div class="table-responsive">
                             <table class="table table-borderless">
                                 <tbody>
                                     <tr>
                                         <th>ID</th><td>{{ $role->id }}</td>
                                     </tr>
                                     <tr>
                                         <th> Nombre </th>
                                         <td> {{ $role->name }} </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>

                        <h3 class="page-title"> Permisos</h3>
                        <br>
                        <form method="GET" action="{{ url('admin/filter/rolepermissions/show') }}" accept-charset="UTF-8" class="" role="search">
                            <div class="input-group">
                                <input type="number" name="rolId" value="{{$role->id}}" hidden>
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
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
                                <tbody >

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
                                            <td style="width: 100px;background-color: #00a65a; color: #fff;">Permitido</td>
                                        @else
                                            <td style="width: 100px;background-color: #d70004;color: #fff;">Prohibido</td>
                                        @endif

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </section>
        </div>

@endsection
