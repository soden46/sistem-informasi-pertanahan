<?php

namespace App\Http\Controllers\kades;

use App\Http\Controllers\Controller;
use App\Models\DataCDesa;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;


class KadesDataCTanahController extends Controller
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
            return view('adminDashboard.DataCDesa', [
                'title' => 'Data C Desa',
                'cDesa' => DataCDesa::orWhere('id_c_desa', 'like', "%" . $cari . "%")
                    ->orWhere('kelas_tanah', 'like', "%" . $cari . "%")
                    ->orWhere('id_pemilik', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.DataCDesa', [
                'title' => 'Data C Desa',
                'cDesa' => DataCDesa::paginate(10)
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_c_desa' => 'required|max:12',
            'kelas_tanah' => 'required|max:128',
            'id_kasi' => 'required|max:11',
            'id_pemilik' => 'required|max:11',
            'id_persil' => 'required|max:11',
            'id_history' => 'required|max:11',
            'id_kades' => 'required|max:11',
            'status_tanah' => 'required|max:50',
            'luas_tanah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'batas_utara' => 'required|max:128',
            'batas_timur' => 'required|max:128',
            'batas_selatan' => 'required|max:128',
            'batas_barat' => 'required|max:128'
        ]);

        // dd($validatedData);
        DataCDesa::create($validatedData);

        return redirect('/data-c-tanah')->with('successCreatedCDesa', 'Data has ben created');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_c_desa)
    {
        $rules = [
            'id_c_desa' => 'max:12',
            'kelas_tanah' => 'max:128',
            'id_kasi' => 'max:11',
            'id_pemilik' => 'max:11',
            'id_persil' => 'max:11',
            'id_history' => 'max:11',
            'id_kades' => 'max:11',
            'status_tanah' => 'max:50',
            'luas_tanah' => '',
            'tanggal' => '',
            'dijual' => '',
            'keterangan' => '',
            'batas_utara' => 'max:128',
            'batas_timur' => 'max:128',
            'batas_selatan' => 'max:128',
            'batas_barat' => 'max:128'
        ];


        $validatedData = $request->validate($rules);

        DataCDesa::where('id_c_desa', $id_c_desa)->update($validatedData);

        return redirect('/data-c-tanah')->with('successUpdatedCDesa', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        Penduduk::where('nik', $nik)->delete();
        return redirect('/data-penduduk')->with('successDeletedMasyarakat', 'Data has ben deleted');
    }
}
