@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.faq.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.faqs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="questions">{{ trans('cruds.faq.fields.questions') }}</label>
                <input class="form-control {{ $errors->has('questions') ? 'is-invalid' : '' }}" type="text" name="questions" id="questions" value="{{ old('questions', '') }}">
                @if($errors->has('questions'))
                    <span class="text-danger">{{ $errors->first('questions') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.faq.fields.questions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="answer">{{ trans('cruds.faq.fields.answer') }}</label>
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', '') }}">
                @if($errors->has('answer'))
                    <span class="text-danger">{{ $errors->first('answer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.faq.fields.answer_helper') }}</span>
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