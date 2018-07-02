<div id="configModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <form class="form-horizontal" action="{{url('admin/config/dashboard')}}" method="POST">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Configuración</h4>
                </div>

                <div class="modal-body">
                        <input class="hidden" name="key" value="dashboard_grid_1_num_colums">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dashboard_grid_1_num_colums_value">
                                Columnas: (max. 12)
                            </label>

                            <div class="col-sm-10">
                                <input id="dashboard_grid_1_num_colums_value"
                                       name="value"
                                       type="number"
                                       class="form-control"
                                       autocomplete="off"
                                       value="{{$config['dashboard_grid_1_num_colums'] or 0}}"
                                       max="12"
                                       min="1">
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Aceptar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>

    </div>
</div>