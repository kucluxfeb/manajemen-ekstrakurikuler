@php
    $menuList = [
        [
            "title" => "Eskul",
            "path" => "/eskul",
            "icon" => "fas fa-fw fa-chart-area",
        ],
        [
            "title" => "Pendaftaran",
            "path" => "/admin/pendaftaran",
            "icon" => "fas fa-fw fa-chart-area",
        ],
        [
            "title" => "Absensi",
            "path" => "/admin/absensi",
            "icon" => "fas fa-fw fa-chart-area",
        ],
    ];
@endphp

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">Manajemen Ekstrakurikuler</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="/" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item -->
            @foreach ($menuList as $menu)
            <li class="nav-item {{ request()->is(ltrim($menu['path'], '/')) ? 'active' : '' }}">
                <a href="{{ $menu['path'] }}" class="nav-link">
                    <i class="{{ $menu['icon'] }}"></i>
                    <span>{{ $menu['title'] }}</span>
                </a>
            </li>
        @endforeach                

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>