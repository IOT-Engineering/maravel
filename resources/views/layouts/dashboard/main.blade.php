<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('') }}" >
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="author" content="@yield('author')">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=0.75, maximum-scale=1, user-scalable=yes" name="viewport">

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/admin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        @stack('css')

        <link rel="stylesheet" href="{{env('APP_URL')}}/admin/css/AdminLTE.css">
        <link rel="stylesheet" href="{{env('APP_URL')}}/admin/css/skins/skin-elegant.css">
        <link rel="stylesheet" href="{{env('APP_URL')}}/admin/css/Maravel.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>">

        @stack('script')

    </head>

    <body class="hold-transition skin-elegant sidebar-mini sidebar-collapse">
        <div class="wrapper">

            @include('layouts.dashboard.header')
            @include('layouts.dashboard.panel_left')

            @yield('content')

            @include('layouts.dashboard.footer')

        </div>

        @if (Session::has('flash_message'))
            <div class="flash-message">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        @endif

        @if (Session::has('flash_message_error'))
            <div class="flash-message">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message_error') }}
                </div>
            </div>
        @endif

        <!-- jQuery library -->
        <script src="{{env('APP_URL')}}/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="{{env('APP_URL')}}/admin/vendor/DataTables/datatables.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{env('APP_URL')}}/admin/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>

        <!-- AdminLTE App -->
        <script src="{{env('APP_URL')}}/admin/js/app.js"></script>
        <script src="{{env('APP_URL')}}/admin/js/DataTables/tables.js"></script>

        @stack('js')

        <script>
            $(document).ready(function() {
                $('#DataTable').DataTable( {
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            if(column.index() == 2 || column.index() == 5 || column.index() == 6) {
                                var select = $('<select><option value=""></option></select>')
                                    .appendTo( $(column.footer()).empty() )
                                    .on( 'change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );
                                        column
                                            .search( val ? '^'+val+'$' : '', true, false )
                                            .draw();
                                    });
                                column.data().unique().sort().each( function ( d, j ) {
                                    select.append('<option value="' + d + '">' + d + '</option>')
                                });
                            }
                        });
                    }
                });
            });
        </script>


    </body>


</html>