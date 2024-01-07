<?php

namespace App\Http\Controllers\kaspem;

use App\Http\Controllers\Controller;
use App\Models\DataPersil;
use App\Models\Penduduk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;


class DataPersilController extends Controller
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
            return view('adminDashboard.DataPersil', [
                'title' => 'Data Persil',
                'persil' => DataPersil::where('id_persil', 'like', "%" . $cari . "%")
                    ->orWhere('lokasi', 'like', "%" . $cari . "%")
                    ->orWhere('luas_persil', 'like', "%" . $cari . "%")->paginate(10),
            ]);
        } else {
            return view('adminDashboard.DataPersil', [
                'title' => 'Data Persil',
                'persil' => DataPersil::paginate(10),
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
            'id_persil' => 'required|max:11',
            'lokasi' => 'required|max:255',
            'luas_persil' => 'required',
        ]);

        // dd($validatedData);
        DataPersil::create($validatedData);

        return redirect('/data-persil')->with('successCreatedPersil', 'Data has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPersil  $persil
     * @return \Illuminate\Http\Response
     */
    public function show(DataPersil $persil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPersil  $persil
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPersil $persil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPersil  $persil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persil)
    {
        $rules = [
            'id_persil' => 'max:11',
            'lokasi' => 'max:255',
            'luas_persil' => 'max:255',
            'verifikasi' => 'max:255',
        ];


        $validatedData = $request->validate($rules);

        DataPersil::where('id_persil', $id_persil)->update($validatedData);

        return redirect('/data-persil')->with('successUpdatedPersil', 'Data has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\{Persil}  $persil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persil)
    {
        DataPersil::where('id_persil', $id_persil)->delete();
        return redirect('/data-persil')->with('successDeletedPersil', 'Data has ben deleted');
    }
}
