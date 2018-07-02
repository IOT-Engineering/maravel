<h3>Empresa</h3>

<div class="form-group {{ $errors->has('company_logo') ? 'has-error' : ''}}">
    <label for="company_logo" class="col-md-4 control-label">{{ 'Logo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_logo" type="text" id="company_logo" value="{{ $config->company_logo or ''}}" >
        {!! $errors->first('company_logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
    <label for="company_name" class="col-md-4 control-label">{{ 'Razón Social' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ $config->company_name or ''}}" required>
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_nif') ? 'has-error' : ''}}">
    <label for="company_nif" class="col-md-4 control-label">{{ 'NIF' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_nif" type="text" id="company_nif" value="{{ $config->company_nif or ''}}" required>
        {!! $errors->first('company_nif', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('company_bank_account') ? 'has-error' : ''}}">
    <label for="company_bank_account" class="col-md-4 control-label">{{ 'Cuenta Bancaria' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_bank_account" type="text" id="company_bank_account" value="{{ $config->company_bank_account or ''}}" >
        {!! $errors->first('company_bank_account', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<hr>


<h3>Facturación</h3>
<div class="form-group {{ $errors->has('invoice_prefix') ? 'has-error' : ''}}">
    <label for="invoice_prefix" class="col-md-4 control-label">{{ 'Invoice Prefix' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoice_prefix" type="text" id="invoice_prefix" value="{{ $config->invoice_prefix or ''}}" >
        {!! $errors->first('invoice_prefix', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('invoice_next_id') ? 'has-error' : ''}}">
    <label for="invoice_next_id" class="col-md-4 control-label">{{ 'Invoice Next Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoice_next_id" type="number" id="invoice_next_id" value="{{ $config->invoice_next_id or ''}}" required>
        {!! $errors->first('invoice_next_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<hr>

<h3>Productos</h3>

<div class="form-group {{ $errors->has('product_model') ? 'has-error' : ''}}">
    <label for="product_model" class="col-md-4 control-label">{{ 'Nombre de Modelo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="product_model" type="text" id="product_model" value="{{ $config->product_model or ''}}" >
        {!! $errors->first('product_model', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('product_model_col_name') ? 'has-error' : ''}}">
    <label for="product_model_col_name" class="col-md-4 control-label">{{ 'Columna "Nombre"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="product_model_col_name" type="text" id="product_model_col_name" value="{{ $config->product_model_col_name or ''}}" >
        {!! $errors->first('product_model_col_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('product_model_col_price') ? 'has-error' : ''}}">
    <label for="product_model_col_price" class="col-md-4 control-label">{{ 'Columna "Precio"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="product_model_col_price" type="text" id="product_model_col_price" value="{{ $config->product_model_col_price or ''}}" >
        {!! $errors->first('product_model_col_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('product_model_col_tax') ? 'has-error' : ''}}">
    <label for="product_model_col_tax" class="col-md-4 control-label">{{ 'Columna "Iva"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="product_model_col_tax" type="text" id="product_model_col_tax" value="{{ $config->product_model_col_tax or ''}}" >
        {!! $errors->first('product_model_col_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('product_model_col_description') ? 'has-error' : ''}}">
    <label for="product_model_col_description" class="col-md-4 control-label">{{ 'Columna "Descripción"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="product_model_col_description" type="text" id="product_model_col_description" value="{{ $config->product_model_col_description or ''}}" >
        {!! $errors->first('product_model_col_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<hr>

<h3>Clientes</h3>

<div class="form-group {{ $errors->has('client_model') ? 'has-error' : ''}}">
    <label for="client_model" class="col-md-4 control-label">{{ 'Nombre de Modelo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model" type="text" id="client_model" value="{{ $config->client_model or ''}}" >
        {!! $errors->first('client_model', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_model_col_name') ? 'has-error' : ''}}">
    <label for="client_model_col_name" class="col-md-4 control-label">{{ 'Columna "Nombre"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model_col_name" type="text" id="client_model_col_name" value="{{ $config->client_model_col_name or ''}}" >
        {!! $errors->first('client_model_col_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_model_col_nif') ? 'has-error' : ''}}">
    <label for="client_model_col_nif" class="col-md-4 control-label">{{ 'Columna "NIF"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model_col_nif" type="text" id="client_model_col_nif" value="{{ $config->client_model_col_nif or ''}}" >
        {!! $errors->first('client_model_col_nif', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_model_col_address') ? 'has-error' : ''}}">
    <label for="client_model_col_address" class="col-md-4 control-label">{{ 'Columna "Dirección"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model_col_address" type="text" id="client_model_col_address" value="{{ $config->client_model_col_address or ''}}" >
        {!! $errors->first('client_model_col_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_model_col_cp') ? 'has-error' : ''}}">
    <label for="client_model_col_cp" class="col-md-4 control-label">{{ 'Columna "CP"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model_col_cp" type="text" id="client_model_col_cp" value="{{ $config->client_model_col_cp or ''}}" >
        {!! $errors->first('client_model_col_cp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_model_col_city') ? 'has-error' : ''}}">
    <label for="client_model_col_city" class="col-md-4 control-label">{{ 'Columna "Ciudad"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model_col_city" type="text" id="client_model_col_city" value="{{ $config->client_model_col_city or ''}}" >
        {!! $errors->first('client_model_col_city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_model_col_country') ? 'has-error' : ''}}">
    <label for="client_model_col_country" class="col-md-4 control-label">{{ 'Columna "País"' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_model_col_country" type="text" id="client_model_col_country" value="{{ $config->client_model_col_country or ''}}" >
        {!! $errors->first('client_model_col_country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
