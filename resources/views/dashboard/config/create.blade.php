@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <label class="page-title">Configuración</label>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    @if ($errors->any())
                         <ul class="alert alert-danger">
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     @endif

                     <form method="POST" action="{{ url('/config') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         @include ('dashboard/Accounting.config.form')

                     </form>
                </div>
            </div>
        </section>
    </div>
@endsection
