<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            abort(403);
        }
        if (auth()->user()->role == 'kaspem') {
            return view('adminDashboard.index', [
                'title' => 'Dashboard Kasepem',
            ]);
        }
        if (auth()->user()->role == 'kades') {
            return view('kadesDashboard.index', [
                'title' => 'Dashboard Kades',
            ]);
        }
    }
}
