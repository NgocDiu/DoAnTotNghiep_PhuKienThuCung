@extends('publish::layouts.3column')
@php
    $category_parents = getParentCategories();
@endphp


@section('content')
    <style>
        .product_title:hover {
            color: #cd1818 !important;
        }

        .base-toggle-shop-layout {
            background-color: #dad4d4 !important;
        }

        .toggle-active {
            background-color: #cd1818 !important;
        }
    </style>

    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero product-archive-hero-section entry-hero-layout-standard">
            <div class="entry-hero-container-inner">
                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <header
                        class="entry-header product-archive-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                        <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                            <div class="base-breadcrumb-container"><span><a
                                        href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/" itemprop="url"
                                        class="base-bc-home"><span>Trang chủ</span></a></span> <span
                                    class="bc-delimiter">/</span> <span><a
                                        href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/shop/"
                                        itemprop="url"><span>Danh mục</span></a></span> <span class="bc-delimiter"></span>

                            </div>
                        </nav>
                        <h1 class="page-title archive-title">{{ $category->name }}</h1>
                    </header><!-- .entry-header -->
                </div>
            </div>
        </section><!-- .entry-hero -->
        <div id="primary" class="content-area">
            <div class="content-container site-container">
                <main id="main" class="site-main" role="main">
                    <header class="woocommerce-products-header">

                    </header>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div id="sticky_filter" class="base-shop-top-row">
                        <div
                            class="base-shop-top-item base-woo-offcanvas-filter-area filter-toggle-open-container vs-lg-false vs-md-true vs-sm-true">
                            <button id="filter-toggle" class="filter-toggle-open drawer-toggle filter-toggle-style-default"
                                aria-label="Open panel" data-toggle-target="#filter-drawer"
                                data-toggle-body-class="showing-filter-drawer" aria-expanded="false"
                                data-set-focus=".filter-toggle-close">
                                <span class="filter-toggle-icon"><span class="base-svg-iconset"><svg
                                            class="base-svg-icon base-list-filter-svg" fill="currentColor" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <title>Filter</title>
                                            <path
                                                d="M6 12.984v-1.969h12v1.969h-12zM3 6h18v2.016h-18v-2.016zM9.984 18v-2.016h4.031v2.016h-4.031z">
                                            </path>
                                        </svg></span></span>
                                <span class="filter-toggle-label">Filter</span>
                            </button>
                        </div>
                        <div class="base-shop-top-item base-woo-results-count">
                            <p class="woocommerce-result-count">
                                Hiển thị tất cả <span class="result">{{ $products->count() }}</span> kết quả
                            </p>
                        </div>

                        <div class="base-shop-top-item base-woo-ordering">
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order"
                                    onchange="this.form.submit()">
                                    <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sản phẩm mới
                                    </option>
                                    <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Giá tăng
                                        dần</option>
                                    <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>
                                        Giá giảm dần</option>
                                </select>

                                {{-- Giữ lại các query khác như price, min/max --}}
                                @foreach (request()->except(['orderby', 'paged']) as $name => $value)
                                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                                @endforeach

                                <input type="hidden" name="paged" value="1">
                            </form>

                        </div>
                        <div class="base-shop-top-item base-woo-toggle">
                            <div class="base-product-toggle-container base-product-toggle-outer"><button title="Grid View"
                                    class="base-toggle-shop-layout base-toggle-grid toggle-active"
                                    data-archive-toggle="grid"><span class="base-svg-iconset"><svg
                                            class="base-svg-icon base-grid-svg" fill="currentColor" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <title>Grid</title>
                                            <rect x="3.25" y="1.75" width="1.5" height="12.5" rx="0.75"
                                                fill="currentColor"></rect>
                                            <rect x="7.25" y="1.75" width="1.5" height="12.5" rx="0.75"
                                                fill="currentColor"></rect>
                                            <rect x="11.25" y="1.75" width="1.5" height="12.5" rx="0.75"
                                                fill="currentColor"></rect>
                                        </svg></span></button><button title="List View"
                                    class="base-toggle-shop-layout base-toggle-list" data-archive-toggle="list"><span
                                        class="base-svg-iconset"><svg class="base-svg-icon base-list-svg"
                                            fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" viewBox="0 0 16 16">
                                            <title>List</title>
                                            <rect x="15.25" y="4.25" width="1.5" height="12.5" rx="0.75"
                                                transform="rotate(90 15.25 4.25)" fill="currentColor"></rect>
                                            <rect x="15.25" y="8.25" width="1.5" height="12.5" rx="0.75"
                                                transform="rotate(90 15.25 8.25)" fill="currentColor"></rect>
                                            <rect x="15.25" y="12.25" width="1.5" height="12.5" rx="0.75"
                                                transform="rotate(90 15.25 12.25)" fill="currentColor"></rect>
                                        </svg></span></button></div>
                        </div>
                    </div>
                    <div id="active-filters-bar" class="active-filters-bar">
                        <div class="active-filters-list"></div>
                    </div>

                    @if ($products->isEmpty())
                        <h3 style="text-align: center">Không có sản phẩm nào trong danh mục này.</h3>
                    @else
                        <ul
                            class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-lg-col-4 woo-archive-always-visible woo-archive-btn-button woo-archive-loop align-buttons-bottom  woo-archive-image-hover-fade">

                            @foreach ($products as $product)
                                <li class="entry content-bg loop-entry product splide__slide">
                                    <div class="product-thumbnail">
                                        <a href="{{ url('san-pham/' . $product->slug) }}"
                                            class="woocommerce-loop-image-link product-has-hover-image"
                                            aria-label="{{ $product->name }}">
                                            @if ($product->discount_price)
                                                <div class="product-onsale">
                                                    <span
                                                        class="onsale">-{{ round(100 - ($product->discount_price / $product->price) * 100) }}%</span>
                                                </div>
                                            @endif
                                            <img loading="lazy" width="300" height="300"
                                                src="{{ asset($product->images->first()?->image_url ?? 'modules/publish/images/no-images.jpg') }}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                alt="{{ $product->name }}">
                                            @if ($product->images->count() > 1)
                                                <img loading="lazy" width="300" height="300"
                                                    src="{{ asset($product->images[1]->image_url) }}"
                                                    class="secondary-product-image" alt="{{ $product->name }}">
                                            @endif
                                        </a>
                                    </div>

                                    <div class="product-details content-bg entry-content-wrap">
                                        <h2 class="woocommerce-loop-product__title">
                                            <a class="product_title" href="{{ url('san-pham/' . $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h2>

                                        <span class="price">
                                            @if ($product->discount_price)
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi><span
                                                            class="woocommerce-Price-currencySymbol">₫</span>{{ number_format($product->discount_price) }}</bdi>
                                                </span>
                                                –
                                                <span class="woocommerce-Price-amount amount"
                                                    style="text-decoration: line-through; color: #999;">
                                                    <bdi><span
                                                            class="woocommerce-Price-currencySymbol">₫</span>{{ number_format($product->price) }}</bdi>
                                                </span>
                                            @else
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi><span
                                                            class="woocommerce-Price-currencySymbol">₫</span>{{ number_format($product->price) }}</bdi>
                                                </span>
                                            @endif
                                        </span>
                                        <div class="product-excerpt">
                                            <p>{{ $product->description }}</p>
                                        </div>

                                        @if (!empty($product->short_description))
                                            <div class="product-excerpt">
                                                <p>{{ $product->short_description }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif


                    <style>
                        .bt-loader-ellips {
                            font-size: 20px;
                            position: relative;
                            width: 4em;
                            height: 1em;
                            margin: 10px auto
                        }

                        .bt-loader-ellips__dot {
                            display: block;
                            width: 0.7em;
                            height: 0.7em;
                            border-radius: .5em;
                            background: var(--global-palette6);
                            position: absolute;
                            animation-duration: .5s;
                            animation-timing-function: ease;
                            animation-iteration-count: infinite
                        }

                        .bt-loader-ellips__dot:nth-child(1),
                        .bt-loader-ellips__dot:nth-child(2) {
                            left: 0
                        }

                        .bt-loader-ellips__dot:nth-child(3) {
                            left: 1.5em
                        }

                        .bt-loader-ellips__dot:nth-child(4) {
                            left: 3em
                        }

                        @keyframes loaderReveal {
                            from {
                                transform: scale(.001)
                            }

                            to {
                                transform: scale(1)
                            }
                        }

                        @keyframes loaderSlide {
                            to {
                                transform: translateX(1.5em)
                            }
                        }

                        .bt-loader-ellips__dot:nth-child(1) {
                            animation-name: loaderReveal
                        }

                        .bt-loader-ellips__dot:nth-child(2),
                        .bt-loader-ellips__dot:nth-child(3) {
                            animation-name: loaderSlide
                        }

                        .bt-loader-ellips__dot:nth-child(4) {
                            animation-name: loaderReveal;
                            animation-direction: reverse
                        }

                        .page-load-status {
                            display: none;
                            padding-top: 20px;
                            text-align: center;
                            color: var(--global-palette4);
                        }
                    </style>
                    <div class="page-load-status">
                        <ul
                            class="products ajax-load content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-lg-col-4">
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                            <li class="shimmer entry content-bg loop-entry product">
                                <div class="product-thumbnail"><img width="300" height="300"></div>
                            </li>
                        </ul>
                        <div class="bt-loader-ellips infinite-scroll-request"><span
                                class="bt-loader-ellips__dot"></span><span class="bt-loader-ellips__dot"></span><span
                                class="bt-loader-ellips__dot"></span><span class="bt-loader-ellips__dot"></span></div>
                        <p class="infinite-scroll-last">End of content</p>
                        <p class="infinite-scroll-error">End of content</p>
                    </div>

                </main>
                <aside id="secondary" role="complementary"
                    class="primary-sidebar widget-area sidebar-slug-sidebar-woocommerce-shop sidebar-link-style-normal sidebar-widgets-collapsible">
                    <div class="sidebar-inner-wrap">
                        <div id="tmcore-wp-widget-product-categories-layered-nav-2"
                            class=" widget-scrollable widget tmcore-wp-widget-product-categories-layered-nav tmcore-wp-widget-filter">
                            <input type="hidden" class="widget-instance"
                                data-name="TemplateMelaCore_WP_Widget_Product_Categories_Layered_Nav"
                                data-instance="{&quot;title&quot;:&quot;Shop By Categories&quot;,&quot;orderby&quot;:&quot;name&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;checkbox&quot;,&quot;items_count&quot;:&quot;on&quot;,&quot;show_hierarchy&quot;:0,&quot;enable_scrollable&quot;:1,&quot;enable_collapsed&quot;:0}"><span
                                class="gamma widget-title">Danh mục</span>
                            <div class="widget-content">
                                <div class="widget-content-inner ps ps--active-y">
                                    <ul class="show-display-list show-items-count-on list-style-checkbox">
                                        @if ($category_parents)
                                            @foreach ($category_parents as $category_parent)
                                                @php
                                                    $isSelected =
                                                        isset($category, $topParent) &&
                                                        ($category_parent->id == $category->id ||
                                                            $category_parent->id == $topParent->id);
                                                @endphp
                                                <li
                                                    class="wc-layered-nav-term{{ $isSelected ? ' chosen selected' : '' }}">
                                                    <a href="{{ url('cat/' . $category_parent->slug) }}"
                                                        class="item-link">
                                                        {{ $category_parent->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>





                                    <div class="ps__rail-x" style="left: 0px; bottom: -17px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 17px; height: 240px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 16px; height: 224px;"></div>
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: -17px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 17px; height: 240px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 16px; height: 224px;"></div>
                                    </div>
                                </div>
                            </div>

                        </div>






                        <div id="tmcore-wp-widget-product-price-filter-2"
                            class="widget tmcore-wp-widget-product-price-filter tmcore-wp-widget-filter"><input
                                type="hidden" class="widget-instance"
                                data-name="TemplateMelaCore_WP_Widget_Product_Price_Filter"
                                data-instance="{&quot;title&quot;:&quot;Price Filter&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;normal&quot;,&quot;enable_collapsed&quot;:0}"><span
                                class="gamma widget-title">Giá</span>
                            <div class="widget-content">
                                <div class="widget-content-inner">
                                    <style>
                                        .price-item-link {
                                            font-weight: bold;
                                        }
                                    </style>
                                    <ul
                                        class="tmcore-product-price-filter show-display-list list-style-normal single-choice">
                                        <li
                                            class="{{ is_null($minFilter) && is_null($maxFilter) ? 'price-item-link' : '' }}">
                                            <a href="{{ request()->url() }}" class="item-link">Tất cả</a>
                                        </li>

                                        @foreach ($priceRanges as $range)
                                            @php
                                                $isActive = $minFilter == $range['min'] && $maxFilter == $range['max'];
                                                $url = request()->fullUrlWithQuery([
                                                    'min' => $range['min'],
                                                    'max' => $range['max'],
                                                ]);
                                            @endphp
                                            <li class="{{ $isActive ? 'price-item-link' : '' }}">
                                                <a href="{{ $url }}" class="item-link">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>{{ number_format($range['min']) }}đ</bdi>
                                                    </span> –
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>{{ number_format($range['max']) }}đ</bdi>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>


                                </div>
                            </div>
                        </div>


                    </div>
                </aside><!-- #secondary -->
            </div>
        </div>
    </div>
@endsection
