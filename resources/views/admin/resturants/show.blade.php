@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.resturant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.resturants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.id') }}
                        </th>
                        <td>
                            {{ $resturant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.name') }}
                        </th>
                        <td>
                            {{ $resturant->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.email') }}
                        </th>
                        <td>
                            {{ $resturant->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.phone') }}
                        </th>
                        <td>
                            {{ $resturant->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.facebook') }}
                        </th>
                        <td>
                            {{ $resturant->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.twitter') }}
                        </th>
                        <td>
                            {{ $resturant->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.instagram') }}
                        </th>
                        <td>
                            {{ $resturant->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.lat') }}
                        </th>
                        <td>
                            {{ $resturant->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.long') }}
                        </th>
                        <td>
                            {{ $resturant->long }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resturant.fields.image') }}
                        </th>
                        <td>
                            @if($resturant->image)
                                <a href="{{ $resturant->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $resturant->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.resturants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#resturant_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="resturant_orders">
            @includeIf('admin.resturants.relationships.resturantOrders', ['orders' => $resturant->resturantOrders])
        </div>
    </div>
</div>

@endsection