<div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : ''}}">
    <label for="invoice_number" class="col-md-4 control-label">{{ 'Invoice Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="invoice_number" type="text" id="invoice_number" value="{{ $invoice->invoice_number or ''}}" >
        {!! $errors->first('invoice_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
    <label for="company_name" class="col-md-4 control-label">{{ 'Company Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ $invoice->company_name or ''}}" required>
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('company_nif') ? 'has-error' : ''}}">
    <label for="company_nif" class="col-md-4 control-label">{{ 'Company Nif' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_nif" type="text" id="company_nif" value="{{ $invoice->company_nif or ''}}" required>
        {!! $errors->first('company_nif', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('company_address') ? 'has-error' : ''}}">
    <label for="company_address" class="col-md-4 control-label">{{ 'Company Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_address" type="text" id="company_address" value="{{ $invoice->company_address or ''}}" required>
        {!! $errors->first('company_address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_name') ? 'has-error' : ''}}">
    <label for="client_name" class="col-md-4 control-label">{{ 'Client Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_name" type="text" id="client_name" value="{{ $invoice->client_name or ''}}" >
        {!! $errors->first('client_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_nif') ? 'has-error' : ''}}">
    <label for="client_nif" class="col-md-4 control-label">{{ 'Client Nif' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_nif" type="text" id="client_nif" value="{{ $invoice->client_nif or ''}}" required>
        {!! $errors->first('client_nif', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_country') ? 'has-error' : ''}}">
    <label for="client_country" class="col-md-4 control-label">{{ 'Client Country' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_country" type="text" id="client_country" value="{{ $invoice->client_country or ''}}" required>
        {!! $errors->first('client_country', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_city') ? 'has-error' : ''}}">
    <label for="client_city" class="col-md-4 control-label">{{ 'Client City' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_city" type="text" id="client_city" value="{{ $invoice->client_city or ''}}" required>
        {!! $errors->first('client_city', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_cp') ? 'has-error' : ''}}">
    <label for="client_cp" class="col-md-4 control-label">{{ 'Client Cp' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_cp" type="text" id="client_cp" value="{{ $invoice->client_cp or ''}}" >
        {!! $errors->first('client_cp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_address') ? 'has-error' : ''}}">
    <label for="client_address" class="col-md-4 control-label">{{ 'Client Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="client_address" type="text" id="client_address" value="{{ $invoice->client_address or ''}}" required>
        {!! $errors->first('client_address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-md-4 control-label">{{ 'Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date" type="date" id="date" value="{{ $invoice->date or ''}}" >
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('due_date') ? 'has-error' : ''}}">
    <label for="due_date" class="col-md-4 control-label">{{ 'Due Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="due_date" type="date" id="due_date" value="{{ $invoice->due_date or ''}}" >
        {!! $errors->first('due_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="category_id" type="number" id="category_id" value="{{ $invoice->category_id or ''}}" >
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
