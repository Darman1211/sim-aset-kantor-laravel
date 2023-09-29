<?php

namespace App\Http\Controllers;

use App\Models\ReminderAsset;
use App\Models\Asset;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class ReminderAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reminder.index', [
            'title' => 'Pengingat'
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
        $startTime = Carbon::parse($request->input('tgl') . ' ' . $request->input('waktu'), 'Asia/Jakarta');
        $endTime = (clone $startTime)->addHour();

        Event::create([
            'name' => $request->input('judul'),
            'startDateTime' => $startTime,
            'endDateTime' => $endTime,
            'description' => $request->input('deskripsi')
        ]);

        return redirect()->back()->withMessage('Pengingat aset berhasil dibuat.');

        //     $validatedData = $request->validate ([
        //     'asset_id' => 'required',
        //     'judul' => 'required|max:100',
        //     'deskripsi' => 'required|max:255',
        //     'tgl' => 'required',
        //     'waktu' => 'required'
        // ]);

        // if(ReminderAsset::create($validatedData)) {
        //     $startTime = Carbon::parse($request->input('tgl').' '.$request->input('waktu'), 'Asia/Jakarta');
        //     $endTime = (clone $startTime)->addHour();
        //     $deskripsi = $request->input('deskripsi');

        //     Event::create([
        //         'name' => $request->input('judul'),
        //         'startDateTime' => $startTime,
        //         'endDateTime' => $endTime,
        //         'comment' => $deskripsi
        //     ]);

        //     return redirect()->back()->withMessage('Pengingat aset berhasil dibuat.');
        // }
    }
}
