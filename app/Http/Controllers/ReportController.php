<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Maintenance;

class ReportController extends Controller
{
    public function reportaset()
    {
        return view('dashboard.report.aset', [
            'title' => 'Laporan Data Aset',
            'assets' => Asset::all()
        ]);
    }

    public function reportmaintenance()
    {
        return view('dashboard.report.maintenance', [
            'title' => 'Laporan Data Maintenance',
            'maintenances' => Maintenance::all()
        ]);
    }

    public function reportqr()
    {
        return view('dashboard.report.qrcode', [
            'title' => 'Laporan QR Code',
            'assets' => Asset::all()
        ]);
    }
}
