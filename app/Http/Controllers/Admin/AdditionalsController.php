<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdditionalRequest;
use App\Http\Requests\StoreAdditionalRequest;
use App\Http\Requests\UpdateAdditionalRequest;
use App\Models\Additional;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdditionalsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('additional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Additional::with(['products'])->select(sprintf('%s.*', (new Additional)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'additional_show';
                $editGate      = 'additional_edit';
                $deleteGate    = 'additional_delete';
                $crudRoutePart = 'additionals';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });


            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.additionals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('additional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        return view('admin.additionals.create', compact('products'));
    }

    public function store(StoreAdditionalRequest $request)
    {
        $additional = Additional::create($request->all());
        $additional->products()->sync($request->input('products', []));

        return redirect()->route('admin.additionals.index');
    }

    public function edit(Additional $additional)
    {
        abort_if(Gate::denies('additional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        $additional->load('products');

        return view('admin.additionals.edit', compact('additional', 'products'));
    }

    public function update(UpdateAdditionalRequest $request, Additional $additional)
    {
        $additional->update($request->all());
        $additional->products()->sync($request->input('products', []));

        return redirect()->route('admin.additionals.index');
    }

    public function show(Additional $additional)
    {
        abort_if(Gate::denies('additional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $additional->load('products');

        return view('admin.additionals.show', compact('additional'));
    }

    public function destroy(Additional $additional)
    {
        abort_if(Gate::denies('additional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $additional->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdditionalRequest $request)
    {
        $additionals = Additional::find(request('ids'));

        foreach ($additionals as $additional) {
            $additional->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
