@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="box box-warning">
                <div class="box-header bg-warning">
                    <h3 class="box-title">Crear Nuevo Usuario</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                    </div>
                </div>
                <div class="box-body">

                     <form method="POST" action="{{ url('admin/users') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         @include ('dashboard.users.form')

                     </form>
                </div>
            </div>
        </section>
    </div>
@endsection
