@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.additional.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.additionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.additional.fields.id') }}
                        </th>
                        <td>
                            {{ $additional->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.additional.fields.price') }}
                        </th>
                        <td>
                            {{ $additional->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.additional.fields.name') }}
                        </th>
                        <td>
                            {{ $additional->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.additional.fields.type') }}
                        </th>
                        <td>
                            {{ $additional->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.additional.fields.product') }}
                        </th>
                        <td>
                            @foreach($additional->products as $key => $product)
                                <span class="label label-info">{{ $product->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.additionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection