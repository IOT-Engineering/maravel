<div id="addItemModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form class="form-horizontal" action="{{url('admin/config/dashboard/block')}}" method="POST">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Añadir Item</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="hidden" name="vendor" id="vendor" value="Maravel">
                    <input type="text" class="hidden" name="module" id="module" value="Maravel">
                    <input type="text" class="hidden" name="controller" id="controller">
                    <input type="text" class="hidden" name="function" id="function">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="controllerfunction">
                           Item
                        </label>

                        <div class="col-sm-10">
                            <select id="block-select" class="form-control">
                                @foreach($avaibleDashboardComponents->all() AS $item)
                                    <option data-function="{{$item->getFunctionName()}}"
                                            data-controller="{{$item->getControllerName()}}"
                                            data-module="{{$item->getModuleName()}}"
                                            data-vendor="{{$item->getModuleName()}}">
                                            {{$item->getModuleName()}} | {{$item->getName()}} : {{$item->getDescription()}}
                                    </option>
                                @endforeach
                            </select>
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

@push('js')
<script>

    var opselected = $('#block-select').find(":selected");
    $('#vendor').val(opselected.data('vendor'));
    $('#module').val(opselected.data('module'));
    $('#controller').val(opselected.data('controller'));
    $('#function').val(opselected.data('function'));

    $('#block-select').change(function ()
    {
        var selected = $(this).find(":selected");
        $('#vendor').val(selected.data('vendor'));
        $('#module').val(selected.data('module'));
        $('#controller').val(selected.data('controller'));
        $('#function').val(selected.data('function'));
    });

</script>
@endpush