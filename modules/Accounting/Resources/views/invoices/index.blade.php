@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

          <section class="content-header">
              <label class="page-title">Facturas</label>

              <a href="{{ url('admin/accounting/invoices/create') }}" class="btn btn-success btn-sm" title="Añadir Nueva Factura">
                  <i class="fa fa-plus" aria-hidden="true"></i> <b>Añadir</b>
              </a>
          </section>

            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <form method="GET" action="{{ url('admin/invoices') }}" accept-charset="UTF-8" class="" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <br>
                        <br>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha Emisión</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Estado</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $item)
                                <tr>
                                    <td>{{ $item->invoice_number }}</td>
                                    <td>{{ $item->client_name }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    <td>{{ $item->state }}</td>
                                    <td>
                                        <a href="{{ url('admin/accounting/invoices/' . $item->id) }}" title="View Invoice"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                        <a href="{{ url('admin/accounting/invoices/' . $item->id . '/edit') }}" title="Edit Invoice"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                        <a href="{{ url('admin/accounting/invoices/' . $item->id . '/edit') }}" title="Edit Invoice"><button class="btn btn-warning btn-xs"><i class="fa fa-send" aria-hidden="true"></i> Enviar</button></a>
                                        <a href="{{ url('admin/accounting/invoices/' . $item->id . '/edit') }}" title="Edit Invoice"><button class="btn btn-success btn-xs"><i class="fa fa-money" aria-hidden="true"></i> Cobrar</button></a>

                                        <form method="POST" action="{{ url('/invoices' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Invoice" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $invoices->appends(['search' => Request::get('search')])->render() !!} </div>

                    </div>
                </div>

            </section>
        </div>

@endsection
