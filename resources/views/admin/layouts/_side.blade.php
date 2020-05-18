<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{asset('/adminres/img/logo/logo.png')}}" alt="" /></a>
            <strong><a href="index.html"><img src="{{asset('/adminres/img/logo/logosn.png')}}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a title="Landing Page" class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Dashboard</span></a>
                    </li>
                    <li>
                        <a title="Landing Page" class="{{ Request::is('dashboard/pendaftar') ? 'active' : '' }}" href="/dashboard/pendaftar" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Pendaftar</span></a>
                    </li>
                    <li>
                        <a class="has-arrow" href="#">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Setting</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Tahun" class="{{ Request::is('dashboard/tahun') ? 'active' : '' }}" href="/dashboard/tahun"><span class="mini-sub-pro">Tahun</span></a></li>
                            <li><a title="Tentang" class="{{ Request::is('dashboard/tentang') ? 'active' : '' }}" href="/dashboard/tentang"><span class="mini-sub-pro">Tentang</span></a></li>
                            <li><a title="Kegiatan" class="{{ Request::is('dashboard/kegiatan') ? 'active' : '' }}" href="/dashboard/kegiatan"><span class="mini-sub-pro">Kegiatan</span></a></li>
                            <li><a title="Alur" class="{{ Request::is('dashboard/alur') ? 'active' : '' }}" href="/dashboard/alur"><span class="mini-sub-pro">Alur</span></a></li>
                            <li><a title="Kesan" class="{{ Request::is('dashboard/kesan') ? 'active' : '' }}" href="/dashboard/kesan"><span class="mini-sub-pro">Kesan</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->