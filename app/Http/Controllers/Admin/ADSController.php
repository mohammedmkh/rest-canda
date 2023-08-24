<?php

namespace App\Http\Controllers\Admin;

use App\Models\ADS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreADSRequest;
use App\Http\Requests\updateADSRequest;

class ADSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = ADS::orderby('type')->get();
        /* dd($ads); */
        return view('admin.ads.index', compact('ads'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ADS.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreADSRequest $request)
    {
        $ads = ADS::create($request->all());
        return redirect()->route('admin.ads.index');
    }

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        //
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ads=ADS::find($id);
        return view('admin.ADS.edit',[
            'ads'=>$ads,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateADSRequest $request, String $id)
    {
        $ads=ADS::find($id);
        $ads->update($request->all());
        return redirect()->route('admin.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ads=ADS::find($id);
        $ads->delete();

        return back();
    }
}
