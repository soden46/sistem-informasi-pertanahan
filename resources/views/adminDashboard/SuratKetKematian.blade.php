@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedMasyarakat'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedMasyarakat') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedDataKematian'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedDataKematian') }}</strong>
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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Penduduk</button>
                <form action="/data-penduduk" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>

            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Surat Keterangan Beda Nama</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/surat-keterangan-kematian/save" method="POST" enctype="multipart/form-data">
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

                                    <select class="form-select" name="no_kk" id="no_kk">
                                        <option name="no_kk" id="no_kk" value="" selected>Silakan Pilih NO KK</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="no_kk" id="no_kk" value="{{$penduduk->no_kk}}">{{$penduduk->no_kk}}</option>
                                        @endforeach
                                    </select>
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
                                    <label for="nik_mati" class="form-label"><b>NIK Jenazah</b></label>

                                    <select class="form-select" name="nik_mati" id="nik_mati">
                                        <option name="nik_mati" id="nik_mati" value="" selected>Silakan Pilih NIK Jenazah</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_mati" id="nik_mati" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_mati" class="form-label"><b>Nama Jenazah</b></label>

                                    <select class="form-select" name="nama_mati" id="nama_mati">
                                        <option name="nama_mati" id="nama_mati" value="" selected>Silakan Pilih Nama Jenazah</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nama_mati" id="nama_mati" value="{{$penduduk->nama}}">{{$penduduk->nama}} | {{$penduduk->nik}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label"><b>Jenis Kelamin Jenazah</b></label>

                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                        <option name="jenis_kelamin" id="jenis_kelamin" value="" selected>Silakan Pilih Jenis Kelamin Jenazah</option>
                                        <option name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki">Laki-Laki</option>
                                        <option name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">Perempuan</option>
                                    </select>
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
                                        <label for="tgl_lahir" class="form-label"><b>Tanggal Lahir</b></label>

                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" required value="{{ old('tgl_lahir') }}" autocomplete="off" placeholder="Input Tanggal lahir">

                                        @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tempat_kelahiran" class="form-label"><b>Tempat Lahir</b></label>

                                        <input type="text" name="tempat_kelahiran" id="tempat_kelahiran" class="form-control @error('tempat_kelahiran') is-invalid @enderror" required value="{{ old('tempat_kelahiran') }}" autocomplete="off" placeholder="Input Tempat Lahir">

                                        @error('tempat_kelahiran')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama_mati" class="form-label"><b>Agama Jenazah</b></label>

                                    <select class="form-select" name="agama_mati" id="agama_mati">
                                        <option name="agama_mati" id="agama_mati" value="" selected>Silakan Pilih Agama Jenazah</option>
                                        <option name="agama_mati" id="agama_mati" value="Islam">Islam</option>
                                        <option name="agama_mati" id="agama_mati" value="Kristen">Kristen</option>
                                        <option name="agama_mati" id="agama_mati" value="Katolik">Katolik</option>
                                        <option name="agama_mati" id="agama_mati" value="Budha">Budha</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="pekerjaan_mati" class="form-label"><b>Pekerjaan Jenazah </b></label>

                                    <input type="text" name="pekerjaan_mati" id="pekerjaan_mati" class="form-control @error('pekerjaan_mati') is-invalid @enderror" required value="{{ old('pekerjaan_mati') }}" autocomplete="off" placeholder="Input Pekerjaan Jenazah">

                                    @error('pekerjaan_mati')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_mati" class="form-label"><b>Alamat Jenazah </b></label>

                                    <input type="text" name="alamat_mati" id="alamat_mati" class="form-control @error('alamat_mati') is-invalid @enderror" required value="{{ old('alamat_mati') }}" autocomplete="off" placeholder="Input Alamat Jenazah">

                                    @error('alamat_mati')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="tgl_mati" class="form-label"><b>Tanggal Kematian</b></label>

                                    <input type="date" name="tgl_mati" id="tgl_mati" class="form-control @error('tgl_mati') is-invalid @enderror" required value="{{ old('tgl_mati') }}" autocomplete="off" placeholder="Input Tanggal Mati">

                                    @error('tgl_mati')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pukul_mati" class="form-label"><b>Jam Kematian</b></label>

                                    <input type="time" name="pukul_mati" id="pukul_mati" class="form-control @error('pukul_mati') is-invalid @enderror" required value="{{ old('pukul_mati') }}" autocomplete="off" placeholder="Input Jam Kematian">

                                    @error('pukul_mati')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
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

                                    <select class="form-select" name="nik_ibu" id="nik_ibu">
                                        <option name="nik_ibu" id="nik_ibu" value="" selected>Silakan Pilih NIK Ibu</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_ibu" id="nik_ibu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik_ayah" class="form-label"><b>NIK Ayah</b></label>

                                    <select class="form-select" name="nik_ayah" id="nik_ayah">
                                        <option name="nik_ayah" id="nik_ayah" value="" selected>Silakan Pilih NIK Ayah</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_ayah" id="nik_ayah" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                    <select class="form-select" name="nik_pelapor" id="nik_pelapor">
                                        <option name="nik_pelapor" id="nik_pelapor" value="" selected>Silakan Pilih NIK Pelapor</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_pelapor" id="nik_pelapor" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik_saksisatu" class="form-label"><b>NIK Saksi Saty</b></label>

                                    <select class="form-select" name="nik_saksisatu" id="nik_saksisatu">
                                        <option name="nik_saksisatu" id="nik_saksisatu" value="" selected>Silakan Pilih NIK Saksi Satu</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_saksisatu" id="nik_saksisatu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik_saksidua" class="form-label"><b>NIK Saksi DUa</b></label>

                                    <select class="form-select" name="nik_saksidua" id="nik_saksidua">
                                        <option name="nik_saksidua" id="nik_saksidua" value="" selected>Silakan Pilih NIK Saksi Dua</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_saksidua" id="nik_saksidua" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
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
                    <th>TGL Regis</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Tempat Mati</th>
                    <th>TGL Kematian</th>
                    <th style="text-align: center">Verifikasi</th>
                    <th style="text-align: center">Cetak</th>
                </tr>
                @foreach ($mati as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $mati->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_regis_mati }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama_mati }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik_mati }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->jenis_kelamin }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->alamat_mati }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tempat_mati }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_mati }}</td>
                    <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Verifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasibayi{{ $item->nik_mati }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->nik_mati }}">Batal Verifikasi</button>
                        @endif
                    </td>
                    <td style="text-align: center;  ">
                        <a href="{{route('surat-keterangan-kematian/pdflurah',$item->nik_mati) }}" class="btn btn-success" target="_blank">Lurah</a>
                        <a href="{{route('surat-keterangan-kematian/pdf',$item->nik_mati) }}" class="btn btn-success" target="_blank">Staff</a>
                    </td>
                </tr>

                <!-- Modal verifikasi-->
                <div class="modal fade" id="verifikasibayi{{ $item->nik_mati}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Data Kematian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk memverifikasi data <b>{{ $item->nama_mati }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('surat-keterangan-kematian', $item->nik_mati) }}" method="post">
                                    @csrf
                                    <input type="text" id="verifikasi" name="verifikasi" value="Sudah Verifikasi" hidden>
                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal batal verifikasi-->
                <div class="modal fade" id="batalverifikasi{{ $item->nik_mati}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="{{route('surat-keterangan-kematian', $item->nik_mati) }}" method="post">
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
                <div class="modal fade" id="editbayi{{ $item->nik_mati }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Edit Data Penduduk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('surat-keterangan-kematian',$item->nik_mati)}}" method="post">
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
                                        <label for="nik_mati" class="form-label"><b>Nik Mati</b></label>

                                        <input type="text" name="nik_mati" id="nik_mati" class="form-control @error('nik_mati') is-invalid @enderror" required value="{{ old('nik_mati') }}" autocomplete="off" placeholder="Input NIK Mati">

                                        @error('nik_mati')
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

                                        <select class="form-select" name="nik_ibu" id="nik_ibu">
                                            <option name="nik_ibu" id="nik_ibu" value="" selected>Silakan Pilih NIK Ibu</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_ibu" id="nik_ibu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ayah" class="form-label"><b>NIK Ayah</b></label>

                                        <select class="form-select" name="nik_ayah" id="nik_ayah">
                                            <option name="nik_ayah" id="nik_ayah" value="" selected>Silakan Pilih NIK Ayah</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_ayah" id="nik_ayah" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_pelapor" class="form-label"><b>NIK</b></label>

                                        <select class="form-select" name="nik" id="nik">
                                            <option name="nik_pelapor" id="nik_pelapor" value="" selected>Silakan Pilih NIK Pelapor</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_pelapor" id="nik_pelapor" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksisatu" class="form-label"><b>NIK Saksi Satu</b></label>

                                        <select class="form-select" name="nik_saksisatu" id="nik_saksisatu">
                                            <option name="nik_saksisatu" id="nik_saksisatu" value="" selected>Silakan Pilih NIK Saksi Satu</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_saksisatu" id="nik_saksisatu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksidua" class="form-label"><b>NIK Saksi Dua</b></label>

                                        <select class="form-select" name="nik_saksidua" id="nik_saksidua">
                                            <option name="nik_saksidua" id="nik" value="" selected>Silakan Pilih NIK Saksi</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_saksidua" id="nik_saksidua" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
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
                {{ $mati->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection