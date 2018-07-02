<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="form-group">
        <label for="role_id" class="col-md-4 control-label">{{ 'Rol' }}</label>
        <div class="col-md-6">
            <select class="form-control" name="role_id" id="role_id">
                @foreach($roles AS $role)
                    <option class="" value="{{$role->id}}" @if(isset($user) and $user->role_id == $role->id) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $user->name or ''}}" required autocomplete="off">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="email" value="{{ $user->email or ''}}" required autocomplete="off">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="password" type="password" id="password" value="" autocomplete="off">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>
