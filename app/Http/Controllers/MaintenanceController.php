<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Asset;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.maintenance.index', [
            'title' => 'Data Maintenance',
            'maintenances' => Maintenance::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.maintenance.create', [
            'title' => 'Tambah Maintenance',
            'maintenances' => Maintenance::all(),
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
        $rules = [
            'asset_id' => 'required',
            'deskripsi' => 'required|max:255',
            'jumlah' => 'required|numeric',
            'tgl' => 'required|date',
            'biaya' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Maintenance::create($validatedData);
        return redirect('/maintenances')->with('success', 'Maintenance berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.edit', [
            'title' => 'Edit Maintenance',
            'maintenance' => $maintenance,
            'assets' => Asset::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $rules = [
            'asset_id' => 'required',
            'deskripsi' => 'required|max:255',
            'jumlah' => 'required|numeric',
            'tgl' => 'required|date',
            'biaya' => 'required'
        ];

        $validatedData = $request->validate($rules);

        // update data ke db
        Maintenance::where('id', $maintenance->id)
            ->update($validatedData);

        return redirect('/maintenances')->with('success', 'Maintenance berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        Maintenance::destroy($maintenance->id);
        return redirect('/maintenances')->with('success', 'Maintenance berhasil dihapus!');
    }

    public function reportmaintenance()
    {
        return view('dashboard.report.maintenance', [
            'title' => 'Laporan Data Maintenance',
            'maintenances' => Maintenance::all()
        ]);
    }
}
