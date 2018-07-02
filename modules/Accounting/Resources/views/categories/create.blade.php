@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1><small></small></h1>
            <ol class="breadcrumb">
                <li><a href="#">  Categorias </a></li>
                <li class="active"> Crear </li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-warning">
                <div class="box-header bg-warning">
                    <h3 class="box-title">Crear Nueva Categoría</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('accounting/config/categories') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    </div>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                         <ul class="alert alert-danger">
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     @endif

                     <form method="POST" action="{{ url('accounting/config/categories') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         @include ('accounting::categories.form')

                     </form>
                </div>
            </div>
        </section>
    </div>
@endsection
