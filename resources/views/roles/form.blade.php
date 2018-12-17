<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {{ html()->label('name', 'Name')->class('col-md-4 control-label')->for('name') }}
    <div class="col-md-6">
        {{ html()->input('text', 'name')->placeholder('Role name')->class('form-control form-control-line') }}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    {{ html()->label('label', 'Label')->class('col-md-4 control-label')->for('name') }}
    <div class="col-md-6">
        {{ html()->input('text', 'label')->placeholder('Role description')->class('form-control form-control-line') }}
        @if($errors->has('label'))
            <span class="help-block">{{ $errors->first('label') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {{ html()->submit(isset($submitButtonText) ? $submitButtonText : 'Create')->class('btn btn-primary') }}
    </div>
</div>
