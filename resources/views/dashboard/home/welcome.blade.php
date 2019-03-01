
@extends('layouts.dashboard.main')
@section('title', 'Panel Principal')
@section('description','')
@section('keywords','golmedical')
@section('author','CloudWare Team')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="box">
            <div class="box-header">

                <div class="box-title">Panel de Control</div>

                <a href="javascript:void(0)" class="btn btn-success btn-sm" title="Añadir Item"
                   data-toggle="modal"
                   data-target="#addItemModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Añadir Item
                </a>

                <a href="javascript:void(0)" class="btn btn-primary btn-sm" title="Configuración"
                   data-toggle="modal"
                   data-target="#configModal">
                    <i class="fa fa-gear" aria-hidden="true"></i> Configurar
                </a>

            </div>
        </div>
        <section class="content">
                <div class="row">
                    @if(isset($config['dashboard_grid_1_num_colums']))
                        <?php
                            $col_size       = (int) (12/$config['dashboard_grid_1_num_colums']);
                            $diff_col_size  = 12 - $col_size*($config['dashboard_grid_1_num_colums']-1);
                        ?>

                        @for($i=0; $i < $config['dashboard_grid_1_num_colums']; $i++)
                            <?php
                                ($i== 0 && $diff_col_size != 0)? $next_col_size=$diff_col_size : $next_col_size = $col_size;
                            ?>

                            <section class="col-md-{{$next_col_size}} connectedSortable" data-col="{{$i}}">
                                @foreach($selectedComponents AS $item)
                                    @if($item->col == $i or ($item->col >= $config['dashboard_grid_1_num_colums'] and $i == $config['dashboard_grid_1_num_colums']-1) )
                                        <div class="box box-solid"
                                             data-id="{{$item->id}}"
                                             data-delete="{{route('dashboard-delete-block', ['id' => $item->id ]) }}"
                                             data-update="{{route('dashboard-update-block', ['id' => $item->id ]) }}">

                                            <div class="box-header dragdrop">
                                                <h3 class="box-title">{{$avaibleDashboardComponents->get($item->controller, $item->function)->getName()}}</h3>
                                                <div class="pull-right box-tools">
                                                    <i class="btn fa fa-times-circle" style="color: red;" data-widget="remove"></i>
                                                </div>
                                            </div>
                                            <div class="box-body no-padding">

                                                {!! $avaibleDashboardComponents->get($item->controller, $item->function)->render()!!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </section>
                        @endfor
                    @endif

                    <div class="clearfix">
                    </div>

                </div>
        </section>

        @include('dashboard.home.configModal', ['config' => $config])
        @include('dashboard.home.addItemModal', ['config' => $config])

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
@endpush

@push('js')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


    <script>
        $(".connectedSortable").sortable({
            placeholder: "sort-highlight",
            connectWith: ".connectedSortable",
            handle: ".box-header",
            forcePlaceholderSize: true,
            zIndex: 999999,
            stop: eventSortStop
        });

        function eventSortStop( event, ui ) {
            var id  = ui.item.data('id');
            var col = ui.item.parents('.connectedSortable').first().data('col');
            var route = ui.item.data('update');

            console.log(route);
            $.ajax({
                url: route,
                type: 'PUT',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                data: { col: col, row: 1},
                success: function(result) {
                    console.log('okay')
                }
            });
        }

        $(".dragdrop").css("cursor", "move");

        $('.box').on('box.removed', function()
        {
            var id = $(this).data('id');
            var route = $(this).data('delete');

            $.ajax({
                url: route,
                type: 'DELETE',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(result) {
                    console.log('okay')
                }
            });
        });

    </script>
@endpush
