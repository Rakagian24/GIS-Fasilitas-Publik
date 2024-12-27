<div class="iq-sidebar  sidebar-default  ">
    <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
        <a href="../backend/index.html" class="header-logo">
            <img src="{{ asset('images/location-pin.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="{{ asset('images/location-pin-dark.png') }}"
                class=" img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
            <span>GeoPub</span>
        </a>
        <div class="side-menu-bt-sidebar-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="side-menu">
                <li class="active sidebar-layout">
                    <a href="/" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </i>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li class="px-3 pt-3 pb-2">
                    <span class="text-uppercase small font-weight-bold">Pages</span>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{ route('map.index') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                            </svg>
                        </i><span class="ml-2">Map</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{ route('fasilitas.index') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>
                        </i><span class="ml-2">Kelola Data Fasilitas</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{ route('tipe-fasilitas.index') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                        </i><span class="ml-2">Kelola Data Tipe Fasilitas</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{ route('kecamatan.index') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                            </svg>
                        </i><span class="ml-2">Kelola Data Kecamatan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="pt-5 pb-5"></div>
    </div>
</div>
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="side-menu-bt-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{-- <img src="images/user/1.jpg" class="img-fluid avatar-rounded" alt="user"> --}}
                                <span class="mb-0 ml-2 user-name">Raka Gian</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item d-flex svg-icon">
                                    <svg class="svg-icon mr-0 text-secondary" id="h-01-p" width="20"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <a href="../app/user-profile.html">My Profile</a>
                                </li>
                                <li class="dropdown-item d-flex svg-icon">
                                    <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <a href="../app/user-profile-edit.html">Edit Profile</a>
                                </li>
                                <li class="dropdown-item  d-flex svg-icon border-top">
                                    <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <a href="../backend/auth-sign-in.html">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
