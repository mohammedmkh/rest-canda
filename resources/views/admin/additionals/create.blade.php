@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.additional.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.additionals.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="price">{{ trans('cruds.additional.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price"
                        id="price" value="{{ old('price', '') }}" step="0.01">
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.additional.fields.price_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="name">{{ trans('cruds.additional.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.additional.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="type">{{ trans('cruds.additional.fields.type') }}</label>
                    <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text"
                        name="type" id="type" value="{{ old('type', '') }}">
                    @if ($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.additional.fields.type_helper') }}</span>
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
