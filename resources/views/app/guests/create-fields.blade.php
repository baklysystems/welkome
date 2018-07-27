<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <label for="type">@lang('common.idType'):</label>
    <select class="form-control selectpicker" title="{{ trans('users.chooseType') }}" name="type" id="type" required>
        @foreach($types as $type)
            @if($loop->first)
                <option selected value="{{ Hashids::encode($type->id) }}">{{ trans('common.' . $type->type) }}</option>
            @else
                <option value="{{ Hashids::encode($type->id) }}">{{ trans('common.' . $type->type) }}</option>
            @endif
        @endforeach
    </select>

    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
    <label for="dni">@lang('common.number'):</label>
    <input type="text" class="form-control" name="dni" id="dni" value="{{ old('dni') }}" required>

    @if ($errors->has('dni'))
        <span class="help-block">
            <strong>{{ $errors->first('dni') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">@lang('common.name')(s):</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="last_name">@lang('common.lastName')(s):</label>
    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required>

    @if ($errors->has('last_name'))
        <span class="help-block">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">@lang('common.email'):</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
    <label for="gender">@lang('common.gender'):</label>
    <select class="form-control selectpicker" title="{{ trans('guests.chooseGender') }}" name="gender" id="gender">
        <option value="f">@lang('common.f')</option>
        <option value="m">@lang('common.m')</option>
        <option value="x">@lang('common.other')</option>
    </select>

    @if ($errors->has('gender'))
        <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
    <label for="birthdate">@lang('common.birthdate'):</label>
    <input type="string" class="form-control datepicker" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">

    @if ($errors->has('birthdate'))
        <span class="help-block">
            <strong>{{ $errors->first('birthdate') }}</strong>
        </span>
    @endif
</div>