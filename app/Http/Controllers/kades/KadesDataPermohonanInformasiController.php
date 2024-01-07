<?php

namespace App\Http\Controllers\kades;

use App\Http\Controllers\Controller;
use App\Models\DataPermohonanInformasi;
use App\Models\NoSurat;
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
        $id = DataPermohonanInformasi::create($validatedData);
        dd($id->id_pemohon);

        // Ambil bulan saat ini dalam bentuk angka (1-12)
        $bulanAngka = date('n');

        // Daftar bulan Romawi
        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI',
            7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];

        // Konversi angka bulan menjadi bulan Romawi
        $bulanRomawiSekarang = $bulanRomawi[$bulanAngka];

        NoSurat::create([
            'id_surat' => $id->id_pemohon,
            'nama_surat' => 'DPI',
            'kebutuhan' => 'Permohonan Informasi',
            'bulan_romawi' => $bulanRomawiSekarang,
        ]);
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
    public function update(Request $request, DataPermohonanInformasi $MutasiKeluar, $id_pemohon)
    {
        $validatedData = $request->validate([
            'id_persil' => 'max:16',
            'id_c_desa' => 'max:255',
            'nama_pemohon' => 'max:255',
            'tgl_pemohon' => 'max:255',
            'no_ktp' => 'max:18',
            'alamat' => 'max:255',
            'telepon' => 'max:255',
            'jenis' => 'max:255',
            'informasi' => 'max:255',
        ]);


        DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->update($validatedData);

        return back()->with('successUpdatedMasyarakat', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPermohonanInformasi  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemohon)
    {
        DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->delete();
        return back()->with('successDeletedMasyarakat', 'Data has ben deleted');
    }

    public function pdf($id_pemohon)
    {
        $dataPermohonan = DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->first();

        // Ambil field JSON dan ubah ke dalam array
        $dataJenis = json_decode($dataPermohonan->jenis_permohonan, true);

        $data = [
            'title' => 'Data Permohonan Informasi',
            'data' => DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->first(),
            'no_surat' => NoSurat::where('id_surat', $id_pemohon)->first(),
            'jenis_informasi' => $dataJenis

        ];
        // dd($data_jenis);
        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = PDF::loadView('kadesDashboard.pdf.DataPermohonanInformasi', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('data-permohonan-informasi.pdf');
    }
}
