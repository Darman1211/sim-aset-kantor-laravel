<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse mt-3">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column list-unstyled ps-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            @can('admin')
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 off">
                <span>Master Data</span>
            </h5>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('assets*') ? 'active' : '' }}" href="/assets">
                        <span data-feather="hard-drive" class="align-text-bottom"></span>
                        Data Aset
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">
                        <span data-feather="grid" class="align-text-bottom"></span>
                        Kategori Aset
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rooms*') ? 'active' : '' }}" href="/rooms">
                        <span data-feather="layers" class="align-text-bottom"></span>
                        Ruangan Aset
                    </a>
                </li>
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 off">
                <span>Monitoring Aset</span>
            </h5>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('maintenances*') ? 'active' : '' }}" href="/maintenances">
                        <span data-feather="sliders" class="align-text-bottom"></span>
                        Maintenance
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('damagedassets*') ? 'active' : '' }}" href="/damagedassets">
                        <span data-feather="alert-triangle" class="align-text-bottom"></span>
                        Aset Rusak
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('borrowassets*') ? 'active' : '' }}" href="/borrowassets">
                        <span data-feather="share-2" class="align-text-bottom"></span>
                        Peminjaman Aset
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('reminder*') ? 'active' : '' }}" href="/reminder">
                        <span data-feather="info" class="align-text-bottom"></span>
                        Buat Pengingat
                    </a>
                </li>
            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 off">
                <span>Report</span>
            </h5>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('reportaset*') ? 'active' : '' }}" href="/reportaset">
                        <span data-feather="hard-drive" class="align-text-bottom"></span>
                        Data Aset
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('reportmaintenance*') ? 'active' : '' }}" href="/reportmaintenance">
                        <span data-feather="sliders" class="align-text-bottom"></span>
                        Data Maintenance
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('reportqr*') ? 'active' : '' }}" href="/reportqr">
                        <span data-feather="code" class="align-text-bottom"></span>
                        Label QR Code
                    </a>
                </li>
            @endcan
        </ul>
    </div>
    <div class="d-flex flex-column flex-shrink-0 p-3">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>{{ auth()->user()->username }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout <span data-feather="log-out" class="align-text-bottom"></span></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
