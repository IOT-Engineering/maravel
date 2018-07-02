@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

            <section class="content-header">
                <h1><small></small></h1>
                <ol class="breadcrumb">
                    <li><a href="#">  Invoices </a></li>
                    <li class="active"> View </li>
                </ol>
            </section>
            <section class="content">
                <div class="box box-warning">
                    <div class="box-header bg-warning">
                        <h3 class="box-title">Invoice {{ $invoice->id }}</h3>
                        <div class="pull-right box-tools">
                            <a href="{{ url('/invoices') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/invoices/' . $invoice->id . '/edit') }}" title="Edit Invoice"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('invoices' . '/' . $invoice->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Invoice" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                         <div class="table-responsive">
                             <table class="table table-borderless">
                                 <tbody>
                                     <tr>
                                         <th>ID</th><td>{{ $invoice->id }}</td>
                                     </tr>
                                     <tr><th> Invoice Number </th><td> {{ $invoice->invoice_number }} </td></tr><tr><th> Company Name </th><td> {{ $invoice->company_name }} </td></tr><tr><th> Company Nif </th><td> {{ $invoice->company_nif }} </td></tr><tr><th> Company Address </th><td> {{ $invoice->company_address }} </td></tr><tr><th> Client Name </th><td> {{ $invoice->client_name }} </td></tr><tr><th> Client Nif </th><td> {{ $invoice->client_nif }} </td></tr>
                                 </tbody>
                             </table>
                         </div>
                    </div>
                </div>

            </section>
        </div>

@endsection
