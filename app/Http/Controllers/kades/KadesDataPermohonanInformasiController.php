<?php

namespace App\Http\Controllers\kades;

use App\Http\Controllers\Controller;
use App\Models\DataPermohonanInformasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KadesDataPermohonanInformasiController extends Controller
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
            return view('kadesDashboard.DataPermohonanInformasi', [
                'title' => 'Data Permohon Informasi',
                'permohonan' => DataPermohonanInformasi::where('id_pemohon', 'like', "%" . $cari . "%")
                    ->orWhere('id_persil', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('kadesDashboard.DataPermohonanInformasi', [
                'title' => 'Data Permohon Informasi',
                'permohonan' => DataPermohonanInformasi::paginate(10),
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
            'id_pemohon' => 'required',
            'id_persil' => 'required|max:16',
            'id_c_desa' => 'required|max:255',
            'nama_pemohon' => 'required|max:255',
            'tgl_pemohon' => 'required|max:255',
            'no_ktp' => 'required|max:18',
            'alamat' => 'max:255',
            'telepon' => 'max:255',
            'jenis' => 'max:255',
            'informasi' => 'max:255',
        ]);

        // dd($validatedData);
        DataPermohonanInformasi::create($validatedData);

        return back()->with('successCreatedPermohonan', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPermohonanInformasi  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(DataPermohonanInformasi $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPermohonanInformasi  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPermohonanInformasi $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPermohonanInformasi  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPermohonanInformasi $MutasiKeluar, $nik_mk)
    {
        $validatedData = $request->validate([
            'nik_mk' => 'max:16',
            'alamat_tujuan_mk' => 'max:255',
            'prov_tuju' => 'max:255',
            'nik1' => 'max:16',
            'nama1' => 'max:255',
            'jk1' => 'max:255',
            'agama1' => 'max:255',
            'sts_kawin1' => 'max:255',
            'ket_kel1' => 'max:255',
            'nik2' => 'max:16',
            'nama2' => 'max:255',
            'jk2' => 'max:255',
            'agama2' => 'max:255',
            'sts_kawin2' => 'max:255',
            'ket_kel2' => 'max:255',
            'nik3' => 'max:16',
            'nama3' => 'max:255',
            'jk3' => 'max:255',
            'agama3' => 'max:255',
            'sts_kawin3' => 'max:255',
            'ket_kel3' => 'max:255',
            'nik5' => 'max:16',
            'nama5' => 'max:255',
            'jk5' => 'max:255',
            'agama5' => 'max:255',
            'sts_kawin5' => 'max:255',
            'ket_kel5' => 'max:255',
            'nik6' => 'max:16',
            'nama6' => 'max:255',
            'jk6' => 'max:255',
            'agama6' => 'max:255',
            'sts_kawin6' => 'max:255',
            'ket_kel6' => 'max:255',
            'verifikasi' => 'max:255'
        ]);


        DataPermohonanInformasi::where('nik_mk', $nik_mk)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPermohonanInformasi  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_mk)
    {
        DataPermohonanInformasi::where('nik_mk', $nik_mk)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($id_pemohon)
    {
        $data = [
            'title' => 'Data Permohonan Informasi',
            'data' => DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->first(),
        ];
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('kadesDashboard.pdf.DataPermohonanInformasi', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('data-permohonan-informasi.pdf');
    }

    public function pdflurah($nik_mk)
    {
        $data = [
            'title' => 'Keterangan Biasa',
            'surat' => DataPermohonanInformasi::with('pend')->where('nik_mk', $nik_mk)->first(),
        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('adminDashboard.pdf.SuratKetBiasaLurah', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('surat-keterangan-mutasi-keluar.pdf');
    }
}
