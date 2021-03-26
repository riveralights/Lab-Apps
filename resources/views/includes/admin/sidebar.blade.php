<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Lab Apps</li>

            <li class="sidebar-item{{ Request::is('admin') ? ' active' : '' }} ">
                <a href="{{ route('dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @role('teknisi')
            <li class="sidebar-title">Master Data</li>
            
            <li class="sidebar-item{{ Request::is('admin/category*') ? ' active' : '' }} ">
                <a href="{{ route('category.index') }}" class='sidebar-link'>
                    <i class="bi bi-front"></i>
                    <span>Kategori Aset</span>
                </a>
            </li>

            <li class="sidebar-item{{ Request::is('admin/laboratory*') ? ' active' : '' }} ">
                <a href="{{ route('laboratory.index') }}" class='sidebar-link'>
                    <i class="bi bi-easel-fill"></i>
                    <span>Ruangan Lab</span>
                </a>
            </li>
            @endrole

            <li class="sidebar-title">Menu Lab Apps</li>

            @if(auth()->user()->can('lihat berita'))
            <li class="sidebar-item{{ Request::is('admin/report*') ? ' active' : '' }} ">
                <a href="{{ route('report.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                    <span>Berita Acara</span>
                </a>
            </li>
            @endif

            @hasanyrole('kajur|teknisi')
            <li class="sidebar-item{{ Request::is('admin/inventory*') ? ' active' : '' }} ">
                <a href="{{ route('inventory.index') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-check-fill"></i>
                    <span>Laporan Aset</span>
                </a>
            </li>
            @endhasanyrole

            <li class="sidebar-title">Personalisasi</li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Pengaturan Akun</span>
                </a>
                <ul class="submenu ">
                    @role('kajur')
                    <li class="submenu-item">
                        <a href="{{ route('setting.index') }}">
                            Hak Akses
                        </a>
                    </li>
                    @endrole
                    <li class="submenu-item">
                        <a href="">
                            Pengaturan User
                        </a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>