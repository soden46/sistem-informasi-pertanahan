<?php

namespace App\Http\Controllers\kades;

use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
use App\Models\DataPemilikTanah;
use App\Models\MutasiKeluar;
use App\Models\MutasiMAsuk;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KadesDataPemilikTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        if ($cari != NULL) {
            return view('adminDashboard.DataPemilikTanah', [
                'title' => 'Data Pemilik Tanah',
                'PemilikTanah' => DataPemilikTanah::where('id_pemilik', 'like', "%" . $cari . "%")->paginate(10)
            ]);
        } else {
            return view('adminDashboard.DataPemilikTanah', [
                'title' => 'Data Pemilik Tanah',
                'PemilikTanah' => DataPemilikTanah::paginate(10),
            ]);
        }
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
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'id_pemilik' => 'required',
            'nama_pemilik' => 'required',
            'no_ktp' => 'required|max:16',
            'alamat' => 'required|max:255',
        ]);

        // dd($validatedData);
        DataPemilikTanah::create($validatedData);

        return back()->with('successCreatedPemilikTanah', 'Data has ben created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPemilikTanah  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPemilikTanah $dataPemilikTanah, $id_pemilik)
    {
        $validatedData = $request->validate([
            'id_pemilik' => 'required',
            'nama_pemilik' => 'required',
            'no_ktp' => 'required|max:16',
            'alamat' => 'required|max:255',
        ]);


        DataPemilikTanah::where('id_pemilik', $id_pemilik)->update($validatedData);

        return back()->with('successUpdatedPemilikTanah', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MutasiKeluar  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mk)
    {
        MutasiKeluar::where('nik_mk', $nik_mk)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($nik_mk)
    {
        $data = [
            'title' => 'Mutasi Keluar',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => MutasiKeluar::with('pend', 'kel1', 'kel2')->where('nik_mk', $nik_mk)->first(),
            'pendu' => Penduduk::get(),
        ];
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('adminDashboard.pdf.SuratMutasiKeluar', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-permohonan-mutasi-keluar.pdf');
    }

    public function pdflurah($nik_mk)
    {
        $data = [
            'title' => 'Keterangan Biasa',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'surat' => MutasiKeluar::with('pend')->where('nik_mk', $nik_mk)->first(),
            'pendu' => Penduduk::get()
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetBiasaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-mutasi-keluar.pdf');
    }
}
