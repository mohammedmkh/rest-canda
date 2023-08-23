<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Symfony\Component\HttpFoundation\Response;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('product_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city = City::orderby('id','asc')->get();

        return view('admin.city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $country=Country::orderby('id','asc')->get();

        return view('admin.city.create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->all());
        return redirect()->route('admin.city.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $country=Country::orderby('id','asc')->get();

        return view('admin.city.edit', [
            'city'=>$city ,
            'country'=>$country
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->all());
        return redirect()->route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
         abort_if(Gate::denies('city_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $city->delete();

         return back();
    }
}
