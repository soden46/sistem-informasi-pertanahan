@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedPermohonan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedPermohonan') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedPermohonan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedPermohonan') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedPemohon'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedPemohon') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div>
            <div class="d-flex">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Data Permohonan Informasi</button>
                <form action="/permohonan-informasi" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Permohonan Informasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/permohonan-informasi/save" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="modal-body">

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
                                    <label for="id_c_desa" class="form-label"><b>ID C Desa</b></label>

                                    <input type="text" name="id_c_desa" id="id_c_desa" class="form-control @error('id_c_desa') is-invalid @enderror" required value="{{ old('id_c_desa') }}" autocomplete="off" placeholder="Input ID C Desa">

                                    @error('id_c_desa')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama_pemohon" class="form-label"><b>Nama Pemohon</b></label>

                                    <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control @error('nama_pemohon') is-invalid @enderror" required value="{{ old('nama_pemohon') }}" autocomplete="off" placeholder="Input Nama Pemohon">

                                    @error('nama_pemohon')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tgl_pemohon" class="form-label"><b>Tanggal Permohonan</b></label>

                                    <input type="date" name="tgl_pemohon" id="tgl_pemohon" class="form-control @error('tgl_pemohon') is-invalid @enderror" required value="{{ old('tgl_pemohon') }}" autocomplete="off" placeholder="Input Tanggal Permohonan">

                                    @error('tgl_pemohon')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-4">
                                        <label for="no_ktp" class="form-label"><b>No KTP</b></label>

                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" required value="{{ old('no_ktp') }}" autocomplete="off" placeholder="Input No KTP Pemohon">

                                        @error('no_ktp')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="alamat" class="form-label"><b>Alamat</b></label>

                                        <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat') }}" autocomplete="off" placeholder="Input Alamat Pemohon">

                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label"><b>No Telpon</b></label>

                                    <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror" required value="{{ old('telepon') }}" autocomplete="off" placeholder="Input No Telpon Pemohon">

                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_permohonan" class="form-label"><b>Jenis Permohonan</b></label>

                                    <label><input type="checkbox" name="jenis_permohonan[]" value="Luas Tanah"> Luas Tanah</label>
                                    <label><input type="checkbox" name="jenis_permohonan[]" value="Nama Pemilik"> Nama Pemilik</label>
                                    <label><input type="checkbox" name="jenis_permohonan[]" value="history Tanah"> history Tanah</label>

                                    @error('jenis')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_tanah" class="form-label"><b>Jenis Tanah</b></label>

                                    <input type="text" name="jenis_tanah" id="jenis_tanah" class="form-control @error('jenis_tanah') is-invalid @enderror" required value="{{ old('jenis_tanah') }}" autocomplete="off" placeholder="Input Jenis Tanah">

                                    @error('jenis_tanah')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal export excel-->
            <div class="modal fade" id="exportExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exportExcelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exportExcelLabel">Export Seluruh Data Masyarakat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <p><b>Apakah anda yakin untuk meng-export seluruh data masyarakat? pastikan data telah benar untuk menanggulangi kesalahan</b></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            <a href="masyarakatImport"><button class="btn btn-primary">Export</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table" style="text-align: left; color: black">
                <tr>
                    <th>No</th>
                    <th>ID Pemohon</th>
                    <th>ID Persil</th>
                    <th>ID C Desa</th>
                    <th>Nama Pemohon</th>
                    <th>Tanggal</th>
                    <th>No KTP </th>
                    <th>Alamat </th>
                    <th>No Telp </th>
                    <th>Jenis</th>
                    <th>Informasi</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($permohonan as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $permohonan->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_pemohon }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_persil }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_c_desa }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama_pemohon }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_pemohon }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->no_ktp }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->alamat }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->no_telp }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->jenis }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->informasi }}</td>
                    <td style="text-align: center;  ">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPermohonan{{ $item->id_pemohon }}">Edit</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#hapusPermohonan{{ $item->id_pemohon }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="hapusPermohonan{{ $item->id_pemohon}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusPermohonanLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="hapusPermohonanLabel">Delete Data Persil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus data permohonan informasi dengan ID <b>{{ $item->id_pemohon }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('permohonan-informasi', $item->id_pemohon) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editPermohonan{{ $item->id_pemohon }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPermohonanLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editPermohonanLabel">Edit Data Permohonan Informasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('permohonan-informasi/update',$item->id_pemohon)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="id_pemohon" class="form-label"><b>ID Pemohon</b></label>

                                        <input type="text" name="id_pemohon" id="id_pemohon" class="form-control @error('id_pemohon') is-invalid @enderror" required value="{{ $item->id_pemohon }}" autocomplete="off" placeholder="Input ID Pemohon">

                                        @error('id_pemohon')
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
                                        <label for="id_c_desa" class="form-label"><b>ID C Desa</b></label>

                                        <input type="text" name="id_c_desa" id="id_c_desa" class="form-control @error('id_c_desa') is-invalid @enderror" required value="{{ $item->id_c_desa }}" autocomplete="off" placeholder="Input ID C Desa">

                                        @error('id_c_desa')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_pemohon" class="form-label"><b>Nama Pemohon</b></label>

                                        <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control @error('nama_pemohon') is-invalid @enderror" required value="{{ $item->nama_pemohon }}" autocomplete="off" placeholder="Input Nama Pemohon">

                                        @error('nama_pemohon')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_pemohon" class="form-label"><b>Tanggal Permohonan</b></label>

                                        <input type="date" name="tgl_pemohon" id="tgl_pemohon" class="form-control @error('tgl_pemohon') is-invalid @enderror" required value="{{ $item->tgl_pemohon }}" autocomplete="off" placeholder="Input Tanggal Permohonan">

                                        @error('tgl_pemohon')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label for="no_ktp" class="form-label"><b>No KTP</b></label>

                                            <input type="text" name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" required value="{{ $item->no_ktp }}" autocomplete="off" placeholder="Input No KTP Pemohon">

                                            @error('no_ktp')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="alamat" class="form-label"><b>Alamat</b></label>

                                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{ $item->alamat }}" autocomplete="off" placeholder="Input Alamat Pemohon">

                                            @error('alamat')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label"><b>No Telpon</b></label>

                                        <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror" required value="{{ $item->telepon }}" autocomplete="off" placeholder="Input No Telpon Pemohon">

                                        @error('telepon')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis" class="form-label"><b>Jenis Permohonan</b></label>

                                        <input type="text" name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror" required value="{{ $item->jenis }}" autocomplete="off" placeholder="Input Jenis Permohonan">

                                        @error('jenis')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="informasi" class="form-label"><b>Informasi Permohonan</b></label>

                                        <input type="text" name="informasi" id="informasi" class="form-control @error('informasi') is-invalid @enderror" required value="{{ $item->informasi }}" autocomplete="off" placeholder="Input Informasi Permohonan">

                                        @error('informasi')
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
                {{ $permohonan->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection