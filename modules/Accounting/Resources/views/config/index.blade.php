@extends('layouts.dashboard.main')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <h2 class="page-header">Configuración</h2>

            <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Contabilidad</h3>
                    </div>
                    <div class="box-body">

                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr class="text-left">
                                    <th>Configurar</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Categorías</td>
                                    <td>
                                        <a href="{{ url('accounting/config/categories') }}" title="Configurar"><button class="btn btn-info btn-xs"><i class="fa fa-gear" aria-hidden="true"></i> Configurar</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>IVA</td>
                                    <td>
                                        <a href="{{ url('accounting/config/taxes') }}" title="Configurar"><button class="btn btn-info btn-xs"><i class="fa fa-gear" aria-hidden="true"></i> Configurar</button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </section>
        </div>

@endsection
