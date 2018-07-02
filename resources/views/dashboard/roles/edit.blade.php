@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="box box-warning">
                <div class="box-header bg-warning">
                    <h3 class="box-title">Editar Rol #{{ $role->id }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('admin/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                    </div>
                </div>
                <div class="box-body">


                    <form method="POST" action="{{ url('admin/roles/' . $role->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('dashboard.roles.form', ['submitButtonText' => 'Actualizar'])

                    </form>

                    <h3 class="page-title"> Permisos</h3>
                    <form method="GET" action="{{ url('admin/filter/rolepermissions/edit') }}" accept-charset="UTF-8" class="" role="search">
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
                    <form method="POST" action="{{ url('admin/rolepermissions/' . $role->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('dashboard.roles.formPermissions', ['submitButtonText' => 'Actualizar Permisos'])

                    </form>

                </div>
            </div>
        </section>
    </div>

@endsection
