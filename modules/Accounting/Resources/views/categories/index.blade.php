@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

          <section class="content-header">
                <h1><small></small></h1>
                <ol class="breadcrumb">
                    <li class="active">Categorias</li>
                </ol>
            </section>

            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Categorias</h3>
                        <div class="pull-right box-tools">
                            <a href="{{ url('accounting/config/categories/create') }}" class="btn btn-success btn-sm" title="Añadir">
                                <i class="fa fa-plus" aria-hidden="true"></i> Añadir
                            </a>
                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="GET" action="{{ url('accounting/config/categories') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <br>
                        <br>
                        <table class="table table-borderless table-responsive">
                            <thead>
                                <tr class="text-left">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Color</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div style="width:30px;background-color: {{ $item->color }}">&nbsp</div>
                                    </td>
                                    <td>
                                        <a href="{{ url('accounting/config/categories/' . $item->id) }}" title="Ver"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                        <a href="{{ url('accounting/config/categories/' . $item->id . '/edit') }}" title="Editar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                        <form method="POST" action="{{ url('accounting/config/categories' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $categories->appends(['search' => Request::get('search')])->render() !!} </div>

                    </div>
                </div>

            </section>
        </div>

@endsection
