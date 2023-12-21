@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedPemilikTanah'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedPemilikTanah') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedPemilikTanah'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedPemilikTanah') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedPemilikTanah'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedPemilikTanah') }}</strong>
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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataPemilikTanah" style="margin-right: 15px">Tambah Pemilik Tanah</button>
                <form action="/data-pemilik-tanah" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataPemilikTanah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataPemilikTanahLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataPemilikTanahLabel">Tambah Pemilik Tanah</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('data-pemilik-tanah/store')}}" method="post">
                            @csrf
                            <div class="modal-body">

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
                                    <label for="nama_pemilik" class="form-label"><b>Nama Pemilik</b></label>

                                    <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror" required value="{{ old('nama_pemilik') }}" autocomplete="off" placeholder="Input Nama Pemilik">

                                    @error('nama_pemilik')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_ktp" class="form-label"><b>No KTP</b></label>

                                    <input type="text" name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" required value="{{ old('no_ktp') }}" autocomplete="off" placeholder="Input No KTP">

                                    @error('no_ktp')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label"><b>Alamat</b></label>

                                    <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat') }}" autocomplete="off" placeholder="Input Alamat">

                                    @error('alamat')
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
                            <h1 class="modal-title fs-5" id="deleteAllDataLabel">Hapus Seluruh Data Pemilik Tanah</h1>
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
                    <th>ID Pemilik</th>
                    <th>Nama Pemilik</th>
                    <th>No KTP</th>
                    <th>Alamat</th>
                    <!-- <th>Verifikasi</th> -->
                    <th style="text-align: center">Action</th>
                </tr>
                @foreach ($PemilikTanah as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $PemilikTanah->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_pemilik }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama_pemilik }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->no_ktp }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->alamat }}</td>
                    <!-- <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Diverifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasibayi{{ $item->id_pemilik }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->id_pemilik }}">Batal Verifikasi</button>
                        @endif
                    </td> -->
                    <td style="text-align: center;  ">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPemilik{{ $item->id_pemilik }}">Edit</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#hapusverifikasi{{ $item->id_pemilik }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="staticBackdrop{{ $item->id_pemilik}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Data Pemilik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus data <b>{{ $item->nama_pemilik }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-pemilik-tanah', $item->id_pemilik) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editPemilik{{ $item->id_pemilik }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPemilikLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editPemilikLabel">Edit Data Pemilik Tanah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('data-pemilik-tanah',$item->id_pemilik)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="id_pemilik" class="form-label"><b>ID Pemilik</b></label>

                                        <input type="text" name="id_pemilik" id="id_pemilik" class="form-control @error('id_pemilik') is-invalid @enderror" required value="{{$item->id_pemilik, old('id_pemilik') }}" autocomplete="off">

                                        @error('id_pemilik')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_pemilik" class="form-label"><b>Nama Pemilik</b></label>

                                        <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror" required value="{{$item->nama_pemilik, old('nama_pemilik') }}" autocomplete="off">

                                        @error('nama_pemilik')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_ktp" class="form-label"><b>No KTP</b></label>

                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" required value="{{$item->no_ktp, old('no_ktp') }}" autocomplete="off">

                                        @error('no_ktp')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label"><b>Alamat</b></label>

                                        <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{$item->alamat, old('alamat') }}" autocomplete="off">

                                        @error('alamat')
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
                {{ $PemilikTanah->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection