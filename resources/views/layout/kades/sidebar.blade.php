<style>
    ul>li>a:hover {
        color: blue !important;
    }
</style>
<!-- Sidebar Masyarakat/Warga -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="d-flex">
        <div class="d-flex justify-content-start px-2"><img src="{{asset('images/logo/sragen.webp')}}" id="foto" alt="Logo" height="75px" /></div>
        <div class="mt-3"><b>Desa Genengduwur</b>
            </br>
            <b>Kepala Desa</b>
        </div>
    </div>
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kades/data-persil*') ? 'active' : '' }}" href="/kades/data-persil">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Persil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kades/data-c-tanah*') ? 'active' : '' }}" href="/kades/data-c-tanah">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data C Desa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kades/data-pemilik-tanah*') ? 'active' : '' }}" href="/kades/data-pemilik-tanah">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Pemilik Tanah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kades/permohonan-informasi*') ? 'active' : '' }}" href="/kades/permohonan-informasi">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Permohonan Informasi
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-uppercase">
            <span style="text-align: center">LOGOUT</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="/logout"><span class="bi bi-box-arrow-right" style="margin-right: 8px"></span>Log Out</a>
            </li>
        </ul>
    </div>
</nav>