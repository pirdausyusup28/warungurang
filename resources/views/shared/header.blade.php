<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
       <span class="sidebar-brand" href="index.html">
       <span class="align-middle">Warung Urang</span>
       </span>
       <ul class="sidebar-nav">
         <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('dashboard') }}">
               <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Dashboard</span>
            </a>
         </li>
         <li class="sidebar-header">
            MENU ADMIN
        </li>
         <li class="sidebar-item {{ request()->routeIs('profil-warung') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('profil-warung') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Profil Warung</span>
            </a>
        </li>
         <li class="sidebar-item {{ request()->routeIs('karyawan') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('karyawan') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Karyawan</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('supplier') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('supplier') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Supplier</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('barang') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('barang') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Barang</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('stock') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('stock') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Gudang dan Rak</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('stock') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('stock') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Stock</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('stock') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('stock') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Laporan Penjualan</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->routeIs('stock') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('stock') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Laporan Stock</span>
            </a>
        </li>
        <li class="sidebar-header">
            POINT OF SALES
        </li>
        <li class="sidebar-item {{ request()->routeIs('kasir') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('kasir') }}">
                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Kasir</span>
            </a>
        </li>
        
       </ul>
       <div class="sidebar-cta">
          <div class="sidebar-cta-content">
             <strong class="d-inline-block mb-2">{{ Auth::user()->name }}</strong>
             <div class="mb-3 text-sm">
                Administrator
             </div>
             <div class="d-grid">
                @auth
                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
             </div>
          </div>
       </div>
    </div>
 </nav>
 <div class="main">
 <nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
       <ul class="navbar-nav navbar-align">
         <li class="nav-item dropdown p-2">
            {{-- <span class="badge bg-info text-dark">{{ Auth::user()->name }}</span> --}}
         </li>
         <li class="nav-item dropdown p-2">
            {{-- <span class="badge rounded-pill bg-success">Administrator</span> --}}
         </li>
          <li class="nav-item dropdown">
          </li>
       </ul>
    </div>
 </nav>
 