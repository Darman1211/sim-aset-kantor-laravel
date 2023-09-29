<?php

namespace App\Http\Controllers;

use App\Models\BorrowAsset;
use App\Models\Asset;
use App\Models\Room;
use Illuminate\Http\Request;

class BorrowAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.borrowassets.index', [
            'title' => 'Data Peminjaman Aset',
            'pinjamaset' => BorrowAsset::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.borrowassets.create', [
            'title' => 'Tambah Peminjaman Aset',
            'pinjamaset' => BorrowAsset::all(),
            'assets' => Asset::all(),
            'rooms' => Room::all()
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
            'room_id' => 'required',
            'pj' => 'required|max:50',
            'tgl_pinjam' => 'required|date',
            'durasi' => 'required|max:50',
            'status' => 'required'
        ]);

        BorrowAsset::create($validatedData);
        return redirect('/borrowassets')->with('success', 'Peminjaman aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorrowAsset  $borrowAsset
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowAsset $borrowAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowAsset  $borrowAsset
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowAsset $borrowasset)
    {
        return view('dashboard.borrowassets.edit', [
            'title' => 'Edit Peminjaman Aset',
            'pinjamaset' => $borrowasset,
            'assets' => Asset::all(),
            'rooms' => Room::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorrowAsset  $borrowAsset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BorrowAsset $borrowasset)
    {
        $validatedData = $request->validate ([
            'asset_id' => 'required',
            'room_id' => 'required',
            'pj' => 'required|max:50',
            'tgl_pinjam' => 'required|date',
            'durasi' => 'required|max:50',
            'status' => 'required'
        ]);

        // update data ke db
        BorrowAsset::where('id', $borrowasset->id)
            ->update($validatedData);

        return redirect('/borrowassets')->with('success', 'Peminjaman aset berhasil diedit!');
    }

    public function return(Request $request, $id)
    {
        BorrowAsset::find($id)->update($request->all()); 
        return redirect('/borrowassets')->with('success', 'Aset telah dikembalikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowAsset  $borrowAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowAsset $borrowasset)
    {
        BorrowAsset::destroy($borrowasset->id);
        return redirect('/borrowassets')->with('success', 'Peminjaman aset berhasil dihapus!');
    }
}
