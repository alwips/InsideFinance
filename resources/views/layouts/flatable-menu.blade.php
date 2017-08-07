    <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-header">
            <img class="img-40" src="{{ asset('assets/images/user.png') }}" alt="User-Profile-Image">
            <div class="user-details">
                <span>{{ Auth::user()->name }}</span>
                <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
            </div>


        </div>
        <div class="main-menu-content">
            <ul class="main-navigation">
                <li class="more-details">
                    <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="ti-layout-sidebar-left"></i>Logout
                    </a>
                </li>
                <li class="nav-item single-item">
                    <a href="{{ url('') }}">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-title">
                    <i class="ti-line-dashed"></i>
                    <span>Kegiatan</span>
                </li>
                <li class="nav-item single-item">
                    <a href="{{ url('kegiatan') }}">
                        <i class="ti-gift"></i>
                        <span>Kegiatan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-receipt"></i>
                        <span>Alokasi Dana</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('rab') }}"> Daftar RAB</a></li>
                        <li><a href="{{ url('rab/create') }}"> Tambah RAB</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-briefcase"></i>
                        <span>Koordinasi</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('bpd') }}"> Daftar BPD</a></li>
                        <li><a href="{{ url('bpd/create') }}"> Tambah BPD</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-shopping-cart"></i>
                        <span>Realisasi</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('operasional') }}"> Daftar Operasional</a></li>
                        <li><a href="{{ url('operasional/create') }}"> Tambah Operasional</a></li>
                    </ul>
                </li>
                <li class="nav-title">
                    <i class="ti-line-dashed"></i>
                    <span>Operasional</span>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-ticket"></i>
                        <span>Operasional</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('realisasi') }}"> Daftar Realisasi</a></li>
                        <li><a href="{{ url('realisasi/create') }}"> Tambah Realisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-shopping-cart-full"></i>
                        <span>Realisasi</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('operasional') }}"> Daftar Operasional</a></li>
                        <li><a href="{{ url('operasional/create') }}"> Tambah Operasional</a></li>
                    </ul>
                </li>
                <li class="nav-title">
                    <i class="ti-line-dashed"></i>
                    <span>Laporan</span>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-bar-chart"></i>
                        <span>Kegiatan</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('realisasi') }}"> Daftar Realisasi</a></li>
                        <li><a href="{{ url('realisasi/create') }}"> Tambah Realisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-stats-up"></i>
                        <span>Operasional</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('operasional') }}"> Daftar Operasional</a></li>
                        <li><a href="{{ url('operasional/create') }}"> Tambah Operasional</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-pulse"></i>
                        <span>Kegiatan & Operasional</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('operasional') }}"> Daftar Operasional</a></li>
                        <li><a href="{{ url('operasional/create') }}"> Tambah Operasional</a></li>
                    </ul>
                </li>
                <li class="nav-title" data-i18n="nav.category.ui-element">
                    <i class="ti-line-dashed"></i>
                    <span>Master Data</span>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-user"></i>
                        <span>User</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('user') }}"> Daftar User</a></li>
                        <li><a href="{{ url('user/create') }}"> Tambah User</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-wallet"></i>
                        <span>COA</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('coa') }}"> Daftar COA</a></li>
                        <li><a href="{{ url('coa/create') }}"> Tambah COA</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-layers-alt"></i>
                        <span>Item</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('item') }}"> Daftar Item</a></li>
                        <li><a href="{{ url('item/create') }}"> Tambah Item</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-ruler-alt-2"></i>
                        <span>Satuan</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{ url('satuan') }}"> Daftar Satuan</a></li>
                        <li><a href="{{ url('satuan/create') }}"> Tambah Satuan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Menu aside end -->