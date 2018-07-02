@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

            <section class="content-header">
                <h1><small></small></h1>
                <ol class="breadcrumb">
                    <li><a href="#">  Categories </a></li>
                    <li class="active"> View </li>
                </ol>
            </section>
            <section class="content">
                <div class="box box-warning">
                    <div class="box-header bg-warning">
                        <h3 class="box-title">Category {{ $category->id }}</h3>
                        <div class="pull-right box-tools">
                            <a href="{{ url('/categories') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/categories/' . $category->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('categories' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                         <div class="table-responsive">
                             <table class="table table-borderless">
                                 <tbody>
                                     <tr>
                                         <th>ID</th><td>{{ $category->id }}</td>
                                     </tr>
                                     <tr><th> Name </th><td> {{ $category->name }} </td></tr>
                                 </tbody>
                             </table>
                         </div>
                    </div>
                </div>

            </section>
        </div>

@endsection
