<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', __('fields.name'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control form-control-line', 'placeholder' => __('roles.name')]) !!}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    {!! Form::label('label', __('fields.label'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('label', null, ['class' => 'form-control form-control-line', 'placeholder' => __('roles.label')]) !!}
        @if($errors->has('label'))
            <span class="help-block">{{ $errors->first('label') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <table class="table table-bordered table-responsive table-hover no-footer">
            <tr>
                <th colspan="6" class="text-center">{{__('permissions.give.permissions')}}</th>
            </tr>
            <tr>
                <th>{{ __('fields.number') }}</th>
                <th>{{ __('fields.section') }}</th>
                <th class="text-center">Просмотр</th>
                <th class="text-center">Создание</th>
                <th class="text-center">Редактирование</th>
                <th class="text-center">Удаление</th>
            </tr>
            @foreach($menus as $menu)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $menu->label }}</td>
                    <td class="text-center">
                        {!! Form::checkbox('permissions[]', $menu->getPermissionName('show'), isset($role) ? $role->hasPermissionTo('show-' . str_slug($menu->name)) : false, ['class' => 'view']) !!}
                    </td>
                    <td class="text-center">
                        {!! Form::checkbox('permissions[]', $menu->getPermissionName('create'), isset($role) ? $role->hasPermissionTo('create-' . str_slug($menu->name)) : false, ['class' => 'view']) !!}
                    </td>
                    <td class="text-center">
                        {!! Form::checkbox('permissions[]', $menu->getPermissionName('update'), isset($role) ? $role->hasPermissionTo('update-' . str_slug($menu->name)) : false, ['class' => 'view']) !!}
                    </td>
                    <td class="text-center">
                        {!! Form::checkbox('permissions[]', $menu->getPermissionName('delete'), isset($role) ? $role->hasPermissionTo('delete-' . str_slug($menu->name)) : false, ['class' => 'view']) !!}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="col-md-12 text-center">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : __('fields.create'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
