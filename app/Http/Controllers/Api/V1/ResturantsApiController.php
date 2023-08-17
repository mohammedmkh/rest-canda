<?php

namespace App\Http\Controllers\Api\V1;

use Gate;
use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResturantRequest;
use App\Http\Requests\UpdateResturantRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Admin\ResturantResource;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class ResturantsApiController extends Controller
{
    use MediaUploadingTrait;

    function resturantsshow($id) {
        $resturant = Resturant::find($id);
        if ($resturant) {
            return ResponseHelper::success(['resturants' => $resturant], 'resturants retrieved successfully.', 200);
        } else {
            return ResponseHelper::error('resturants not found.', 404);
        }
    }

    public function index()
    {
        abort_if(Gate::denies('resturant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResturantResource(Resturant::all());
    }

    public function store(StoreResturantRequest $request)
    {
        $resturant = Resturant::create($request->all());

        if ($request->input('image', false)) {
            $resturant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ResturantResource($resturant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /* public function show(Resturant $resturant)
    {
        abort_if(Gate::denies('resturant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResturantResource($resturant);
    } */

    public function update(UpdateResturantRequest $request, Resturant $resturant)
    {
        $resturant->update($request->all());

        if ($request->input('image', false)) {
            if (!$resturant->image || $request->input('image') !== $resturant->image->file_name) {
                if ($resturant->image) {
                    $resturant->image->delete();
                }
                $resturant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($resturant->image) {
            $resturant->image->delete();
        }

        return (new ResturantResource($resturant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Resturant $resturant)
    {
        abort_if(Gate::denies('resturant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resturant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
