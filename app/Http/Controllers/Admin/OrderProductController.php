<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderProductRequest;
use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Requests\UpdateOrderProductRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderProducts = OrderProduct::with(['product', 'order'])->get();

        return view('admin.orderProducts.index', compact('orderProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orders = Order::pluck('total', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orderProducts.create', compact('orders', 'products'));
    }

    public function store(StoreOrderProductRequest $request)
    {
        $orderProduct = OrderProduct::create($request->all());

        return redirect()->route('admin.order-products.index');
    }

    public function edit(OrderProduct $orderProduct)
    {
        abort_if(Gate::denies('order_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orders = Order::pluck('total', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderProduct->load('product', 'order');

        return view('admin.orderProducts.edit', compact('orderProduct', 'orders', 'products'));
    }

    public function update(UpdateOrderProductRequest $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->all());

        return redirect()->route('admin.order-products.index');
    }

    public function show(OrderProduct $orderProduct)
    {
        abort_if(Gate::denies('order_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderProduct->load('product', 'order');

        return view('admin.orderProducts.show', compact('orderProduct'));
    }

    public function destroy(OrderProduct $orderProduct)
    {
        abort_if(Gate::denies('order_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderProductRequest $request)
    {
        $orderProducts = OrderProduct::find(request('ids'));

        foreach ($orderProducts as $orderProduct) {
            $orderProduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
