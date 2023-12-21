@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedCDesa'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedCDesa') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedCDesa'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedCDesa') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedCDesa'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedCDesa') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedAllData'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedAllData') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <div>
            <div class="d-flex">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataCDesa" style="margin-right: 15px">Tambah Persil</button>
                <form action="/data-c-desa" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataCDesa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataCDesaLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataCDesaLabel">Tambah Data C Desa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('data-c-tanah/store')}}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="id_c_desa" class="form-label"><b>ID C Desa</b></label>

                                    <input type="text" name="id_c_desa" id="id_c_desa" class="form-control @error('id_c_desa') is-invalid @enderror" required value="{{ old('id_c_desa') }}" autocomplete="off" placeholder="Input ID C Desa">

                                    @error('id_c_desa')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kelas_tanah" class="form-label"><b>Kelas Tanah</b></label>

                                    <input type="text" name="kelas_tanah" id="kelas_tanah" class="form-control @error('kelas_tanah') is-invalid @enderror" required value="{{ old('kelas_tanah') }}" autocomplete="off" placeholder="Input Kelas Tanah">

                                    @error('kelas_tanah')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="id_kasi" class="form-label"><b>ID Kasi</b></label>

                                    <input type="text" name="id_kasi" id="id_kasi" class="form-control @error('id_kasi') is-invalid @enderror" required value="{{ old('id_kasi') }}" autocomplete="off" placeholder="Input ID Kasi">

                                    @error('id_kasi')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="id_pemilik" class="form-label"><b>ID Pemilik</b></label>

                                    <input type="text" name="id_pemilik" id="id_pemilik" class="form-control @error('id_pemilik') is-invalid @enderror" required value="{{ old('id_pemilik') }}" autocomplete="off" placeholder="Input ID Pemilik">

                                    @error('id_pemilik')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="id_persil" class="form-label"><b>ID Persil</b></label>

                                    <input type="text" name="id_persil" id="id_persil" class="form-control @error('id_persil') is-invalid @enderror" required value="{{ old('id_persil') }}" autocomplete="off" placeholder="Input ID Persil">

                                    @error('id_persil')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="id_history" class="form-label"><b>ID History</b></label>

                                    <input type="text" name="id_history" id="id_history" class="form-control @error('id_history') is-invalid @enderror" required value="{{ old('id_history') }}" autocomplete="off" placeholder="Input ID Persil">

                                    @error('id_history')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="id_kades" class="form-label"><b>ID Kades</b></label>

                                    <input type="text" name="id_kades" id="id_kades" class="form-control @error('id_kades') is-invalid @enderror" required value="{{ old('id_kades') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('id_kades')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status_tanah" class="form-label"><b>Status Tanah</b></label>

                                    <input type="text" name="status_tanah" id="status_tanah" class="form-control @error('status_tanah') is-invalid @enderror" required value="{{ old('status_tanah') }}" autocomplete="off" placeholder="Input Status Tanah">

                                    @error('status_tanah')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="luas_tanah" class="form-label"><b>Luas Tanah</b></label>

                                    <input type="number" step="0.1" min="0" name="luas_tanah" id="luas_tanah" class="form-control @error('luas_tanah') is-invalid @enderror" required value="{{ old('luas_tanah') }}" autocomplete="off" placeholder="Input Luas Tanah">

                                    @error('luas_tanah')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label"><b>Tanggal</b></label>

                                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required value="{{ old('tanggal') }}" autocomplete="off" placeholder="Input Tanggal">

                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="dijual" class="form-label"><b>Dijual</b></label>

                                    <input type="date" name="dijual" id="dijual" class="form-control @error('dijual') is-invalid @enderror" required value="{{ old('dijual') }}" autocomplete="off" placeholder="Input Tanggal Dijual">

                                    @error('dijual')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="sisa" class="form-label"><b>Sisa</b></label>

                                    <input type="number" step="0.1" min="0" name="sisa" id="sisa" class="form-control @error('sisa') is-invalid @enderror" required value="{{ old('sisa') }}" autocomplete="off" placeholder="Input Sisa Tanah">

                                    @error('sisa')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="keterangan" class="form-label"><b>Keterangan</b></label>

                                    <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ old('keterangan') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="batas_utara" class="form-label"><b>Batas Utara</b></label>

                                    <input type="text" name="batas_utara" id="batas_utara" class="form-control @error('batas_utara') is-invalid @enderror" required value="{{ old('batas_utara') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('batas_utara')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="batas_timur" class="form-label"><b>Batas TImur</b></label>

                                    <input type="text" name="batas_timur" id="batas_timur" class="form-control @error('batas_timur') is-invalid @enderror" required value="{{ old('batas_timur') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('batas_timur')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="batas_selatan" class="form-label"><b>Batas Selatan</b></label>

                                    <input type="text" name="batas_selatan" id="batas_selatan" class="form-control @error('batas_selatan') is-invalid @enderror" required value="{{ old('batas_selatan') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('batas_selatan')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="batas_barat" class="form-label"><b>Batas Barat</b></label>

                                    <input type="text" name="batas_barat" id="batas_barat" class="form-control @error('batas_barat') is-invalid @enderror" required value="{{ old('batas_barat') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('batas_barat')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal delete all-->
            <div class="modal fade" id="deleteAllData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAllDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteAllDataLabel">Hapus Seluruh Data Masyarakat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <p><b>Apakah anda yakin untuk menghapus seluruh data masyarakat? pastikan anda telah meng-export data untuk menanggulangi kesalahan</b></p>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            <a href="deleteAllMasyarakat"><button type="submit" class="btn btn-primary">Delete</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table" style="text-align: left; color: black">
                <tr>
                    <th>No</th>
                    <th>ID C Desa</th>
                    <th>Kelas Tanah</th>
                    <th>ID Kasi</th>
                    <th>ID Pemilik</th>
                    <th>Verifikasi</th>
                    <th style="text-align: center">Action</th>
                </tr>
                @foreach ($cDesa as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $cDesa->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_c_desa}}</td>
                    <td style="vertical-align: middle;  ">{{ $item->kelas_tanah }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_kasi }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_pemilik }}</td>
                    <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Diverifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasibayi{{ $item->id_c_desa }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->id_c_desa }}">Batal Verifikasi</button>
                        @endif
                    </td>
                    <td style="text-align: center;  ">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editDataCDesa{{ $item->id_c_desa }}">Edit</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#hapusverifikasi{{ $item->id_c_desa }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="staticBackdrop{{ $item->nik}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Data C Desa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-persil', $item->id_c_desa) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editDataCDesa{{ $item->id_c_desa }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataCDesaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataCDesaLabel">Edit Data Persil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('data-c-tanah/update',$item->id_c_desa)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="id_c_desa" class="form-label"><b>ID C Desa</b></label>

                                        <input type="text" name="id_c_desa" id="id_c_desa" class="form-control @error('id_c_desa') is-invalid @enderror" required value="{{ $item->id_c_desa}}" autocomplete="off" placeholder="Input ID C Desa">

                                        @error('id_c_desa')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="kelas_tanah" class="form-label"><b>Kelas Tanah</b></label>

                                        <input type="text" name="kelas_tanah" id="kelas_tanah" class="form-control @error('kelas_tanah') is-invalid @enderror" required value="{{ $item->kelas_tanah}}" autocomplete="off" placeholder="Input Kelas Tanah">

                                        @error('kelas_tanah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_kasi" class="form-label"><b>ID Kasi</b></label>

                                        <input type="text" name="id_kasi" id="id_kasi" class="form-control @error('id_kasi') is-invalid @enderror" required value="{{ $item->id_kasi }}" autocomplete="off" placeholder="Input ID Kasi">

                                        @error('id_kasi')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_pemilik" class="form-label"><b>ID Pemilik</b></label>

                                        <input type="text" name="id_pemilik" id="id_pemilik" class="form-control @error('id_pemilik') is-invalid @enderror" required value="{{ $item->id_pemilik }}" autocomplete="off" placeholder="Input ID Pemilik">

                                        @error('id_pemilik')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_persil" class="form-label"><b>ID Persil</b></label>

                                        <input type="text" name="id_persil" id="id_persil" class="form-control @error('id_persil') is-invalid @enderror" required value="{{ $item->id_persil }}" autocomplete="off" placeholder="Input ID Persil">

                                        @error('id_persil')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_history" class="form-label"><b>ID History</b></label>

                                        <input type="text" name="id_history" id="id_history" class="form-control @error('id_history') is-invalid @enderror" required value="{{ $item->id_history }}" autocomplete="off" placeholder="Input ID History">

                                        @error('id_history')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_kades" class="form-label"><b>ID Kades</b></label>

                                        <input type="text" name="id_kades" id="id_kades" class="form-control @error('id_kades') is-invalid @enderror" required value="{{ $item->id_kades }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('id_kades')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="status_tanah" class="form-label"><b>Status Tanah</b></label>

                                        <input type="text" name="status_tanah" id="status_tanah" class="form-control @error('status_tanah') is-invalid @enderror" required value="{{ $item->status_tanah }}" autocomplete="off" placeholder="Input Status Tanah">

                                        @error('status_tanah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="luas_tanah" class="form-label"><b>Luas Tanah</b></label>

                                        <input type="number" step="0.1" min="0" name="luas_tanah" id="luas_tanah" class="form-control @error('luas_tanah') is-invalid @enderror" required value="{{ $item->luas_tanah }}" autocomplete="off" placeholder="Input Luas Tanah">

                                        @error('luas_tanah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label"><b>Tanggal</b></label>

                                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required value="{{ $item->tanggal }}" autocomplete="off" placeholder="Input Tanggal">

                                        @error('tanggal')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="dijual" class="form-label"><b>Dijual</b></label>

                                        <input type="date" name="dijual" id="dijual" class="form-control @error('dijual') is-invalid @enderror" required value="{{ $item->dijual }}" autocomplete="off" placeholder="Input Tanggal Dijual">

                                        @error('dijual')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="sisa" class="form-label"><b>Sisa</b></label>

                                        <input type="number" step="0.1" min="0" name="sisa" id="sisa" class="form-control @error('sisa') is-invalid @enderror" required value="{{ $item->sisa }}" autocomplete="off" placeholder="Input Sisa Tanah">

                                        @error('sisa')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label"><b>Keterangan</b></label>

                                        <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ $item->keterangan }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('keterangan')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="batas_utara" class="form-label"><b>Batas Utara</b></label>

                                        <input type="text" name="batas_utara" id="batas_utara" class="form-control @error('batas_utara') is-invalid @enderror" required value="{{ $item->batas_utara }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('batas_utara')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="batas_timur" class="form-label"><b>Batas TImur</b></label>

                                        <input type="text" name="batas_timur" id="batas_timur" class="form-control @error('batas_timur') is-invalid @enderror" required value="{{ $item->batas_timur }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('batas_timur')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="batas_selatan" class="form-label"><b>Batas Selatan</b></label>

                                        <input type="text" name="batas_selatan" id="batas_selatan" class="form-control @error('batas_selatan') is-invalid @enderror" required value="{{ $item->batas_selatan }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('batas_selatan')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="batas_barat" class="form-label"><b>Batas Barat</b></label>

                                        <input type="text" name="batas_barat" id="batas_barat" class="form-control @error('batas_barat') is-invalid @enderror" required value="{{ $item->batas_barat }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('batas_barat')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </table>
            <div class="d-flex justify-content-between mb-3">
                {{ $cDesa->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection