@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Roles</div>
                        <a href="{{ url('admin/roles/create') }}" class="btn btn-success btn-sm" title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir
                        </a>
                    </div>
                    <div class="box-body">
                        <form method="GET" action="{{ url('admin/roles') }}" accept-charset="UTF-8" class="" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->name != "admin")
                                            <a href="{{ url('admin/roles/' . $item->id) }}" title="View Rol"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('admin/roles/' . $item->id . '/edit') }}" title="Edit Rol"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('admin/roles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div>

                    </div>
                </div>

            </section>
        </div>

@endsection
