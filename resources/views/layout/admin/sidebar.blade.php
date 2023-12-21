<style>
    ul>li>a:hover {
        color: blue !important;
    }
</style>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="d-flex">
        <div class="d-flex justify-content-start px-2"><img src="{{asset('images/logo/sragen.webp')}}" id="foto" alt="Logo" height="75px" /></div>
        <div class="mt-3"><b>Desa Genengduwur</b></div>
    </div>
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span class="align-text-bottom bi bi-speedometer2"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-penduduk*') || Request::is('detail-tanah') ? 'active' : '' }}" href="/data-tanah">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Tanah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-persil') ? 'active' : '' }}" href="/data-persil">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Persil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-c-tanah*') ? 'active' : '' }}" href="/data-c-tanah">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data C Desa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-pemilik-tanah*') ? 'active' : '' }}" href="/data-pemilik-tanah">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Pemilik Tanah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('permohonan-informasi*') ? 'active' : '' }}" href="/permohonan-informasi">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Permohonan Informasi
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-uppercase">
                <span style="text-align: center">Administrator</span>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('myAcount*') ? 'active' : '' }}" href="/myAcount">
                        <span class="align-text-bottom bi bi-person-badge"></span>
                        My Account
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('other-account*') ? 'active' : '' }}" href="/other-account">
                        <span class="align-text-bottom bi bi-person-plus"></span>
                        Other Accounts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout"><span class="bi bi-box-arrow-right" style="margin-right: 8px"></span>Log Out</a>
                </li>
            </ul>
    </div>
</nav>