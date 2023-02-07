<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light d-block text-center">SPK Karyawan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> --}}
            <span class="text-white my-auto">Hai, <b class="text-capitalize">{{ auth()->user()->name }}</b></span>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Route::is('karyawan.index') | Route::is('posisi.index') | Route::is('indikator.index') | Route::is('bobot.index') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('karyawan.index') | Route::is('posisi.index') | Route::is('indikator.index') | Route::is('bobot.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('karyawan.index') }}"
                                class="nav-link {{ Route::is('karyawan.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Karyawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posisi.index') }}"
                                class="nav-link {{ Route::is('posisi.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Posisi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('indikator.index') }}"
                                class="nav-link {{ Route::is('indikator.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-infinity"></i>
                                <p>
                                    Indikator
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bobot.index') }}"
                                class="nav-link {{ Route::is('bobot.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>
                                    Bobot Kriteria
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('disiplin.index') | Route::is('kemampuan.index') | Route::is('objektivitas.index') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('disiplin.index') | Route::is('kemampuan.index') | Route::is('objektivitas.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Penilaian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('disiplin.index') }}"
                                class="nav-link {{ Route::is('disiplin.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-glasses"></i>
                                <p>
                                    Disiplin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kemampuan.index') }}"
                                class="nav-link {{ Route::is('kemampuan.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Kemampuan Umum
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('objektivitas.index') }}"
                                class="nav-link {{ Route::is('objektivitas.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p>
                                    Objektivitas Kerja
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('wp.index') | Route::is('smart.index') | Route::is('topsis.index') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('wp.index') | Route::is('smart.index') | Route::is('topsis.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-swatchbook"></i>
                        <p>
                            Hasil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('wp.index') }}"
                                class="nav-link {{ Route::is('wp.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-greater-than "></i>
                                <p>
                                    Metode WP
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('smart.index') }}"
                                class="nav-link {{ Route::is('smart.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-divide"></i>
                                <p>
                                    Metode SMART
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('topsis.index') }}"
                                class="nav-link {{ Route::is('topsis.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-equals"></i>
                                <p>
                                    Metode TOPSIS
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
