@php
    $menus = getParentMenusWithCategory();
    $category_parents = getParentCategories();
@endphp




<header id="masthead" class="site-header" role="banner" itemtype="https://schema.org/WPHeader" itemscope="">
    <div id="main-header" class="site-header-wrap">
        <div class="site-header-inner-wrap" style="height: 150px;">
            <div class="site-header-upper-wrap">
                <div class="site-header-upper-inner-wrap">


                    <div class="site-main-header-wrap site-header-row-container site-header-focus-item site-header-row-layout-standard"
                        data-section="base_customizer_header_main">
                        <div class="site-header-row-container-inner">
                            <div class="site-container">
                                <div
                                    class="site-main-header-inner-wrap site-header-row site-header-row-has-sides site-header-row-center-column">
                                    <div
                                        class="site-header-main-section-left site-header-section site-header-section-left">
                                        <div class="site-header-item site-header-focus-item"
                                            data-section="title_tagline">
                                            <div class="site-branding branding-layout-standard site-brand-logo-only">
                                                <a class="brand" href="/" rel="home" aria-label="Paradise">
                                                </a><a href="/" class="custom-logo-link" rel="home"
                                                    itemprop="url">
                                                    <img loading="lazy" decoding="async" width="210" height="53"
                                                        src="{{ asset('modules/publish/images/logo.jpg') }}"
                                                        class="logo" alt="Paradise"
                                                        srcset="{{ asset('modules/publish/images/logo.jpg') }} 479w, {{ asset('modules/publish/images/logo.jpg') }} 200w"
                                                        sizes="(max-width: 479px) 100vw, 479px"
                                                        data-src="{{ asset('modules/publish/images/logo.jpg') }}"></a>
                                                <a href="/" class="brand" rel="home" itemprop="url"><img
                                                        loading="lazy" decoding="async" width="210" height="53"
                                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg"
                                                        class="base-dark-mode-logo svg-logo-image logo" alt="Paradise"
                                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg 479w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg 200w"
                                                        sizes="(max-width: 479px) 100vw, 479px"
                                                        data-src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg"></a>

                                            </div>
                                        </div>
                                        <!-- data-section="title_tagline" -->
                                        <div
                                            class="site-header-main-section-left-center site-header-section site-header-section-left-center">
                                        </div>
                                    </div>
                                    <div
                                        class="site-header-main-section-center site-header-section site-header-section-center">
                                        <div class="site-header-item site-header-focus-item"
                                            data-section="base_customizer_header_search_advanced">
                                            <div class="header-search-advanced header-item-search-advanced">
                                                <form role="search" method="get"
                                                    class="search-form woocommerce-product-search"
                                                    action="{{ route('product.search') }}">

                                                    <div class="search-category-field"></div>

                                                    <label class="screen-reader-text"
                                                        for="woocommerce-product-search-field-2785">Tìm kiếm sản
                                                        phẩm:</label>

                                                    <div class="input-container">
                                                        <input type="search" id="woocommerce-product-search-field-2785"
                                                            class="search-field" placeholder="Nhập từ cần tìm kiếm…"
                                                            name="q" value="{{ request('q') }}"
                                                            autocomplete="off">
                                                        <div class="loader-container" style="display:none"><i
                                                                class="loader"></i></div>
                                                    </div>

                                                    <button type="submit" class="search-submit"
                                                        style="background:#cd1818">
                                                        <span class="search-btn-icon">
                                                            <span class="base-svg-iconset"></span>
                                                        </span>
                                                        <span
                                                            class="search-btn-text vs-lg-true vs-md-true vs-sm-false">Tìm</span>
                                                    </button>
                                                </form>

                                                <div class="search-results" style="display:none">
                                                    <div class="search-data" id="datafetch"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- data-section="header_search_advanced" -->
                                    </div>
                                    <div
                                        class="site-header-main-section-right site-header-section site-header-section-right">
                                        <div
                                            class="site-header-main-section-right-center site-header-section site-header-section-right-center">
                                        </div>




                                        <div class="site-header-item site-header-focus-item"
                                            data-section="base_customizer_cart">
                                            <div class="header-cart-wrap base-header-cart"><span
                                                    class="header-cart-empty-check header-cart-is-empty-true"></span>
                                                <div class="header-cart-inner-wrap cart-show-label-true cart-style-slide"
                                                    style="display: flex;flex-direction: row;align-items: center">
                                                    <a href="{{ route('cart.index') }}" class=" header-cart-button"
                                                        data-set-focus=".cart-toggle-close"><span
                                                            class="base-svg-iconset"><svg
                                                                class="thebase-svg-icon thebase-shopping-bag-svg"
                                                                fill="currentColor" id="Layer_1"
                                                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 762.47 673.5">
                                                                <path
                                                                    d="M603.22,492.58A91.82,91.82,0,1,0,695,584.4,91.82,91.82,0,0,0,603.22,492.58Zm-.05,142.93a51.11,51.11,0,1,1,51.11-51.11A51.11,51.11,0,0,1,603.17,635.51Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M306.11,492.58a91.82,91.82,0,1,0,91.81,91.82A91.82,91.82,0,0,0,306.11,492.58Zm-.05,142.93a51.11,51.11,0,1,1,51.11-51.11A51.12,51.12,0,0,1,306.06,635.51Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M394.43,564.06H461a20.51,20.51,0,0,1,20.45,20.45h0A20.52,20.52,0,0,1,461,605H394.43"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M700.54,453.87H208.28a23.11,23.11,0,0,1-23.08-22c0-.86-.1-1.72-.2-2.57l-1.82-16.36H725.86l-2.21,17.85A23.11,23.11,0,0,1,700.54,453.87Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M761.51,156.52H249.29L246,132.13a17.25,17.25,0,0,1,17.26-17.25H747.57a17.25,17.25,0,0,1,17.25,17.25Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M273.91,348.28l-31.16-208a20.5,20.5,0,0,1,16.73-23.59h0a20.51,20.51,0,0,1,23.6,16.73l31.16,208A20.52,20.52,0,0,1,297.5,365h0A20.52,20.52,0,0,1,273.91,348.28Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M678.37,453.87l48.7-337.74,22.9.07a17.26,17.26,0,0,1,14.54,19.59L722.42,439a17.27,17.27,0,0,1-19.6,14.55Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M186.6,439,126.06,2.84l23.71,0A17.24,17.24,0,0,1,169.1,17.78l60.56,436.35-23.74-.25A17.24,17.24,0,0,1,186.6,439Z"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                                <path
                                                                    d="M150.74,43.5H22.62A20.33,20.33,0,0,1,2.35,23.23h0A20.33,20.33,0,0,1,22.62,3H150.74"
                                                                    transform="translate(-2.35 -2.72)"></path>
                                                            </svg></span><span
                                                            class="header-cart-total header-cart-is-empty-true">{{ $cartCount }}</span>

                                                    </a>
                                                    @php
                                                        $user = Auth::guard('publish')->user();
                                                    @endphp

                                                    <div class="user-info" style="text-align: right;">
                                                        @if ($user)
                                                            <a style="color: #cd1818;font-weight: bold !important"
                                                                href="{{ route('information') }}">
                                                                <strong
                                                                    style="color: #cd1818;font-weight: bold !important">{{ $user->name }}</strong></a>


                                                            <form action="{{ route('publish.logout') }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                <button type="submit"
                                                                    style="background: none; border: none; color: #cd1818; cursor: pointer;">
                                                                    Đăng xuất
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a style="color: #cd1818"
                                                                href="{{ route('publish.login') }}">Đăng nhập</a>
                                                        @endif
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <!-- data-section="cart" -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="site-bottom-header-wrap site-header-row-container site-header-focus-item site-header-row-layout-standard base-sticky-header"
                data-section="base_customizer_header_bottom" style="" data-start-height="50">
                <div class="site-header-row-container-inner">
                    <div class="site-container">
                        <div
                            class="site-bottom-header-inner-wrap site-header-row site-header-row-has-sides site-header-row-no-center">
                            <div class="site-header-bottom-section-left site-header-section site-header-section-left">
                                <div class="site-header-item site-header-focus-item site-header-item-vertical-navigation vertical-layout-opened-false"
                                    data-section="base_customizer_vertical_navigation">


                                    <nav id="vertical-navigation"
                                        class="vertical-navigation header-navigation nav--toggle-sub header-navigation-style- header-navigation-dropdown-animation-fade-up"
                                        aria-label="Menu">
                                        <div class="vertical-navigation-header">
                                            <span class="base-svg-iconset"><svg aria-hidden="true"
                                                    class="base-svg-icon base-menu-svg" fill="currentColor"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <title>Toggle Menu</title>
                                                    <path
                                                        d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z">
                                                    </path>
                                                </svg></span>
                                            <span class="vertical-navigation-title">Danh mục sản phẩm</span>
                                        </div>
                                        <div class="vertical-menu-container header-menu-container"
                                            id="vertical-menu-container">
                                            <ul id="vertical-menu" class="menu">
                                                @if ($category_parents)
                                                    @foreach ($category_parents as $category_parent)
                                                        <li id=""
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-384 base-menu-mega-enabled base-menu-mega-width-custom base-menu-mega-columns-1 base-menu-mega-layout-equal">

                                                            <a href="{{ url('cat/' . $category_parent->slug) }}">
                                                                <span class="nav-drop-title-wrap"
                                                                    style="font-weight: 500">{{ $category_parent->name }}
                                                                    @php
                                                                        // Lấy các submenu cấp 1 cho category cha
                                                                        $category_submenus1 = getChildCategories(
                                                                            (int) $category_parent->id,
                                                                        );
                                                                    @endphp
                                                                    @if ($category_submenus1 && $category_submenus1->count() > 0)
                                                                        <span class="dropdown-nav-toggle">
                                                                            <span
                                                                                class="base-svg-iconset svg-baseline">
                                                                                <svg aria-hidden="true"
                                                                                    class="base-svg-icon base-arrow-down-svg"
                                                                                    fill="currentColor" version="1.1"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24">
                                                                                    <title>Expand</title>
                                                                                    <path
                                                                                        d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                                                                                    </path>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    @endif

                                                                </span>
                                                            </a>



                                                            @if ($category_submenus1 && $category_submenus1->count() > 0)
                                                                <ul class="sub-menu"
                                                                    style="width: 730px; padding: 30px; display: flex; flex-wrap: wrap; flex-direction: row; list-style: none;">
                                                                    @foreach ($category_submenus1 as $index => $category_submenu1)
                                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-392"
                                                                            style="flex: 0 0 calc(33.33%); margin-bottom: 10px; box-sizing: border-box;">

                                                                            <!-- [element-102] -->
                                                                            <div data-elementor-type="wp-post"
                                                                                data-elementor-id="102"
                                                                                class="elementor elementor-102">
                                                                                <section
                                                                                    class="elementor-section elementor-top-section elementor-element elementor-element-93eca9f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                                    data-id="93eca9f"
                                                                                    data-element_type="section">
                                                                                    <div
                                                                                        class="elementor-container elementor-column-gap-no">
                                                                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-713a687"
                                                                                            data-id="713a687"
                                                                                            data-element_type="column">
                                                                                            <div
                                                                                                class="elementor-widget-wrap elementor-element-populated">
                                                                                                <section
                                                                                                    class="elementor-section elementor-inner-section elementor-element elementor-element-c3c2824 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                                                    data-id="c3c2824"
                                                                                                    data-element_type="section">
                                                                                                    <div
                                                                                                        class="">
                                                                                                        <div class="elementor-column  elementor-inner-column elementor-element elementor-element-a6e1642"
                                                                                                            data-id="a6e1642"
                                                                                                            data-element_type="column">
                                                                                                            <div
                                                                                                                class="elementor-widget-wrap elementor-element-populated">
                                                                                                                <div class="elementor-element elementor-element-f192692 product-cat-style-1 elementor-widget elementor-widget-tmcore-product-categories"
                                                                                                                    data-id="f192692"
                                                                                                                    data-element_type="widget"
                                                                                                                    data-widget_type="tmcore-product-categories.default">
                                                                                                                    <div
                                                                                                                        class="elementor-widget-container">

                                                                                                                        <div
                                                                                                                            class="product-cat">

                                                                                                                            <div
                                                                                                                                class="cat-image">
                                                                                                                            </div>

                                                                                                                            <div class="cat-title"
                                                                                                                                style="font-weight: 550">
                                                                                                                                <a href="{{ url('cat/' . $category_submenu1->slug) }}"
                                                                                                                                    title="{{ $category_submenu1->name }}">{{ $category_submenu1->name }}</a>
                                                                                                                            </div>

                                                                                                                            @php
                                                                                                                                // Lấy các submenu cấp 2 cho category submenu1
                                                                                                                                $category_submenus2 = getChildCategories(
                                                                                                                                    (int) $category_submenu1->id,
                                                                                                                                );
                                                                                                                            @endphp

                                                                                                                            @if ($category_submenus2)
                                                                                                                                <ul
                                                                                                                                    class="sub-categories">
                                                                                                                                    @foreach ($category_submenus2 as $subindex => $category_submenu2)
                                                                                                                                        <li><a
                                                                                                                                                href="{{ url('cat/' . $category_submenu2->slug) }}">{{ $category_submenu2->name }}</a>
                                                                                                                                        </li>
                                                                                                                                    @endforeach
                                                                                                                                </ul>
                                                                                                                            @endif

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                    </div>
                                                                                                </section>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                            <!-- [/element-102] -->
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                @endif




                                            </ul>
                                        </div>
                                    </nav>
                                    <!-- #vertical-navigation -->






                                </div>


                                <!-- data-section="vertical_navigation" -->
                                <div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-false header-navigation-layout-fill-stretch-false"
                                    data-section="base_customizer_primary_navigation">

                                    <!-- horizontal menu pc-->
                                    <nav id="site-navigation"
                                        class="main-navigation header-navigation nav--toggle-sub header-navigation-style-standard header-navigation-dropdown-animation-fade-up"
                                        role="navigation" aria-label="Primary Navigation">
                                        <div class="primary-menu-container header-menu-container">
                                            <ul id="primary-menu" class="menu">
                                                @if ($menus)
                                                    @foreach ($menus as $menu)
                                                        @if ($menu->type === 'cate' && $menu->category)
                                                            @php
                                                                $cate1 = getChildCategories($menu->category_id);
                                                            @endphp
                                                            {{-- cấp 1  --}}
                                                            <li
                                                                class="menu-item menu-item-type-post_type menu-item-object-page {{ $cate1->count() ? 'menu-item-has-children' : '' }} menu-item-64 base-menu-mega-enabled base-menu-mega-width-content base-menu-mega-columns-4 base-menu-mega-layout-equal">
                                                                <a href="{{ url('cat/' . $menu->category->slug) }}">
                                                                    <span class="nav-drop-title-wrap"
                                                                        style="font-weight: 500;">
                                                                        {{ $menu->category->name }}

                                                                        @if ($cate1->count())
                                                                            <span class="dropdown-nav-toggle">
                                                                                <span
                                                                                    class="base-svg-iconset svg-baseline">
                                                                                    <svg class="base-svg-icon base-arrow-down-svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="currentColor">
                                                                                        <path
                                                                                            d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z" />
                                                                                    </svg>
                                                                                </span>
                                                                            </span>
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                                {{-- menu cấp 2 --}}
                                                                @if ($cate1->count())
                                                                    <ul class="sub-menu" style="padding: 30px">
                                                                        @foreach ($cate1 as $category_menu)
                                                                            @php
                                                                                $cate2 = getChildCategories(
                                                                                    $category_menu->id,
                                                                                );
                                                                            @endphp

                                                                            <li
                                                                                class="menu-item menu-item menu-item-type-custom menu-item-object-custom menu-item-65 {{ $cate2->count() ? 'menu-item-has-children' : '' }}">
                                                                                <a
                                                                                    href="{{ url('cat/' . $category_menu->slug) }}">
                                                                                    <span class="nav-drop-title-wrap"
                                                                                        style="font-weight: 500;">
                                                                                        <i class="fa-solid fa-tag"></i>
                                                                                        {{ $category_menu->name }}

                                                                                        @if ($cate2->count())
                                                                                            <span
                                                                                                class="dropdown-nav-toggle">
                                                                                                <span
                                                                                                    class="base-svg-iconset svg-baseline">
                                                                                                    <svg aria-hidden="true"
                                                                                                        class="base-svg-icon base-arrow-down-svg"
                                                                                                        fill="currentColor"
                                                                                                        version="1.1"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="24"
                                                                                                        height="24"
                                                                                                        viewBox="0 0 24 24">
                                                                                                        <title>Expand
                                                                                                        </title>
                                                                                                        <path
                                                                                                            d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </span>
                                                                                            </span>
                                                                                        @endif
                                                                                    </span>
                                                                                </a>

                                                                                @if ($cate2->count())
                                                                                    <ul class="sub-menu">
                                                                                        @foreach ($cate2 as $sub_1)
                                                                                            <li
                                                                                                class="menu-item menu-item-type-post_type menu-item-object-product menu-item-1047">
                                                                                                <a
                                                                                                    href="{{ url('cat/' . $sub_1->slug) }}">{{ $sub_1->name }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @elseif ($menu->type == 'page' && $menu->page)
                                                            <li class="menu-item">
                                                                <a href="{{ route('page.show', $menu->page->slug) }}"
                                                                    class="py-2 block w-full" aria-current="page">
                                                                    {{ $menu->title }}
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="menu-item">
                                                                <a href="{{ $menu->url }}"
                                                                    class="py-2 block w-full" aria-current="static">
                                                                    {{ $menu->title }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endif






                                            </ul>
                                        </div>
                                    </nav>
                                    <!-- #site-navigation -->

                                    <!--End horizontal menu pc-->




                                </div>
                                <!-- data-section="primary_navigation" -->
                            </div>


                            <div
                                class="site-header-bottom-section-right site-header-section site-header-section-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile header-->
    <div id="mobile-header" class="site-mobile-header-wrap">
        <div class="site-header-inner-wrap">
            <div class="site-header-upper-wrap">
                <div class="site-header-upper-inner-wrap">

                    <div class="site-main-header-wrap site-header-focus-item site-header-row-layout-standard site-header-row-tablet-layout-default site-header-row-mobile-layout-default  base-sticky-header"
                        data-shrink="false" data-reveal-scroll-up="false">
                        <div class="site-header-row-container-inner">
                            <div class="site-container">
                                <div
                                    class="site-main-header-inner-wrap site-header-row site-header-row-has-sides site-header-row-no-center">
                                    <div
                                        class="site-header-main-section-left site-header-section site-header-section-left">
                                        <div class="site-header-item site-header-focus-item site-header-item-navgation-popup-toggle"
                                            data-section="base_customizer_mobile_trigger">
                                            <div class="mobile-toggle-open-container">
                                                <button id="mobile-toggle"
                                                    class="menu-toggle-open drawer-toggle menu-toggle-style-default"
                                                    aria-label="Open menu" data-toggle-target="#mobile-drawer"
                                                    data-toggle-body-class="showing-popup-drawer-from-left"
                                                    aria-expanded="false" data-set-focus=".menu-toggle-close">
                                                    <span class="menu-toggle-icon"><span class="base-svg-iconset"><svg
                                                                aria-hidden="true" class="base-svg-icon base-menu-svg"
                                                                fill="currentColor" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <title>Toggle Menu</title>
                                                                <path
                                                                    d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z">
                                                                </path>
                                                            </svg></span></span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- data-section="mobile_trigger" -->
                                        <div class="site-header-item site-header-focus-item"
                                            data-section="title_tagline">
                                            <div
                                                class="site-branding mobile-site-branding branding-layout-standard branding-tablet-layout-inherit site-brand-logo-only branding-mobile-layout-inherit">
                                                <a class="brand" href="#" rel="home" aria-label="">
                                                </a><a href="#/" class="custom-logo-link" rel="home"
                                                    itemprop="url">
                                                    <img loading="lazy" decoding="async" width="210"
                                                        height="53"
                                                        src="{{ asset('modules/publish/images/logo.jpg') }}"
                                                        class="logo" alt=""
                                                        srcset="{{ asset('modules/publish/images/logo.jpg') }} 479w, {{ asset('modules/publish/images/logo.jpg') }} 200w"
                                                        sizes="(max-width: 479px) 100vw, 479px"
                                                        data-src="{{ asset('modules/publish/images/logo.jpg') }}">
                                                </a>
                                                <a href="#" class="brand" rel="home" itemprop="url">
                                                    <img loading="lazy" decoding="async" width="210"
                                                        height="53"
                                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg"
                                                        class="base-dark-mode-logo svg-logo-image logo"
                                                        alt="Couchly Demo"
                                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg 479w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg 200w"
                                                        sizes="(max-width: 479px) 100vw, 479px"
                                                        data-src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/dark-logo.svg">
                                                </a>

                                            </div>

                                        </div>
                                        <!-- data-section="title_tagline" -->
                                    </div>
                                    <div
                                        class="site-header-main-section-right site-header-section site-header-section-right">
                                        <div class="site-header-item site-header-focus-item"
                                            data-section="base_customizer_header_search">
                                            <div class="search-toggle-open-container">
                                                <button
                                                    class="search-toggle-open drawer-toggle search-toggle-style-default"
                                                    aria-label="View Search Form" data-toggle-target="#search-drawer"
                                                    data-toggle-body-class="showing-popup-drawer-from-full"
                                                    aria-expanded="false"
                                                    data-set-focus="#search-drawer .search-field">
                                                    <span class="search-toggle-icon"><span
                                                            class="base-svg-iconset"><svg
                                                                class="thebase-svg-icon thebase-search-svg"
                                                                fill="currentColor" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <title>Search</title>
                                                                <path
                                                                    d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z">
                                                                </path>
                                                            </svg></span></span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- data-section="header_search" -->


                                        <div class="site-header-item site-header-focus-item"
                                            data-section="base_customizer_mobile_cart">
                                            <div class="header-cart-inner-wrap cart-show-label-true cart-style-slide"
                                                style="display: flex;flex-direction: row;align-items: center">
                                                <a href="{{ route('cart.index') }}" class="header-cart-button"
                                                    data-set-focus=".cart-toggle-close" style="position: relative">
                                                    <span class="base-svg-iconset">
                                                        <svg class="thebase-svg-icon thebase-shopping-bag-svg"
                                                            fill="currentColor" id="Layer_1" data-name="Layer 1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 762.47 673.5">
                                                            <path
                                                                d="M603.22,492.58A91.82,91.82,0,1,0,695,584.4,91.82,91.82,0,0,0,603.22,492.58Zm-.05,142.93a51.11,51.11,0,1,1,51.11-51.11A51.11,51.11,0,0,1,603.17,635.51Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M306.11,492.58a91.82,91.82,0,1,0,91.81,91.82A91.82,91.82,0,0,0,306.11,492.58Zm-.05,142.93a51.11,51.11,0,1,1,51.11-51.11A51.12,51.12,0,0,1,306.06,635.51Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M394.43,564.06H461a20.51,20.51,0,0,1,20.45,20.45h0A20.52,20.52,0,0,1,461,605H394.43"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M700.54,453.87H208.28a23.11,23.11,0,0,1-23.08-22c0-.86-.1-1.72-.2-2.57l-1.82-16.36H725.86l-2.21,17.85A23.11,23.11,0,0,1,700.54,453.87Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M761.51,156.52H249.29L246,132.13a17.25,17.25,0,0,1,17.26-17.25H747.57a17.25,17.25,0,0,1,17.25,17.25Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M273.91,348.28l-31.16-208a20.5,20.5,0,0,1,16.73-23.59h0a20.51,20.51,0,0,1,23.6,16.73l31.16,208A20.52,20.52,0,0,1,297.5,365h0A20.52,20.52,0,0,1,273.91,348.28Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M678.37,453.87l48.7-337.74,22.9.07a17.26,17.26,0,0,1,14.54,19.59L722.42,439a17.27,17.27,0,0,1-19.6,14.55Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M186.6,439,126.06,2.84l23.71,0A17.24,17.24,0,0,1,169.1,17.78l60.56,436.35-23.74-.25A17.24,17.24,0,0,1,186.6,439Z"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                            <path
                                                                d="M150.74,43.5H22.62A20.33,20.33,0,0,1,2.35,23.23h0A20.33,20.33,0,0,1,22.62,3H150.74"
                                                                transform="translate(-2.35 -2.72)"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="header-cart-total header-cart-is-empty-true"
                                                        style="
                                                            position: absolute;
                                                            top: 10px;
                                                            right: -15px;
                                                            background: #cd1818;
                                                            color: white;
                                                            font-size: 12px;
                                                            font-weight: bold;
                                                            width: 20px;
                                                            height: 20px;
                                                            text-align: center;
                                                            line-height: 20px;
                                                            border-radius: 50%;
                                                            z-index: 10;
                                                        ">
                                                        {{ $cartCount }}
                                                    </span>
                                                </a>

                                                @php
                                                    $user = Auth::guard('publish')->user();
                                                @endphp

                                                <div class="user-info" style="text-align: right;margin-left: 10px">
                                                    @if ($user)
                                                        <a style="color: #cd1818;font-weight: bold !important"
                                                            href="{{ route('information') }}">
                                                            <strong
                                                                style="color: #cd1818;font-weight: bold !important"><i
                                                                    class="fa-solid fa-user"></i></strong></a>


                                                        <form action="{{ route('publish.logout') }}" method="POST"
                                                            style="display: inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                style="background: none; border: none; color: #cd1818; cursor: pointer;">
                                                                <i class="fa-solid fa-right-from-bracket"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a style="color: #cd1818"
                                                            href="{{ route('publish.login') }}">Đăng nhập</a>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                        <!-- data-section="mobile_cart" -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mobile-drawer"
        class="popup-drawer popup-drawer-layout-sidepanel popup-drawer-animation-fade popup-drawer-side-left"
        data-drawer-target-string="#mobile-drawer">
        <div class="drawer-overlay" data-drawer-target-string="#mobile-drawer"></div>
        <div class="drawer-inner">
            <div class="drawer-header">
                <button class="menu-toggle-close drawer-toggle" aria-label="Close menu"
                    data-toggle-target="#mobile-drawer" data-toggle-body-class="showing-popup-drawer-from-left"
                    aria-expanded="false" data-set-focus=".menu-toggle-open" value="">
                    <span class="toggle-close-bar"></span>
                    <span class="toggle-close-bar"></span>
                </button>
            </div>
            <div class="drawer-content mobile-drawer-content content-align-left content-valign-top">
                <div class="site-header-item site-header-focus-item site-header-item-mobile-navigation mobile-navigation-layout-stretch-false"
                    data-section="base_customizer_mobile_navigation">
                    <nav id="mobile-site-navigation"
                        class="mobile-navigation drawer-navigation drawer-navigation-parent-toggle-false"
                        role="navigation" aria-label="Primary Mobile Navigation">
                        <div class="mobile-menu-container drawer-menu-container">
                            <ul id="mobile-menu" class="menu has-collapse-sub-nav">

                                <ul id="mobile-menu" class="menu has-collapse-sub-nav">

                                    @if ($menus)
                                        @foreach ($menus as $menu)
                                            @if ($menu->type == 'cate')
                                                @php
                                                    $cate1 = getChildCategories($menu->category_id);
                                                    $menuIdLv1 = 'menu-item-' . $menu->category->id;
                                                @endphp
                                                <li id="{{ $menuIdLv1 }}"
                                                    class="menu-item {{ $cate1->count() ? 'menu-item-has-children' : '' }}">
                                                    <div class="drawer-nav-drop-wrap">
                                                        <a
                                                            href="{{ url('cat/' . $menu->category->slug) }}">{{ $menu->category->name }}</a>

                                                        @if ($cate1->count())
                                                            <button class="drawer-sub-toggle"
                                                                data-toggle-target="#{{ $menuIdLv1 }} > ul.sub-menu"
                                                                aria-expanded="false">
                                                                <span class="screen-reader-text">Toggle child
                                                                    menu</span>
                                                                <span class="base-svg-iconset">
                                                                    <svg aria-hidden="true"
                                                                        class="base-svg-icon base-arrow-down-svg"
                                                                        fill="currentColor" width="24"
                                                                        height="24" viewBox="0 0 24 24">
                                                                        <path
                                                                            d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        @endif
                                                    </div>

                                                    @if ($cate1->count())
                                                        <ul class="sub-menu" style="padding: 0;padding-left:5px">
                                                            @foreach ($cate1 as $category_menu)
                                                                @php
                                                                    $cate2 = getChildCategories($category_menu->id);
                                                                    $menuIdLv2 = 'menu-item-' . $category_menu->id;
                                                                @endphp
                                                                <li id="{{ $menuIdLv2 }}"
                                                                    class="menu-item {{ $cate2->count() ? 'menu-item-has-children' : '' }}">
                                                                    <div class="drawer-nav-drop-wrap">
                                                                        <a
                                                                            href="{{ url('cat/' . $category_menu->slug) }}">
                                                                            <i class="fa-solid fa-tag"></i>
                                                                            {{ $category_menu->name }}
                                                                        </a>

                                                                        @if ($cate2->count())
                                                                            <button class="drawer-sub-toggle"
                                                                                data-toggle-target="#{{ $menuIdLv2 }} > ul.sub-menu"
                                                                                aria-expanded="false">
                                                                                <span class="screen-reader-text">Toggle
                                                                                    child menu</span>
                                                                                <span class="base-svg-iconset">
                                                                                    <svg aria-hidden="true"
                                                                                        class="base-svg-icon base-arrow-down-svg"
                                                                                        fill="currentColor"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path
                                                                                            d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                            </button>
                                                                        @endif
                                                                    </div>

                                                                    @if ($cate2->count())
                                                                        <ul class="sub-menu"
                                                                            style="padding: 0;padding-left:10px">
                                                                            @foreach ($cate2 as $sub_1)
                                                                                <li class="menu-item">
                                                                                    <a
                                                                                        href="{{ url('cat/' . $sub_1->slug) }}">
                                                                                        {{ $sub_1->name }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @elseif ($menu->type == 'page' && $menu->page)
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-63">
                                                    <a href="{{ route('page.show', $menu->page->slug) }}"
                                                        aria-current="page">{{ $menu->title }}</a>
                                                </li>
                                            @else
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-63">
                                                    <a href="{{ $menu->url }}"
                                                        aria-current="page">{{ $menu->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>



                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            </nav>
            <!-- #site-navigation -->
        </div>

        <!-- data-section="mobile_navigation" -->

        <!-- data-section="mobile_secondary_navigation" -->
    </div>

    <!--End Mobile header-->
</header>
<div id="search-drawer" class="popup-drawer popup-drawer-layout-fullwidth"
    data-drawer-target-string="#search-drawer">
    <div class="drawer-overlay" data-drawer-target-string="#search-drawer"></div>
    <div class="drawer-inner">
        <div class="drawer-header">
            <button class="search-toggle-close drawer-toggle" aria-label="Close search"
                data-toggle-target="#search-drawer" data-toggle-body-class="showing-popup-drawer-from-full"
                aria-expanded="false" data-set-focus=".search-toggle-open">
                <span class="base-svg-iconset"><svg class="base-svg-icon base-close-svg" fill="currentColor"
                        version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <title>Toggle Menu Close</title>
                        <path
                            d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                        </path>
                    </svg></span>
            </button>
        </div>
        <div class="drawer-content">
            <form role="search" method="get" class="woocommerce-product-search"
                action="{{ route('product.search') }}">

                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Tìm kiếm sản phẩm:</label>

                <input type="search" id="woocommerce-product-search-field-0" class="search-field"
                    placeholder="Tìm kiếm…" name="q" value="{{ request('q') }}" />

                <button type="submit">Tìm</button>

                <div class="base-search-icon-wrap">
                    <span class="base-svg-iconset">
                        <svg class="thebase-svg-icon thebase-search-svg" fill="currentColor" width="24"
                            height="24" viewBox="0 0 24 24">
                            <title>Search</title>
                            <path
                                d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z" />
                        </svg>
                    </span>
                </div>
            </form>

        </div>
    </div>
</div>
