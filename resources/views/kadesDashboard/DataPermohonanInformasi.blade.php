@extends('../layout/mainKades')

@section('kadesContent')
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

        @if (session()->has('successDeletedMasyarakat'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedMasyarakat') }}</strong>
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
                <form action="/permohonan-informasi" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>

            <!-- Modal delete all-->
            <div class="modal fade" id="deleteAllData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAllDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteAllDataLabel">Hapus Seluruh Data Bayi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <p><b>Apakah anda yakin untuk menghapus seluruh data bayi? pastikan anda telah meng-export data untuk menanggulangi kesalahan</b></p>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            <a href="deleteAllMasyarakat"><button type="submit" class="btn btn-primary">Delete</button></a>
                        </div>
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
                        <a href="{{route('kades/permohonan-informasi/pdf',$item->id_pemohon) }}" class="btn btn-success" target="_blank">PDF</a>
                    </td>
                </tr>

                <!-- Modal verifikasi-->
                <div class="modal fade" id="verifikasibayi{{ $item->id_pemohon}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Data Kelahiran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk memverifikasi data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('permohonan-informasi/verif', $item->id_pemohon) }}" method="post">
                                    @csrf
                                    <input type="text" id="verifikasi" name="verifikasi" value="Sudah Verifikasi" hidden>
                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal batal verifikasi-->
                <div class="modal fade" id="batalverifikasi{{ $item->id_pemohon}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Data Kelahiran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk membatalkan verifikasi data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('permohonan-informasi/verif', $item->id_pemohon) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <input type="text" name="verifikasi" value="Belum Verifikasi" value="Belum Verifikasi" hidden>
                                    <button type="submit" class="btn btn-danger">Batalkan Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editbayi{{ $item->id_pemohon }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Edit Data Penduduk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('permohonan-informasi',$item->id_pemohon)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="tgl_regis_mati" class="form-label"><b>TGL Regis Kematian</b></label>

                                        <input type="date" name="tgl_regis_mati" id="tgl_regis_mati" class="form-control @error('tgl_regis_mati') is-invalid @enderror" required value="{{ old('tgl_regis_mati') }}" autocomplete="off" placeholder="Input Tanggal Regis Lahir">

                                        @error('tgl_regis_mati')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_kk" class="form-label"><b>NO KK</b></label>

                                        <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ old('no_kk') }}" autocomplete="off" placeholder="Input NO KK">

                                        @error('no_kk')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_kepala_keluarga" class="form-label"><b>Nama Kepala Keluarga</b></label>

                                        <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" required value="{{ old('nama_kepala_keluarga') }}" autocomplete="off" placeholder="Input Nama Kepala Keluarga">

                                        @error('nama_kepala_keluarga')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label"><b>Nik Mati</b></label>

                                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" required value="{{ old('nik') }}" autocomplete="off" placeholder="Input NIK Mati">

                                        @error('nik')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label for="anak_ke" class="form-label"><b>Anak Ke</b></label>

                                            <input type="text" name="anak_ke" id="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" required value="{{ old('anak_ke') }}" autocomplete="off" placeholder="Input Anak Ke">

                                            @error('anak_ke')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tgl_mati" class="form-label"><b>Tanggal Mati</b></label>

                                            <input type="date" name="tgl_mati" id="tgl_mati" class="form-control @error('tgl_mati') is-invalid @enderror" required value="{{ old('tgl_mati') }}" autocomplete="off" placeholder="Input Tanggal Mati">

                                            @error('tgl_mati')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="pukul_mati" class="form-label"><b>Jam Kematian</b></label>

                                            <input type="time" name="pukul_mati" id="pukul_mati" class="form-control @error('pukul_mati') is-invalid @enderror" required value="{{ old('pukul_mati') }}" autocomplete="off" placeholder="Input Jam Kematian">

                                            @error('pukul_mati')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="mb-3">
                                            <label for="sebab" class="form-label"><b>Sebab Kematian</b></label>

                                            <select class="form-select" name="sebab" id="sebab">
                                                <option name="sebab" id="sebab" value="" selected>Silakan Pilih Sebab Kematian</option>
                                                <option name="sebab" id="sebab" value="kecelakaan">Kecelakaan</option>
                                                <option name="sebab" id="sebab" value="Sakit">Sakit</option>
                                                <option name="sebab" id="sebab" value="Lain-Lain">Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tempat_mati" class="form-label"><b>Tempat Kematian</b></label>

                                            <select class="form-select" name="tempat_mati" id="tempat_mati">
                                                <option name="tempat_mati" id="tempat_mati" value="" selected>Silakan Pilih Tempat Kematian</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Rumah">Rumah</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Jalan">Jalan</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Rumah Sakit">Rumah Sakit</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Lain-Lain">Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label"><b>Alamat </b></label>

                                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat') }}" autocomplete="off" placeholder="Input Alamat">

                                            @error('alamat')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="yang_menerangkan" class="form-label"><b>Yang Menerangkan</b></label>

                                            <select class="form-select" name="yang_menerangkan" id="yang_menerangkan">
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="" selected>Silakan Pilih Yang Menerangkan</option>
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="Keluarga">Keluarga</option>
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="Teman">Teman</option>
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="Tetangga">Tetangga</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ibu" class="form-label"><b>NIK Ibu</b></label>

                                        <input type="text" name="nik_ibu" id="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" required value="{{ old('nik_ibu') }}" autocomplete="off" placeholder="Input NIK Ibu">

                                        @error('nik_ibu')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ayah" class="form-label"><b>NIK Ayah</b></label>

                                        <input type="text" name="nik_ayah" id="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" required value="{{ old('nik_ayah') }}" autocomplete="off" placeholder="Input NIK Ayah">

                                        @error('nik_ayah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                        <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control @error('nik_pelapor') is-invalid @enderror" required value="{{ old('nik_pelapor') }}" autocomplete="off" placeholder="Input NIK Pelapor">

                                        @error('nik_pelapor')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksisatu" class="form-label"><b>NIK Saksi Satu</b></label>

                                        <input type="text" name="nik_saksisatu" id="nik_saksisatu" class="form-control @error('nik_saksisatu') is-invalid @enderror" required value="{{ old('nik_saksisatu') }}" autocomplete="off" placeholder="Input NIK Ayah">

                                        @error('nik_saksisatu')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksidua" class="form-label"><b>NIK Saksi Dua</b></label>

                                        <input type="text" name="nik_saksidua" id="nik_saksidua" class="form-control @error('nik_saksidua') is-invalid @enderror" required value="{{ old('nik_saksidua') }}" autocomplete="off" placeholder="Input NIK Ayah">

                                        @error('nik_saksidua')
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