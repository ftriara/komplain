<hr class="my-2" />
<li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
    <a href="{{ route('admin.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('admin.dataPengajuanGaransi.index') ? 'active' : '' }}">
    <a href="{{ route('admin.dataPengajuanGaransi.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Basic">Data Pengajuan Garansi</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('admin.dataRiwayatTindakan.index') ? 'active' : '' }}">
    <a href="{{ route('admin.dataRiwayatTindakan.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-archive"></i>
        <div data-i18n="Tables">Data Riwayat Tindakan</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('admin.petugas.petugas') ? 'active' : '' }}">
    <a href="{{ route('admin.petugas.petugas') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Tables">Data Petugas</div>
    </a>
</li>
<li class="menu-item">
        <a href="#" onclick="document.getElementById('logout').click();" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-log-out"></i>
        <div data-i18n="Support">Log out</div>
    <form action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        <input type="submit" id="logout">
    </form>
</li>

