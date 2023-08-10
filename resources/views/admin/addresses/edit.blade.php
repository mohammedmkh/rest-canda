@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="lat">{{ trans('cruds.address.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', $address->lat) }}">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="long">{{ trans('cruds.address.fields.long') }}</label>
                <input class="form-control {{ $errors->has('long') ? 'is-invalid' : '' }}" type="text" name="long" id="long" value="{{ old('long', $address->long) }}">
                @if($errors->has('long'))
                    <span class="text-danger">{{ $errors->first('long') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.long_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.address.fields.default') }}</label>
                <select class="form-control {{ $errors->has('default') ? 'is-invalid' : '' }}" name="default" id="default">
                    <option value disabled {{ old('default', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Address::DEFAULT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('default', $address->default) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('default'))
                    <span class="text-danger">{{ $errors->first('default') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.default_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.address.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $address->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection