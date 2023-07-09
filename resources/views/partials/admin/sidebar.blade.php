<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <!--side bar data pembeli-->
        
        <li class="sidebar-item {{ request()->routeIs('admin.dataPengajuanGaransi.index') ? 'active' : '' }}">
            <a href="{{ route('admin.dataPengajuanGaransi.index') }}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Data Pengajuan Garansi</span>
            </a>
        </li>
        
        <li class="sidebar-item {{ request()->routeIs('admin.dataRiwayatTindakan.index') ? 'active' : '' }}">
            <a href="{{ route('admin.dataRiwayatTindakan.index') }}" class='sidebar-link'>
                <i class="bi bi-bar-chart-line-fill"></i>
                <span>Data Riwayat Tindakan</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="#" onclick="document.getElementById('logout').click();" class="sidebar-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
                <form action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="submit" id="logout">
            </a>
        </li>        
    </ul>
</div>