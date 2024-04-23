<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="../../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> CORK </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <style>
            .menu-heading {
                height: auto !important;
            }

            .menu-heading .heading {
                padding-top: 20px !important;
            }

            .menu i {
                font-size: 20px;
                margin-right: 5px;
                vertical-align: middle;
                width: 20px;
                height: 20px;
            }

            .menu a:hover,
            .menu a:hover i,
            .menu a:hover svg,
            #sidebar ul.menu-categories li.menu ul.submenu>li.active a,
            #sidebar ul.menu-categories li.menu ul.submenu>li.active a:hover {
                color: #9f1521 !important;
            }

            .menu.active a:hover i,
            li .dropdown-toggle[aria-expanded=true] i {
                color: white !important;
            }

            .menu.active a,
            li .dropdown-toggle[aria-expanded=true],
            #sidebar ul.menu-categories li.menu ul.submenu>li.active a:before {
                background-color: #9f1521 !important;
            }

            #sidebar ul.menu-categories li.menu ul.submenu>li a:hover:before,
            #sidebar ul.menu-categories li.menu ul.submenu>li.active a:hover:before {
                background: #9f1521 !important;
                box-shadow: 0 0 0px 2px rgba(67, 97, 238, 0.431);
                border: 1.9px solid #9f1521;
            }
        </style>
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu @if (request()->is('dashboard*')) active @endif">
                <a href="{{ route('dashboard.general') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-columns">
                            <path
                                d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18">
                            </path>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>DOKUMEN</span>
                </div>
            </li>

            <li class="menu">
                <a href="#requested-doc" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="heading">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Permintaan Dok.</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="requested-doc" data-bs-parent="#accordionExample">
                    <li class="">
                        <a href="{{ route('users.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Pembuatan Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Penomoran Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Versioning Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Penonaktifan Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Hak Akses Dokumen</span></div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{ route('dashboard.general') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <span>Upload Dokumen</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#requested-doc" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="heading">
                        <i class="fa-regular fa-square-check"></i>
                        <span>Dokumen Aktif</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="requested-doc" data-bs-parent="#accordionExample">
                    <li class="">
                        <a href="{{ route('users.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Pembuatan Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Penomoran Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Versioning Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Penonaktifan Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Hak Akses Dokumen</span></div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{ route('dashboard.general') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <span>Dok. Non-Aktif</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#requested-doc" data-bs-toggle="collapse" aria-expanded="" class="dropdown-toggle">
                    <div class="heading">
                        <i class="fa-solid fa-list"></i>
                        <span>Dokumen Lain</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="requested-doc" data-bs-parent="#accordionExample">
                    <li class="">
                        <a href="{{ route('users.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Pembuatan Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Penomoran Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Versioning Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Penonaktifan Dokumen</span></div>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('units.index') }}" aria-expanded="false"
                            class="dropdown-toggle dropdown-toggle-menu">
                            <div class=""><span>Hak Akses Dokumen</span></div>
                        </a>
                    </li>
                </ul>
            </li>

            @if (Auth::user()->hasRole('superadmin'))
                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>PENGATURAN</span>
                    </div>
                </li>


                <li class="menu">
                    <a href="#users" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('users*') || Request::is('units*') || Request::is('document-types*') ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="heading">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                            <span>Settings</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled @if (request()->is('users*') || request()->is('units*') || request()->is('document-types*')) show @endif"
                        id="users" data-bs-parent="#accordionExample">
                        <li class="@if (request()->is('users*')) active @endif">
                            <a href="{{ route('users.index') }}" aria-expanded="false"
                                class="dropdown-toggle dropdown-toggle-menu">
                                <div class="">
                                    <span>Kelola User</span>
                                </div>
                            </a>
                        </li>
                        <li class="@if (request()->is('units*')) active @endif">
                            <a href="{{ route('units.index') }}" aria-expanded="false"
                                class="dropdown-toggle dropdown-toggle-menu">
                                <div class="">
                                    <span>Kelola Unit</span>
                                </div>
                            </a>
                        </li>
                        <li class="@if (request()->is('document-types*')) active @endif">
                            <a href="{{ route('document-types.index') }}" aria-expanded="false"
                                class="dropdown-toggle dropdown-toggle-menu">
                                <div class="">
                                    <span>Kelola Tipe Dokumen</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

    </nav>

</div>
