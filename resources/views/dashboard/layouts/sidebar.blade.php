<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">Transaction PS.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          {{-- <a href="#" class="d-block">Nama Anda</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          
          <li class="nav-item {{ Request::is('dashboard/items*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/items*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/items" class="nav-link {{ Request::is('dashboard/items') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/items/create" class="nav-link {{ Request::is('dashboard/items/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Barang</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::is('dashboard/regions*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/regions*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/transactions" class="nav-link {{ Request::is('dashboard/transactions') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/transactions/create" class="nav-link {{ Request::is('dashboard/transactions/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- @can('admin') --}}
          <li class="nav-header">ADMINISTRATOR</li>
          <li class="nav-item {{ Request::is('dashboard/users*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Role User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/users" class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/users/create" class="nav-link {{ Request::is('dashboard/users/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endcan --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>