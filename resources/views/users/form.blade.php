<div class="form-group col-md-6">
    {!! Form::label('name', 'Name', ['class' => 'form-label required-input']) !!}
    {!! Form::text('name', null, ['class' => 'form-control ' . $errors->first('name', 'error'), 'placeholder' => 'Name', 'maxlength' => '50']) !!}
    {!! $errors->first('name', '<label class="error">:message</label>') !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email', ['class' => 'form-label required-input']) !!}
    {!! Form::email('email', null, ['class' => 'form-control ' . $errors->first('email', 'error'), 'placeholder' => 'Email', 'maxlength' => '50']) !!}
    {!! $errors->first('email', '<label class="error">:message</label>') !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('role', 'Role', ['class' => 'form-label required-input']) !!}
    {!! Form::select('role', $roles, null, ['class' => 'form-control ' . $errors->first('role', 'error'), 'placeholder' => 'Role']) !!}
    {!! $errors->first('role', '<label class="error">:message</label>') !!}
</div>
@if(@$user)
@else
<div class="form-group col-md-6">
    {!! Form::label('password', 'Password', ['class' => 'form-label required-input']) !!}
    {!! Form::password('password', ['class' => 'form-control ' . $errors->first('password', 'error'), 'placeholder' => 'Password']) !!}
    {!! $errors->first('password', '<label class="error">:message</label>') !!}
</div>
<div class="form-group col-md-6">
    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label required-input']) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control ' . $errors->first('password_confirmation', 'error'), 'placeholder' => 'Confirm Password']) !!}
    {!! $errors->first('password_confirmation', '<label class="error">:message</label>') !!}
</div>
@endif