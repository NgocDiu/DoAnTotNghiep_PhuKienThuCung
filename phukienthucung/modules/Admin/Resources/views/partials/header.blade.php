<header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item d-inline-flex d-md-none">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-search"></i>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <input type="search" class="form-control border-0 shadow-none"
                                    placeholder="Search here. . .">
                            </div>
                        </form>
                    </div>
                </li>

            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">

                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{ asset('modules/admin/images/user/avatar.png') }}" alt="user-image"
                            class="user-avtar">
                        <span>
                            @if (Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->name }}!
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown"
                        style="min-width: 150px;">
                        <div class="dropdown-header" style="padding: 5px">
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0" style="display: flex;align-items: center">
                                    <a href="{{ route('admin.profile.edit') }}" style="font-weight: bold;">
                                        {{-- <img src="{{ asset('modules/admin/images/user/avatar111.png') }}"
                                            alt="user-image" class="user-avtar wid-35"> --}}
                                        Thông tin cá nhân
                                    </a>

                                </div>

                                <a href="{{ route('admin.logout') }}" class="pc-head-link bg-transparent"><i
                                        class="ti ti-power text-danger">
                                    </i>
                                </a>
                            </div>
                        </div>


                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
