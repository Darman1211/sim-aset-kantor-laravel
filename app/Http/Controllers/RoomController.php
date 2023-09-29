<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.rooms.index', [
            'title' => 'Ruangan Aset',
            'rooms' => Room::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255'
        ]);

        // insert data ke db
        Room::create($validatedData);

        return redirect('/rooms')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        // insert data ke db
        Room::where('id', $room->id)
            ->update($validatedData);

        return redirect('/rooms')->with('success', 'Ruangan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        // cek jika ruangan sudah digunakan pada table assets
        if ($room->assets()->count() ) {
            return back()->withErrors(['error' => 'Tidak dapat menghapus ruangan! Ruangan memiliki aset.']);
        }

        // cek jika ruangan sudah digunakan pada table peminjaman aset
        if ($room->borrowassets()->count() ) {
            return back()->withErrors(['error' => 'Tidak dapat menghapus ruangan! Ruangan memiliki data peminjaman aset.']);
        }

        Room::destroy($room->id);
        return redirect('/rooms')->with('success', 'Ruangan berhasil dihapus!');
    }
}
