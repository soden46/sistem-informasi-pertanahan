@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
    <div class="col-md-3 mb-5">
        <h3><a href="" class="text-black">DASHBOARD</a></h3>
    </div>
    <div class="row">
        @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('loginSuccess') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <style>
            .mainMenu:hover {
                background-color: gainsboro
            }
        </style>
        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu" style="width: 16rem; padding: 12px;  border-left: 5px solid green">
                <a href="data-persil" style="text-decoration: none; color: black">
                    <div class="d-flex">
                        <div style="width: 12rem">
                            <h6 style="color: green">Data Persil</h6>
                            <h4> Persil</h4>
                        </div>
                        <div style="width: 4rem; ">
                            <h1><span style="color: black; vertical-align: middle" class="mainIcon bi bi-folder2"></span></h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%">View Details</div>
                </a>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu" style="width: 16rem; padding: 12px;  border-left: 5px solid red">
                <a href="data-c-tanah" style="text-decoration: none; color: black">
                    <div class="d-flex">
                        <div style="width: 12rem">
                            <h6 style="color: red">Data C Desa</h6>
                            <h4>Data C Desa</h4>
                        </div>
                        <div style="width: 4rem; ">
                            <h1><span style="color: black; vertical-align: middle" class="mainIcon bi bi-folder2"></span></h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%">View Details</div>
                </a>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu" style="width: 16rem; padding: 12px;  border-left: 5px solid green">
                <a href="data-pemilik-tanah" style="text-decoration: none; color: black">
                    <div class="d-flex">
                        <div style="width: 12rem">
                            <h6 style="color: green">Data Pemilik Tanah</h6>
                            <h4>Pemilik</h4>
                        </div>
                        <div style="width: 4rem; ">
                            <h1><span style="color: black; vertical-align: middle" class="mainIcon bi bi-folder2"></span></h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%">View Details</div>
                </a>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu" style="width: 16rem; padding: 12px;  border-left: 5px solid #1746a2">
                <a href="permohonan-informasi" style="text-decoration: none; color: black">
                    <div class="d-flex">
                        <div style="width: 12rem">
                            <h6 style="color: #1746a2">Permohonan Informasi</h6>
                            <h4> Permohonan</h4>
                        </div>
                        <div style="width: 4rem; ">
                            <h1><span style="color: black; vertical-align: middle" class="bi bi-file-earmark-text"></span></h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%">View Details</div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection