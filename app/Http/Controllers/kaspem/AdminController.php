<?php

namespace App\Http\Controllers\kaspem;

use App\Http\Controllers\Controller;
use App\Models\DataKematian;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use App\Models\SuratKetKelahiran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('AdminDashboard.index', [
            'title' => 'Dashboard',
        ]);
    }
}
