<hr class="my-2" />
<li class="menu-item {{ request()->routeIs('administrator.index') ? 'active' : '' }}">
    <a href="{{ route('administrator.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('administrator.merk.index') ? 'active' : '' }}">
    <a href="{{ route('administrator.merk.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-package"></i>
        <div data-i18n="Basic">Merk</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('administrator.barang.index') ? 'active' : '' }}">
    <a href="{{ route('administrator.barang.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-package"></i>
        <div data-i18n="Tables">Barang</div>
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

