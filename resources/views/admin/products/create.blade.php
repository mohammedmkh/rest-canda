@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                        id="description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                        name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="categories">{{ trans('cruds.product.fields.category') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                        name="categories[]" id="categories" multiple>
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('categories'))
                        <span class="text-danger">{{ $errors->first('categories') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if ($errors->has('photo'))
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="resturant_id">{{ trans('cruds.product.fields.resturant') }}</label>
                    <select class="form-control select2 {{ $errors->has('resturant') ? 'is-invalid' : '' }}"
                        name="resturant_id" id="resturant_id">
                        @foreach ($resturants as $id => $entry)
                            <option value="{{ $id }}" {{ old('resturant_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('resturant'))
                        <span class="text-danger">{{ $errors->first('resturant') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.resturant_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="additionals">{{ trans('cruds.product.fields.additionals') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('additionals') ? 'is-invalid' : '' }}"
                        name="additionals[]" id="additionals" multiple>
                        @foreach ($additionals as $id => $additional)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('additionals', [])) ? 'selected' : '' }}>{{ $additional }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('additionals'))
                        <span class="text-danger">{{ $errors->first('additionals') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.additionals_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="discount">{{ trans('cruds.product.fields.discount') }}</label>
                    <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number"
                        name="discount" id="discount" value="{{ old('discount', '') }}" step="0.01">
                    @if ($errors->has('discount'))
                        <span class="text-danger">{{ $errors->first('discount') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.discount_helper') }}</span>
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

@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($product) && $product->photo)
                    var file = {!! json_encode($product->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
