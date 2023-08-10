@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="total">{{ trans('cruds.order.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $order->total) }}" step="0.01">
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $order->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.order_status') }}</label>
                <select class="form-control {{ $errors->has('order_status') ? 'is-invalid' : '' }}" name="order_status" id="order_status">
                    <option value disabled {{ old('order_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::ORDER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('order_status', $order->order_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('order_status'))
                    <span class="text-danger">{{ $errors->first('order_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resturant_id">{{ trans('cruds.order.fields.resturant') }}</label>
                <select class="form-control select2 {{ $errors->has('resturant') ? 'is-invalid' : '' }}" name="resturant_id" id="resturant_id">
                    @foreach($resturants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('resturant_id') ? old('resturant_id') : $order->resturant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('resturant'))
                    <span class="text-danger">{{ $errors->first('resturant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.resturant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_price">{{ trans('cruds.order.fields.delivery_price') }}</label>
                <input class="form-control {{ $errors->has('delivery_price') ? 'is-invalid' : '' }}" type="number" name="delivery_price" id="delivery_price" value="{{ old('delivery_price', $order->delivery_price) }}" step="0.01">
                @if($errors->has('delivery_price'))
                    <span class="text-danger">{{ $errors->first('delivery_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delivery_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.receipt_type') }}</label>
                <select class="form-control {{ $errors->has('receipt_type') ? 'is-invalid' : '' }}" name="receipt_type" id="receipt_type">
                    <option value disabled {{ old('receipt_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::RECEIPT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('receipt_type', $order->receipt_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('receipt_type'))
                    <span class="text-danger">{{ $errors->first('receipt_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.receipt_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.order.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', $order->tax) }}" step="0.01">
                @if($errors->has('tax'))
                    <span class="text-danger">{{ $errors->first('tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method_id">{{ trans('cruds.order.fields.payment_method') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method_id" id="payment_method_id">
                    @foreach($payment_methods as $id => $entry)
                        <option value="{{ $id }}" {{ (old('payment_method_id') ? old('payment_method_id') : $order->payment_method->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_method_helper') }}</span>
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