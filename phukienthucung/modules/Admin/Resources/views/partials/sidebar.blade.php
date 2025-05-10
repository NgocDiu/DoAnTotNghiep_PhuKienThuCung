<nav class="pc-sidebar pc-trigger">
    <div class="navbar-wrapper" style="display: block;">
        <div class="m-header">
            <a href="../dashboard/index.html" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('modules/admin/images/logo-dark.svg') }}" class="img-fluid logo-lg" alt="logo">
            </a>
        </div>
        <div class="navbar-content pc-trigger active simplebar-scrollable-y" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: -10px 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 10px 0px;">
                                <ul class="pc-navbar" style="display: block;">
                                    <li class="pc-item pc-caption">
                                        <label>Tổng quan</label>
                                        <i class="ti ti-home"></i>
                                    </li>
                                    <li class="pc-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">

                                        <a href="{{ route('admin.index') }}" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-home"></i></span>
                                            <span class="pc-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="pc-item pc-caption">
                                        <label>Đơn Hàng</label>
                                        <i class="ti ti-products"></i>
                                    </li>
                                    <li class="pc-item {{ request()->is('admin/orders*') ? 'active' : '' }} pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-file-invoice"></i></span>
                                            <span class="pc-mtext">Đơn hàng</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item {{ request()->is('admin/orders') ? 'pc-trigger' : '' }}">
                                                <a class="pc-link" href="{{ route('admin.orders.index') }}">Danh sách
                                                    đơn hàng</a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.payments.index') --}}">Thanh
                                                    toán</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="pc-item pc-caption">
                                        <label>Quản lý sản phẩm</label>
                                        <i class="ti ti-products"></i>
                                    </li>


                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-tag"></i></span>
                                            <span class="pc-mtext">Danh mục-Thương hiệu</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/categories/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.categories.index') }}">
                                                    Danh mục
                                                </a>
                                            </li>

                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/brands/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.brands.index') }}">Thương
                                                    hiệu</a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/attributes/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.attributes.index') }}">Thuộc
                                                    tính sản phẩm</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-box"></i></span>
                                            <span class="pc-mtext">Sản phẩm</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/products/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.products.index') }}">Danh
                                                    sách sản
                                                    phẩm
                                                </a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/products/discounts/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.products.discounts') }}">Giảm giá sản
                                                    phẩm</a>
                                            </li>

                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.product_reviews.index') --}}">Đánh giá sản
                                                    phẩm</a>
                                            </li>
                                        </ul>
                                    </li>



                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-gift"></i></span>
                                            <span class="pc-mtext">Khuyến mãi</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.promotions.index') --}}">Mã
                                                    khuyến mãi</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-news"></i></span>
                                            <span class="pc-mtext">Nội dung</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/articles/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.articles.index') }}">Bài
                                                    viết</a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/pages/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.pages.index') }}">Trang
                                                    tĩnh</a>
                                            </li>
                                        </ul>
                                    <li class="pc-item pc-caption">
                                        <label>Kho</label>
                                        <i class="ti ti-products"></i>
                                    </li>




                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-package"></i></span>
                                            <span class="pc-mtext">Kho hàng</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.stock_imports.index') --}}">Phiếu nhập kho</a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.stock_import_details.index') --}}">Chi tiết
                                                    phiếu nhập</a>
                                            </li>
                                        </ul>
                                    </li>
                                    </li>

                                    <li class="pc-item pc-caption">
                                        <label>Quản lý hệ thống</label>
                                        <i class="ti ti-settings"></i>
                                    </li>

                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-users"></i></span>
                                            <span class="pc-mtext">Tài khoản</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.users.index') --}}">Người
                                                    dùng</a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/permissions/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.permissions.index') }}">
                                                    Quyền
                                                </a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/roles') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.roles.index') }}">
                                                    Vai trò (Roles)
                                                </a>
                                            </li>

                                            <li class="pc-item">
                                                <a class="pc-link {{ request()->is('admin/users/role') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.users.roles') }}">Phân quyền
                                                </a>
                                            </li>
                                            <li class="pc-item">
                                                <a class="pc-link" href="{{-- route('admin.addresses.index') --}}">Địa chỉ
                                                    khách hàng</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-menu-2"></i></span>
                                            <span class="pc-mtext">Menu website</span>
                                            <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span>
                                        </a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item">
                                                <a class="pc-link  {{ request()->is('admin/menus/*') ? 'pc-trigger' : '' }}"
                                                    href="{{ route('admin.menus.index') }}">Quản lý
                                                    Menu</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="pc-item">
                                        <a href="{{-- route('admin.settings.index') --}}" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-settings"></i></span>
                                            <span class="pc-mtext">Cài đặt hệ thống</span>
                                        </a>
                                    </li>



                                    {{-- CO san --}}
                                    <li class="pc-item">
                                        <a href="../dashboard/index.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                                            <span class="pc-mtext">Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="pc-item pc-caption">
                                        <label>UI Components</label>
                                        <i class="ti ti-dashboard"></i>
                                    </li>
                                    <li class="pc-item">
                                        <a href="../elements/bc_typography.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-typography"></i></span>
                                            <span class="pc-mtext">Typography</span>
                                        </a>
                                    </li>
                                    <li class="pc-item">
                                        <a href="../elements/bc_color.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                                            <span class="pc-mtext">Color</span>
                                        </a>
                                    </li>
                                    <li class="pc-item">
                                        <a href="../elements/icon-tabler.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                                            <span class="pc-mtext">Icons</span>
                                        </a>
                                    </li>

                                    <li class="pc-item pc-caption">
                                        <label>Pages</label>
                                        <i class="ti ti-news"></i>
                                    </li>
                                    <li class="pc-item">
                                        <a href="../pages/login.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                            <span class="pc-mtext">Login</span>
                                        </a>
                                    </li>
                                    <li class="pc-item">
                                        <a href="../pages/register.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                                            <span class="pc-mtext">Register</span>
                                        </a>
                                    </li>

                                    <li class="pc-item pc-caption">
                                        <label>Other</label>
                                        <i class="ti ti-brand-chrome"></i>
                                    </li>
                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link"><span class="pc-micon"><i
                                                    class="ti ti-menu"></i></span><span class="pc-mtext">Menu
                                                levels</span><span class="pc-arrow"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-right">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg></span></a>
                                        <ul class="pc-submenu" style="display: none;">
                                            <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
                                            <li class="pc-item pc-hasmenu">
                                                <a href="#!" class="pc-link">Level 2.2<span
                                                        class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg></span></a>
                                                <ul class="pc-submenu" style="display: none;">
                                                    <li class="pc-item"><a class="pc-link" href="#!">Level
                                                            3.1</a></li>
                                                    <li class="pc-item"><a class="pc-link" href="#!">Level
                                                            3.2</a></li>
                                                    <li class="pc-item pc-hasmenu">
                                                        <a href="#!" class="pc-link">Level 3.3<span
                                                                class="pc-arrow"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-chevron-right">
                                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                                </svg></span></a>
                                                        <ul class="pc-submenu" style="display: none;">
                                                            <li class="pc-item"><a class="pc-link"
                                                                    href="#!">Level 4.1</a></li>
                                                            <li class="pc-item"><a class="pc-link"
                                                                    href="#!">Level 4.2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pc-item pc-hasmenu">
                                                <a href="#!" class="pc-link">Level 2.3<span
                                                        class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg></span></a>
                                                <ul class="pc-submenu" style="display: none;">
                                                    <li class="pc-item"><a class="pc-link" href="#!">Level
                                                            3.1</a></li>
                                                    <li class="pc-item"><a class="pc-link" href="#!">Level
                                                            3.2</a></li>
                                                    <li class="pc-item pc-hasmenu">
                                                        <a href="#!" class="pc-link">Level 3.3<span
                                                                class="pc-arrow"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-chevron-right">
                                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                                </svg></span></a>
                                                        <ul class="pc-submenu" style="display: none;">
                                                            <li class="pc-item"><a class="pc-link"
                                                                    href="#!">Level 4.1</a></li>
                                                            <li class="pc-item"><a class="pc-link"
                                                                    href="#!">Level 4.2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pc-item">
                                        <a href="../other/sample-page.html" class="pc-link">
                                            <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
                                            <span class="pc-mtext">Sample page</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('modules/admin/images/img-navbar-card.png') }}"
                                            alt="images" class="img-fluid mb-2">
                                        <h5>Upgrade To Pro</h5>
                                        <p>To get more features and components</p>
                                        <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/"
                                            target="_blank" class="btn btn-success">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 260px; height: 873px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 30px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>
</nav>
