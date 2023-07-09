<hr class="my-2" />
<li class="menu-item {{ request()->routeIs('manager.index') ? 'active' : '' }}">
    <a href="{{ route('manager.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('manager.ComplainByBarang.index') ? 'active' : '' }}">
    <a href="{{ route('manager.ComplainByBarang.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-paper-plane"></i>
        <div data-i18n="Basic">Complain By Barang</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('manager.ComplainByMerk.index') ? 'active' : '' }}">
    <a href="{{ route('manager.ComplainByMerk.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-comment-check"></i>
        <div data-i18n="Tables">Complain By Merk</div>
    </a>
</li>
<li class="menu-item {{ request()->routeIs('manager.ComplainByMonth.index') ? 'active' : '' }}">
    <a href="{{ route('manager.ComplainByMonth.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-comment-check"></i>
        <div data-i18n="Tables">Complain By Month</div>
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

