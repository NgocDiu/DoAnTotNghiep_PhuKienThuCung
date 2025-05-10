@extends('publish::layouts.3column')
@section('title', 'Trang chủ')
@section('styles')

@stop
@section('content')
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
                                        class="base-bc-home"><span>Home</span></a></span> <span
                                    class="bc-delimiter">/</span> <span><a
                                        href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/shop/"
                                        itemprop="url"><span>Shop</span></a></span> <span class="bc-delimiter">/</span>
                                <span class="base-bread-current">Beds</span>
                            </div>
                        </nav>
                        <h1 class="page-title archive-title">Beds</h1>
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
                                Hiển thị tất cả <span class="result">8</span> kết quả</p>
                        </div>
                        <div class="base-shop-top-item base-woo-ordering">
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="Shop order">

                                    <option value="date" selected="selected">Sản phẩm mới</option>
                                    <option value="price">Giá tăng dần</option>
                                    <option value="price-desc">Giá giảm dần</option>
                                </select>
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
                    <ul
                        class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-lg-col-4 woo-archive-always-visible woo-archive-btn-button woo-archive-loop align-buttons-bottom  woo-archive-image-hover-fade">
                        <li
                            class="entry content-bg loop-entry product type-product post-193 status-publish first instock product_cat-beds-living-room-furniture product_cat-chenille-fabric product_cat-daybed-couch product_cat-daybeds product_cat-decor-items product_cat-dining-room product_cat-fabric-sofas product_cat-living-room-chair product_cat-mammoth-bean-bag product_cat-single product_cat-storage product_cat-table product_cat-tuxedo-sofa product_cat-twin-single-beds product_cat-wooden-table-lamp has-post-thumbnail sale shipping-taxable product-type-grouped cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail">
                                <a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Elephant Chair, Natural / Vintage Leather Camel">
                                    <div class="product-onsale">
                                        <span aria-hidden="true" class="onsale ">-4%</span>
                                        <span class="screen-reader-text">Product on sale</span>
                                    </div>
                                    <img loading="lazy" width="300" height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/15-1.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="02" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-15.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px">
                                </a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Elephant
                                        Chair, Natural / Vintage Leather Camel</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>25</bdi>
                                        </span> – <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>750</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>The Elephant chair is hand-crafted with a solid oak wood frame. The chair comes in
                                        three frame variations: Natural, Dark Stained and Black and can be upholstered with
                                        leather and wool.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-142 status-publish instock product_cat-beds product_cat-chenille-fabric product_cat-daybed-couch product_cat-daybeds product_cat-fabric-sofas product_cat-recliner product_cat-storage product_cat-storage-bed product_cat-tuxedo-sofa product_cat-twin-single-beds product_cat-wooden-table-lamp has-post-thumbnail shipping-taxable purchasable product-type-variable has-default-attributes cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail"><a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Ferm Decorate Living Arum Table Lamp"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/20.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="02" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-20.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"></a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Ferm
                                        Decorate Living Arum Table Lamp</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>50</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>The Arum Table Lamp is characterized by the black solid marble base combined with the
                                        organically shaped lampshade. Achieving the perfect balance in the off-center
                                        structure of the lamp.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-205 status-publish instock product_cat-corner product_cat-dining-room product_cat-hinged product_cat-kids-beds product_cat-nesting-table product_cat-queen-king-beds product_cat-table product_cat-wooden-modular-kitchen product_cat-wooden-table-lamp has-post-thumbnail shipping-taxable purchasable product-type-variable has-default-attributes cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail"><a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Ferm Living Catena Sofa Corner Cotton Linen"><img loading="lazy"
                                        width="300" height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/14-1.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="03" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-14.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"></a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Ferm
                                        Living Catena Sofa Corner Cotton Linen</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>250</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>The embracing, beanbag-inspired shape of our low-slung Catena sofa is generously
                                        dimensioned for all-out relaxation and cosiness: we call it ‘low living’. The name
                                        Catena is inspired by the catenary.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-234 status-publish last instock product_cat-coffee-table product_cat-daybeds product_cat-dining-room product_cat-finished-wood-tables product_cat-nesting-table product_cat-outdoor-table product_cat-recliner product_cat-storage product_cat-table product_cat-wooden-table-lamp has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail">
                                <a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Koyal Faux Wood Round Decorative Tray Wood">
                                    <div class="product-onsale">
                                        <span aria-hidden="true" class="onsale ">-14%</span>
                                        <span class="screen-reader-text">Product on sale</span>
                                    </div>
                                    <img loading="lazy" width="300" height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/11-1.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="02" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-11.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px">
                                </a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Koyal
                                        Faux Wood Round Decorative Tray Wood</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>85</bdi>
                                        </span> – <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>89</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>Delight your guests with this faux wood rustic tray, a convenient way to serve drinks
                                        and snacks like pastries, bread and more. The round shape is an elegant choice for
                                        serving snacks, desserts.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-178 status-publish first instock product_cat-beds product_cat-beds-living-room-furniture product_cat-daybeds product_cat-dining-room product_cat-kids-beds product_cat-queen-king-beds product_cat-storage-bed product_cat-twin-single-beds product_cat-wooden-table-lamp has-post-thumbnail shipping-taxable product-type-external cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail"><a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Latest Ferm Living Post Storage Cabinet"><img loading="lazy"
                                        width="300" height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/18-1.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="02" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-18.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"></a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Latest
                                        Ferm Living Post Storage Cabinet</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>89</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>the Post Storage Cabinet plays with volumes to present a remarkable storage solution
                                        with elaborate details that draw you in. Made from Mix-certified wood, the cabinet
                                        feature striped wood.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-245 status-publish instock product_cat-beds product_cat-beds-living-room-furniture product_cat-chenille-fabric product_cat-daybed-couch product_cat-daybeds product_cat-decor-items product_cat-dining-room product_cat-kids-beds product_cat-living-room-chair product_cat-mammoth-bean-bag product_cat-queen-king-beds product_cat-recliner product_cat-storage product_cat-storage-bed product_cat-tuxedo-sofa product_cat-twin-single-beds product_cat-wooden-table-lamp has-post-thumbnail featured shipping-taxable purchasable product-type-variable has-default-attributes cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail"><a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Modern White Round Dining Table Small Table"><img loading="lazy"
                                        width="300" height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/10/10.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="03" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/03-10.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"></a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Modern
                                        White Round Dining Table Small Table</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>54</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>The table legs have a bright gold powder coat finish in a contemporary, complements
                                        an elegant modern aesthetic with the white Engineered Wood top. Its elongated lines
                                        make a statement.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-277 status-publish instock product_cat-fabric-sofas product_cat-kids-beds product_cat-knole-sofa product_cat-ottomans-sofas product_cat-sectional-sofas product_cat-sofas product_cat-storage product_cat-storage-bed product_cat-twin-single-beds product_cat-wooden-table-lamp has-post-thumbnail shipping-taxable purchasable product-type-variable has-default-attributes cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail"><a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Rico Lounge Chair | Single Sofas &amp; Poufs"><img loading="lazy"
                                        width="300" height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/7.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="02" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-7.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"></a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="#"
                                        class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">Rico
                                        Lounge Chair | Single Sofas &amp; Poufs</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>70</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>The Rico Collection is characterized by its luxurious upholstery, which invites you
                                        to relax. Its slightly curved backrest, which merges smoothly into the armrests,
                                        seems to gently enclose.</p>
                                </div>

                            </div>
                        </li>
                        <li
                            class="entry content-bg loop-entry product type-product post-308 status-publish last instock product_cat-coffee-table product_cat-daybeds product_cat-decor-items product_cat-finished-wood-tables product_cat-queen-king-beds product_cat-table product_cat-wooden-study-table product_cat-wooden-table-lamp has-post-thumbnail shipping-taxable purchasable product-type-variable has-default-attributes cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail"><a href="#"
                                    class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                    aria-label="Tyewmiy End Tables Bedside Tables"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-300x300.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                        decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-120x120.jpg 120w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-60x60.jpg 60w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-700x700.jpg 700w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-346x346.jpg 346w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-173x173.jpg 173w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/3.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"><img loading="lazy" width="300"
                                        height="300"
                                        src="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-300x300.jpg"
                                        class="secondary-product-image attachment-woocommerce_thumbnail attachment-shop-catalog wp-post-image wp-post-image--secondary"
                                        alt="" title="02" decoding="async"
                                        srcset="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-300x300.jpg 300w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-150x150.jpg 150w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-768x768.jpg 768w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-600x600.jpg 600w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-100x100.jpg 100w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-96x96.jpg 96w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-460x460.jpg 460w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-236x236.jpg 236w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-118x118.jpg 118w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-700x700.jpg 700w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-346x346.jpg 346w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-173x173.jpg 173w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-296x296.jpg 296w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3-148x148.jpg 148w, https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/uploads/2023/12/02-3.jpg 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px"></a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title"><a href="# class="
                                        woocommerce-loopproduct-link-title=""
                                        woocommerce-loop-product__title_ink"="">Tyewmiy End Tables Bedside Tables</a></h2>

                                <span class="price"><span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>79</bdi>
                                        </span>
                                    </span>
                                </span>
                                <div class="product-excerpt">
                                    <p>This table is very useful to house your favourite books, coffee mug, show pieces,
                                        etc. Side table is made with Durable Long Life MDF with Paint Finish. Perfect for
                                        your home interiors, Bedroom.</p>
                                </div>

                            </div>
                        </li>
                    </ul>
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
                    <div class="clearfix" style="clear:both;">Contrary to popular belief, Lorem Ipsum is not simply random
                        text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                        the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites
                        of the word in classical literature, discovered the undoubtable source.</div>
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
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">Wooden Table
                                                Lamp</a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">Baroque</a>
                                        </li>
                                        <li class="wc-layered-nav-term chosen selected"><a href="#"
                                                class="item-link">Beds</a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">Dining
                                                Room</a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">Finished Wood
                                                Tables</a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">Sofas</a>
                                        </li>
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">special
                                                offer</a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="item-link">Storage</a>
                                        </li>
                                    </ul>
                                    <div class="ps__rail-x" style="left: 0px; bottom: -16px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 16px; height: 240px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 15px; height: 224px;"></div>
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: -16px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 16px; height: 240px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 15px; height: 224px;"></div>
                                    </div>
                                </div>
                            </div>

                        </div>





                        <div id="tmcore-wp-widget-product-brand-nav-3"
                            class="widget tmcore-wp-widget-product-brand-nav tmcore-wp-widget-filter"><input
                                type="hidden" class="widget-instance"
                                data-name="TemplateMelaCore_WP_Widget_Product_Brand_Nav"
                                data-instance="{&quot;title&quot;:&quot;Brands&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;checkbox&quot;,&quot;items_count&quot;:&quot;on&quot;,&quot;show_hierarchy&quot;:0,&quot;enable_scrollable&quot;:0,&quot;enable_collapsed&quot;:0}"><span
                                class="gamma widget-title">Thương hiệu</span>
                            <div class="widget-content">
                                <div class="widget-content-inner">
                                    <ul class="show-display-list show-items-count-on list-style-checkbox">
                                        <li class="wc-layered-nav-term"><a href="#" class="filter-link">EcoShop
                                                <span class="count">(1)</span></a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="filter-link">QuickCart
                                                <span class="count">(2)</span></a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="filter-link">SmartShop
                                                <span class="count">(1)</span></a></li>
                                        <li class="wc-layered-nav-term"><a href="#" class="filter-link">TrendMart
                                                <span class="count">(2)</span></a></li>
                                    </ul>
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
                                    <ul
                                        class="tmcore-product-price-filter show-display-list list-style-normal single-choice">
                                        <li class="chosen">
                                            <a href="#" class="filter-link">Tất cả </a>
                                        </li>
                                        <li class="">
                                            <a href="#" class="filter-link"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>0</bdi></span>
                                                – <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>150</bdi></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#" class="filter-link"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>150</bdi></span>
                                                – <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>300</bdi></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#" class="filter-link"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>300</bdi></span>
                                                – <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>450</bdi></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#" class="filter-link"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>450</bdi></span>
                                                – <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>600</bdi></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#" class="filter-link"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>600</bdi></span>
                                                – <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">$</span>750</bdi></span>
                                            </a>
                                        </li>
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
