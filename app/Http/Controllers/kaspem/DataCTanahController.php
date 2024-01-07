<?php

namespace App\Http\Controllers\kaspem;

use App\Http\Controllers\Controller;
use App\Models\DataCDesa;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;


class DataCTanahController extends Controller
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
                'cDesa' => DataCDesa::with('pemilik')->Where('id_c_desa', 'like', "%" . $cari . "%")
                    ->orWhere('kelas_tanah', 'like', "%" . $cari . "%")
                    ->orWhere('id_pemilik', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.DataCDesa', [
                'title' => 'Data C Desa',
                'cDesa' => DataCDesa::with('pemilik')->paginate(10)
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
            'id_pemilik' => 'required|max:11',
            'id_persil' => 'required|max:11',
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
            'id_pemilik' => 'max:11',
            'id_persil' => 'max:11',
            'luas_tanah' => '',
            'tanggal' => '',
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
    public function destroy($id_c_desa)
    {
        DataCDesa::where('id_c_desa', $id_c_desa)->delete();
        return redirect('/data-c-tanah')->with('successDeletedCDesa', 'Data has ben deleted');
    }
}
