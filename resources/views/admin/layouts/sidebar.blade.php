<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->is('admin') ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.masterStaff', 'admin.masterGarasi', 'admin.masterPelanggan') ? 'active' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('admin.masterStaff', 'admin.masterGarasi','admin.masterPelangga   n') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.masterStaff') }}" class="{{ request()->routeIs('admin.masterStaff') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Staff</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.masterPelanggan') }}" class="{{ request()->routeIs('admin.masterPelanggan') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Pelanggan</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.masterGarasi') }}" class="{{ request()->routeIs('admin.masterGarasi') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>List Garasi</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->  

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.transaksi', 'admin.riwayatTransaksi') ? 'active' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse {{ request()->routeIs('admin.transaksi', 'admin.riwayatTransaksi') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.transaksi') }}" class="{{ request()->routeIs('admin.transaksi') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Transaksi</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.riwayatTransaksi') }}" class="{{ request()->routeIs('admin.riwayatTransaksi') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Riwayat Transaksi</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
  </ul>
</aside><!-- End Sidebar-->
