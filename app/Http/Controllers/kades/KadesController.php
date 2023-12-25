<?php

namespace App\Http\Controllers\kades;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KadesController extends Controller
{
    public function index()
    {
        return view('kadesDashboard.index', [
            'title' => 'Dashboard',
        ]);
    }
}
