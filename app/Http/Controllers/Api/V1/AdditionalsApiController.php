<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdditionalRequest;
use App\Http\Requests\UpdateAdditionalRequest;
use App\Http\Resources\Admin\AdditionalResource;
use App\Models\Additional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdditionalsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('additional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdditionalResource(Additional::with(['products'])->get());
    }

    public function store(StoreAdditionalRequest $request)
    {
        $additional = Additional::create($request->all());
        $additional->products()->sync($request->input('products', []));

        return (new AdditionalResource($additional))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Additional $additional)
    {
        abort_if(Gate::denies('additional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdditionalResource($additional->load(['products']));
    }

    public function update(UpdateAdditionalRequest $request, Additional $additional)
    {
        $additional->update($request->all());
        $additional->products()->sync($request->input('products', []));

        return (new AdditionalResource($additional))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Additional $additional)
    {
        abort_if(Gate::denies('additional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $additional->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
