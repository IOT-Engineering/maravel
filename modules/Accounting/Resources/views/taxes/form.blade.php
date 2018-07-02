<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="col-md-4 control-label">{{ 'Valor' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="value" type="number" id="value" value="{{ $tax->value or ''}}" required>
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>
