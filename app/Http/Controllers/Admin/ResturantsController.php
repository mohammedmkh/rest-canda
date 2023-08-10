<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyResturantRequest;
use App\Http\Requests\StoreResturantRequest;
use App\Http\Requests\UpdateResturantRequest;
use App\Models\Resturant;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ResturantsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('resturant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Resturant::query()->select(sprintf('%s.*', (new Resturant)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'resturant_show';
                $editGate      = 'resturant_edit';
                $deleteGate    = 'resturant_delete';
                $crudRoutePart = 'resturants';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('facebook', function ($row) {
                return $row->facebook ? $row->facebook : '';
            });
            $table->editColumn('twitter', function ($row) {
                return $row->twitter ? $row->twitter : '';
            });
            $table->editColumn('instagram', function ($row) {
                return $row->instagram ? $row->instagram : '';
            });
            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : '';
            });
            $table->editColumn('long', function ($row) {
                return $row->long ? $row->long : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.resturants.index');
    }

    public function create()
    {
        abort_if(Gate::denies('resturant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resturants.create');
    }

    public function store(StoreResturantRequest $request)
    {
        $resturant = Resturant::create($request->all());

        if ($request->input('image', false)) {
            $resturant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $resturant->id]);
        }

        return redirect()->route('admin.resturants.index');
    }

    public function edit(Resturant $resturant)
    {
        abort_if(Gate::denies('resturant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resturants.edit', compact('resturant'));
    }

    public function update(UpdateResturantRequest $request, Resturant $resturant)
    {
        $resturant->update($request->all());

        if ($request->input('image', false)) {
            if (! $resturant->image || $request->input('image') !== $resturant->image->file_name) {
                if ($resturant->image) {
                    $resturant->image->delete();
                }
                $resturant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($resturant->image) {
            $resturant->image->delete();
        }

        return redirect()->route('admin.resturants.index');
    }

    public function show(Resturant $resturant)
    {
        abort_if(Gate::denies('resturant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resturant->load('resturantOrders');

        return view('admin.resturants.show', compact('resturant'));
    }

    public function destroy(Resturant $resturant)
    {
        abort_if(Gate::denies('resturant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resturant->delete();

        return back();
    }

    public function massDestroy(MassDestroyResturantRequest $request)
    {
        $resturants = Resturant::find(request('ids'));

        foreach ($resturants as $resturant) {
            $resturant->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('resturant_create') && Gate::denies('resturant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Resturant();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
