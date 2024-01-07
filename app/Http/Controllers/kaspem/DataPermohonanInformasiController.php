<?php

namespace App\Http\Controllers\kaspem;

use App\Http\Controllers\Controller;
use App\Models\DataPermohonanInformasi;
use App\Models\MutasiKeluar;
use App\Models\NoSurat;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DataPermohonanInformasiController extends Controller
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
            return view('adminDashboard.DataPermohonanInformasi', [
                'title' => 'Data Permohon Informasi',
                'permohonan' => DataPermohonanInformasi::where('id_pemohon', 'like', "%" . $cari . "%")
                    ->orWhere('id_persil', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.DataPermohonanInformasi', [
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
            'id_persil' => 'required',
            'id_c_desa' => 'required',
            'nama_pemohon' => 'required',
            'tgl_pemohon' => 'required|date',
            'no_ktp' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenis_permohonan' => 'required|array',
            'jenis_tanah' => 'required' // Memastikan setidaknya satu jenis dipilih
        ]);

        // Mengambil jenis permohonan yang dipilih dan menyimpannya sebagai array JSON
        $jenisPermohonan = json_encode($validatedData['jenis_permohonan']);

        // Menyimpan data ke dalam database atau melakukan apa pun yang diperlukan
        // Misalnya, DataPermohonan adalah model yang sesuai dengan tabel di database Anda
        $permohonan = new DataPermohonanInformasi([
            'id_persil' => $validatedData['id_persil'],
            'id_c_desa' => $validatedData['id_c_desa'],
            'nama_pemohon' => $validatedData['nama_pemohon'],
            'tgl_pemohon' => $validatedData['tgl_pemohon'],
            'no_ktp' => $validatedData['no_ktp'],
            'alamat' => $validatedData['alamat'],
            'telepon' => $validatedData['telepon'],
            'jenis_permohonan' => $jenisPermohonan,
            'jenis_tanah' => $validatedData['jenis_tanah'] // Menyimpan jenis permohonan dalam format JSON
        ]);

        // Simpan data ke dalam database
        $permohonan->save();
        // Mengambil ID dari data yang baru saja disimpan
        $idBaru = $permohonan->id;
        // dd($idBaru);

        // Ambil bulan saat ini dalam bentuk angka (1-12)
        $bulanAngka = date('n');
        // Ambil tahun saat ini 
        $tahunAngka = date('Y');

        // Daftar bulan Romawi
        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI',
            7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];

        // Konversi angka bulan menjadi bulan Romawi
        $bulanRomawiSekarang = $bulanRomawi[$bulanAngka];

        NoSurat::create([
            'id_surat' => $idBaru,
            'nama_surat' => 'DPI',
            'kebutuhan' => 'Permohonan Informasi',
            'bulan_romawi' => $bulanRomawiSekarang,
            'nomor' => 'DPI / ' . $bulanRomawiSekarang . " / " . $tahunAngka,
        ]);

        return redirect('/permohonan-informasi')->with('successCreatedPermohonan', 'Data permohonan informasi berhasil disimpan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPermohonanInformasi  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPermohonanInformasi  $DataPermohonanInformasi, $id_pemohon)
    {
        $validatedData = $request->validate([
            'id_pemohon' => 'max:11',
            'id_persil' => 'max:16',
            'id_c_desa' => 'max:255',
            'nama_pemohon' => 'max:255',
            'tgl_pemohon' => 'max:255',
            'no_ktp' => 'max:18',
            'alamat' => 'max:255',
            'telepon' => 'max:255',
            'jenis_permohonan' => 'max:255',
            'jenis_tanah' => 'max:255',
        ]);
        // Mengambil jenis permohonan yang dipilih dan menyimpannya sebagai array JSON
        $validatedData['jenis_permohonan'] = json_encode($validatedData['jenis_permohonan']);
        DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->update($validatedData);

        return back()->with('successUpdatedPermohonan', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPermohonanInformasi  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemohon)
    {
        DataPermohonanInformasi::where('id_pemohon', $id_pemohon)->delete();
        return back()->with('successDeletedPemohon', 'Data has ben deleted');
    }
}
