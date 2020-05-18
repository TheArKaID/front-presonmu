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
                    @php
                        if(Request::is('dashboard/setting/*')){
                            $liclass = "active";
                            $ariaexp = "true";
                            $ulclass = "show";
                        } else{
                            $liclass = "";
                            $ariaexp = "false";
                            $ulclass = "";
                        }
                    @endphp
                    <li class="{{ $liclass }}">
                        <a class="has-arrow" href="#" aria-expanded="{{ $ariaexp }}">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Setting</span>
                        </a>
                        <ul class="submenu-angle collapse {{ $ulclass }}" aria-expanded="true">
                            <li><a title="Tahun" class="{{ Request::is('dashboard/setting/tahun') ? 'active' : '' }}" href="/dashboard/setting/tahun"><span class="mini-sub-pro">Tahun</span></a></li>
                            <li><a title="Tentang" class="{{ Request::is('dashboard/setting/tentang') ? 'active' : '' }}" href="/dashboard/setting/tentang"><span class="mini-sub-pro">Tentang</span></a></li>
                            <li><a title="Kegiatan" class="{{ Request::is('dashboard/setting/kegiatan') ? 'active' : '' }}" href="/dashboard/setting/kegiatan"><span class="mini-sub-pro">Kegiatan</span></a></li>
                            <li><a title="Alur" class="{{ Request::is('dashboard/setting/alur') ? 'active' : '' }}" href="/dashboard/setting/alur"><span class="mini-sub-pro">Alur</span></a></li>
                            <li><a title="Kesan" class="{{ Request::is('dashboard/setting/kesan') ? 'active' : '' }}" href="/dashboard/setting/kesan"><span class="mini-sub-pro">Kesan</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->