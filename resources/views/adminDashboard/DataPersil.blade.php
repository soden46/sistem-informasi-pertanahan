@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedPersil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedPersil') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedPersil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedPersil') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedPersil'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedPersil') }}</strong>
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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataPersil" style="margin-right: 15px">Tambah Persil</button>
                <form action="/data-persil" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataPersil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataPersilLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataPersilLabel">Tambah Persil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('data-persil/store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="id_persil" class="form-label"><b>ID Persil</b></label>

                                    <input type="text" name="id_persil" id="id_persil" class="form-control @error('id_persil') is-invalid @enderror" required value="{{ old('id_persil') }}" autocomplete="off" placeholder="Input ID Kades">

                                    @error('id_persil')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label"><b>Lokasi</b></label>

                                    <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" required value="{{ old('lokasi') }}" autocomplete="off" placeholder="Input Lokasi">

                                    @error('lokasi')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="luas_persil" class="form-label"><b>Luas Persil</b></label>

                                    <input type="number" step="0.1" min="0" name="luas_persil" id="luas_persil" class="form-control @error('luas_persil') is-invalid @enderror" required value="{{ old('luas_persil') }}" autocomplete="off" placeholder="Input Luas Persil">

                                    @error('luas_persil')
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
        </div>

        <div class="table-responsive">
            <table class="table" style="text-align: left; color: black">
                <tr>
                    <th>No</th>
                    <th>ID Persil</th>
                    <th>Lokasi</th>
                    <th>Luas Persil</th>
                    <th style="text-align: center">Action</th>
                </tr>
                @foreach ($persil as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $persil->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->id_persil }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->lokasi }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->luas_persil }}</td>
                    <!-- <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Diverifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasiPersil{{ $item->id_persil }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->id_persil }}">Batal Verifikasi</button>
                        @endif
                    </td> -->
                    <td style="text-align: center;  ">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPersil{{ $item->id_persil }}">Edit</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#hapusPersil{{ $item->id_persil }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="hapusPersil{{ $item->id_persil}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusPersilLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="hapusPersilLabel">Delete Data Persil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus data persil dengan ID <b>{{ $item->id_persil }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-persil', $item->id_persil) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editPersil{{ $item->id_persil }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPersilLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editPersilLabel">Edit Data Persil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('data-persil/update',$item->id_persil)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="id_persil" class="form-label"><b>ID Persil</b></label>

                                        <input type="text" name="id_persil" id="id_persil" class="form-control @error('id_persil') is-invalid @enderror" required value="{{ old('id_persil') }}" autocomplete="off" placeholder="Input ID Kades">

                                        @error('id_persil')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label"><b>Lokasi</b></label>

                                        <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" required value="{{ old('lokasi') }}" autocomplete="off" placeholder="Input Lokasi">

                                        @error('lokasi')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="luas_persil" class="form-label"><b>Luas Persil</b></label>

                                        <input type="number" step="0.1" min="0" name="luas_persil" id="luas_persil" class="form-control @error('luas_persil') is-invalid @enderror" required value="{{ old('luas_persil') }}" autocomplete="off" placeholder="Input Luas Persil">

                                        @error('luas_persil')
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
                {{ $persil->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection