<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $category->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="col-md-4 control-label">Color</label>
    <div id="category-color-picker" class="col-md-6 input-group my-colorpicker2 colorpicker-element">
            <input class="form-control" value="{{ $category->color or '#5477f4'}}" placeholder="Selecciona un color"  name="color" type="text" id="color">
        <div class="input-group-addon"><i></i></div>
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>


@push('css')
    <link rel="stylesheet" href="{{env('APP_URL')}}/vendor/colorpicker/bootstrap-colorpicker.min.css">
@endpush

@push('js')
    <script src="{{env('APP_URL')}}/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>

    <script>
        $('#category-color-picker').colorpicker();
    </script>
@endpush