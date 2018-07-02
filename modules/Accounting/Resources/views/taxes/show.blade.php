@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">



            <section class="content">
                <div class="box box-warning">
                    <div class="box-header bg-warning">
                        <h3 class="box-title">IVA #{{ $tax->id }}</h3>
                        <div class="pull-right box-tools">
                            <a href="{{ url('accounting/config/taxes') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                            <a href="{{ url('accounting/config/taxes/' . $tax->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                            <form method="POST" action="{{ url('accounting/config/taxes' . '/' . $tax->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" title="Borrar" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                         <div class="table-responsive">
                             <table class="table table-borderless">
                                 <tbody>
                                     <tr>
                                         <th>ID</th><td>{{ $tax->id }}</td>
                                     </tr>
                                     <tr><th> Name </th><td> {{ $tax->value }} </td></tr>
                                 </tbody>
                             </table>
                         </div>
                    </div>
                </div>

            </section>
        </div>

@endsection
