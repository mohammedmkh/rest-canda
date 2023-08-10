@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.orderProduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.orderProduct.fields.id') }}
                        </th>
                        <td>
                            {{ $orderProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderProduct.fields.product') }}
                        </th>
                        <td>
                            {{ $orderProduct->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderProduct.fields.order') }}
                        </th>
                        <td>
                            {{ $orderProduct->order->total ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderProduct.fields.price') }}
                        </th>
                        <td>
                            {{ $orderProduct->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderProduct.fields.quantity') }}
                        </th>
                        <td>
                            {{ $orderProduct->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderProduct.fields.total') }}
                        </th>
                        <td>
                            {{ $orderProduct->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection