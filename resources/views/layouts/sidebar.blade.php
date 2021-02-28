
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html">Lelangin admin</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ request()->is('/') ? 'active' : '' }} ">
                    <a href="{{ url('/') }}" class='sidebar-link'>
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Petugas</li>

                <li class="sidebar-item {{ (request()->segment(1) == 'officer') ? 'active' : '' }} ">
                    <a href="{{ url('/officer') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Data petugas</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->is('userAccess')) ? 'active' : '' }}">
                    <a href="{{ url('/userAccess') }}" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Kelola hak akses</span>
                    </a>
                </li>

                <li class="sidebar-title">Lelang</li>


                <li class="sidebar-item {{ (request()->segment(1) === 'bidProduct') ? 'active' : '' }}">
                    <a href="{{ url('bidProduct') }}" class='sidebar-link'>
                        <i class="bi bi-inboxes-fill"></i>
                        <span>Lelang barang</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) === 'product') ? 'active' : '' }}">
                    <a href="{{ url('product') }}" class='sidebar-link'>
                        <i class="bi bi-inboxes-fill"></i>
                        <span>Data barang</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) === 'bidding') ? 'active' : '' }}">
                    <a href="{{ url('bidding') }}" class='sidebar-link'>
                        <i class="bi bi-ui-checks"></i>
                        <span>Data penawaran</span>
                    </a>
                </li>
                <li class="sidebar-item {{ (request()->segment(1) === 'history') ? 'active' : '' }}">
                    <a href="{{ url('history') }}" class='sidebar-link'>
                        <i class="bi bi-hourglass-bottom"></i>
                        <span>History penjualan</span>
                    </a>
                </li>


                <li class="sidebar-title">User</li>


                <li class="sidebar-item {{ (request()->is('user')) ? 'active' : '' }}">
                    <a href="{{ url('user') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Data user</span>
                    </a>
                </li>
                <hr class="divider mt-2">
                <li class="sidebar-item">
                    <a href="ui-file-uploader.html" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
