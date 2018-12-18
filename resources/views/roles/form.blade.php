<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {{ html()->label(__('fields.name'), 'name')->class('col-md-4 control-label') }}
    <div class="col-md-6">
        {{ html()->input('text', 'name')->placeholder(__('roles.name'))->class('form-control form-control-line') }}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    {{ html()->label(__('fields.label'), 'label')->class('col-md-4 control-label') }}
    <div class="col-md-6">
        {{ html()->input('text', 'label')->placeholder(__('roles.label'))->class('form-control form-control-line') }}
        @if($errors->has('label'))
            <span class="help-block">{{ $errors->first('label') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {{ html()->submit(isset($submitButtonText) ? $submitButtonText : __('fields.create'))->class('btn btn-primary') }}
    </div>
</div>
