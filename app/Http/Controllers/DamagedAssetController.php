<?php

namespace App\Http\Controllers;

use App\Models\DamagedAsset;
use App\Models\Asset;
use Illuminate\Http\Request;

class DamagedAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.damaged-assets.index', [
            'title' => 'Data Aset Rusak',
            'data' => DamagedAsset::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.damaged-assets.create', [
            'title' => 'Tambah Aset Rusak',
            'asetrusak' => DamagedAsset::all(),
            'assets' => Asset::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate ([
            'asset_id' => 'required',
            'kondisi' => 'required|max:255',
            'solusi' => 'required|max:255',
            'jumlah' => 'required|numeric'
        ]);

        DamagedAsset::create($validatedData);
        return redirect('/damagedassets')->with('success', 'Aset rusak berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DamagedAsset  $damagedAsset
     * @return \Illuminate\Http\Response
     */
    public function show(DamagedAsset $damagedasset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DamagedAsset  $damagedAsset
     * @return \Illuminate\Http\Response
     */
    public function edit(DamagedAsset $damagedasset)
    {
        return view('dashboard.damaged-assets.edit',[
            'title' => 'Edit Aset Rusak',
            'asetrusak' => $damagedasset,
            'assets' => Asset::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DamagedAsset  $damagedAsset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DamagedAsset $damagedasset)
    {
        $validatedData = $request->validate ([
            'asset_id' => 'required',
            'kondisi' => 'required|max:255',
            'solusi' => 'required|max:255',
            'jumlah' => 'required|numeric'
        ]);

        // update data ke db
        DamagedAsset::where('id', $damagedasset->id)
            ->update($validatedData);

        return redirect('/damagedassets')->with('success', 'Aset rusak berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DamagedAsset  $damagedAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(DamagedAsset $damagedasset)
    {
        DamagedAsset::destroy($damagedasset->id);
        return redirect('/damagedassets')->with('success', 'Aset rusak berhasil dihapus!');
    }
}
