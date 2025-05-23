@extends('publish::layouts.1column')



@section('content')
    <style>
        .fa-star {
            color: #FFD700;
            /* Vàng đẹp mắt */
        }

        .fa-star-o {
            color: #ccc;
        }
    </style>

    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero product-hero-section entry-hero-layout-standard">
            <div class="entry-hero-container-inner">
                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <header
                        class="entry-header product-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                        <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                            <div class="base-breadcrumb-container">
                                <span><a href="#" itemprop="url" class="base-bc-home"><span>Trang chủ</span></a>
                                </span>
                                <span class="bc-delimiter">/</span>
                                </span> <span class="bc-delimiter"></span> <span class="base-bread-current">
                                    {{ $product->slug }}</span>
                            </div>
                        </nav>
                    </header>
                    <!-- .entry-header -->
                </div>
            </div>
        </section>
        <!-- .entry-hero -->
        @php
            $mainImage = $product->images->firstWhere('is_main', 1);
            $mainImageUrl = $mainImage ? asset($mainImage->image_url) : asset('modules/publish/images/logo.jpg');
        @endphp
        <div id="primary" class="content-area">
            <div class="content-container site-container">
                <main id="main" class="site-main" role="main">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="custom-alert-close"
                                onclick="this.parentElement.style.display='none';">&times;</button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="custom-alert-close"
                                onclick="this.parentElement.style.display='none';">&times;</button>
                        </div>
                    @endif

                    <div class="woocommerce-notices-wrapper"></div>
                    <div id="product-214"
                        class="entry content-bg entry-content-wrap product type-product post-214 status-publish first instock product_cat-fabric-sofas product_cat-knole-sofa product_cat-ottomans-sofas product_cat-sectional-sofas product_cat-sofas product_cat-special-offer product_cat-storage product_cat-tuxedo-sofa product_cat-wooden-table-lamp has-post-thumbnail sale shipping-taxable purchasable product-type-simple cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">

                        <div id="wrap-summary" class="tm-sticky-parent wrap-summary">
                            <div class="base-product-image-wrap product-images">
                                <style>
                                    .woocommerce div.product div.images {
                                        width: 600px;
                                    }
                                </style>
                                <div class="ksk-gallery bas-light-gallery bt-layout-left bt-md-layout-above bt-sm-layout-above woocommerce-product-gallery woocommerce-product-gallery--with-images images gallery-has-thumbnails"
                                    style="opacity: 1;">
                                    <div class="product_image" style="max-width:calc(600px + 20% )">
                                        <div id="pg-main-214"
                                            class="base-product-gallery-main base-ga-splide-init kb-splide splide bt-carousel-arrowstyle-blackonlight splide-initial splide--slide splide--ltr splide--draggable is-active is-overflow bt-product-gal-loaded is-initialized"
                                            style="margin-left: 20%; height: 478.4px;" data-speed="7000"
                                            data-animation-speed="400" data-product-id="214" data-vlayout="true"
                                            data-animation="false" data-auto="false" data-auto-height="false"
                                            data-arrows="false" data-gallery-items="4" data-zoom-type="window"
                                            data-visible-captions="false" data-zoom-active="true" data-thumb-show="4"
                                            data-md-thumb-show="3" data-sm-thumb-show="4" data-thumbcol="4"
                                            data-sm-thumbcol="4" data-layout="left" data-md-layout="above"
                                            data-sm-layout="above" data-thumb-width="20" data-md-thumb-width="20"
                                            data-sm-thumb-width="20" data-thumb-gap="10" data-md-thumb-gap="10"
                                            data-sm-thumb-gap="10" data-thumb-center="false" data-thumb-hover="false"
                                            role="region" aria-roledescription="carousel">
                                            <div class="splide__track splide__track--slide splide__track--ltr splide__track--draggable"
                                                id="pg-main-214-track" style="padding-left: 0px; padding-right: 0px;"
                                                aria-live="polite" aria-atomic="true">
                                                <ul class="splide__list" id="pg-main-214-list" role="presentation"
                                                    style="transform: translateX(0px);">
                                                    @foreach ($product->images as $index => $img)
                                                        <li class="splide__slide woo-main-slide {{ $index === 0 ? 'is-active is-visible' : '' }}"
                                                            id="pg-main-214-slide{{ $index }}" role="tabpanel"
                                                            aria-roledescription="slide"
                                                            aria-label="{{ $index + 1 }} of {{ count($product->images) }}"
                                                            style="width: calc(100%);">
                                                            <a href="{{ asset($img->image_url) }}" data-rel="lightbox"
                                                                itemprop="image"
                                                                class="woocommerce-main-image zoom bt-image-slide bt-no-lightbox"
                                                                data-description="">
                                                                <img loading="lazy" width="600" style="width: 600px"
                                                                    data-thumb="{{ asset($img->image_url) }}"
                                                                    class="attachment-shop-single skip-lazy"
                                                                    data-caption="" title="{{ $product->name }}"
                                                                    data-zoom-image="{{ asset($img->image_url) }}"
                                                                    height="600" src="{{ asset($img->image_url) }}"
                                                                    alt="{{ $product->name }}">
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <ul class="splide__pagination splide__pagination--ltr" role="tablist"
                                                aria-label="Select a slide to show">
                                                @foreach ($product->images as $index => $img)
                                                    <li role="presentation">
                                                        <button
                                                            class="splide__pagination__page {{ $index === 0 ? 'is-active' : '' }}"
                                                            type="button" role="tab"
                                                            aria-controls="pg-main-214-slide{{ $index }}"
                                                            aria-label="Go to slide {{ $index + 1 }}"
                                                            {{ $index === 0 ? 'aria-selected=true' : 'tabindex=-1' }}>
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div><!-- main -->
                                        <div id="pg-thumbnails-214"
                                            class="base-product-gallery-thumbnails splide kb-splide bt-carousel-arrowstyle-blackonlight bt_thumb_show_arrow splide--slide splide--ttb splide--nav is-active is-initialized"
                                            style="width: 20%; height: 478.4px;" role="region"
                                            aria-roledescription="carousel">


                                            <div class="thumb-wrapper splide__slider">

                                                <div class="splide__arrows splide__arrows--ttb"><button
                                                        class="splide__arrow splide__arrow--prev" type="button"
                                                        aria-label="Go to last slide"
                                                        aria-controls="pg-thumbnails-214-track"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"
                                                            width="40" height="40" focusable="false">
                                                            <path
                                                                d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z">
                                                            </path>
                                                        </svg></button><button class="splide__arrow splide__arrow--next"
                                                        type="button" aria-label="Next slide"
                                                        aria-controls="pg-thumbnails-214-track"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"
                                                            width="40" height="40" focusable="false">
                                                            <path
                                                                d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z">
                                                            </path>
                                                        </svg></button></div>
                                                <div class="splide__track splide__track--slide splide__track--ttb splide__track--nav"
                                                    id="pg-thumbnails-214-track"
                                                    style="padding-top: 0px; padding-bottom: 0px; height: calc(100% + 0px);">


                                                    <ul class="splide__list" id="pg-thumbnails-214-list"
                                                        role="presentation" style="transform: translateY(0px);"
                                                        aria-orientation="vertical">
                                                        @foreach ($product->images as $index => $img)
                                                            <li class="bt-woo-gallery-thumbnail splide__slide woocommerce-main-image-thumb {{ $index === 0 ? 'is-active is-visible' : 'is-visible' }}"
                                                                id="pg-thumbnails-214-slide{{ $index + 1 }}"
                                                                role="button"
                                                                aria-label="Go to slide {{ $index + 1 }}"
                                                                style="margin-bottom: 10px; height: calc(25% - 7.5px);"
                                                                aria-controls="pg-main-214-slide{{ $index + 1 }}"
                                                                {{ $index === 0 ? 'aria-current=true tabindex=0' : 'tabindex=0' }}>
                                                                <img loading="lazy" width="148" height="148"
                                                                    src="{{ asset($img->image_url) }}"
                                                                    alt="thumb-{{ $index + 1 }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- thumbnails -->
                                    </div>
                                </div><!-- [special-element-1585] -->


                            </div>
                            <div class="summary entry-summary">
                                <div class="product-brand-wrapper">
                                    <span class="product-brand-label">Thương hiệu:</span>
                                    <a href="#"
                                        class="product-brand-text-link">{{ $product->brand->name ?? 'Không rõ' }}</a>
                                </div>

                                <h1 class="product_title entry-title">{{ $product->name }}</h1>

                                <div class="wrap_price_rating">
                                    <p class="price">
                                        @if ($product->is_discount)
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>{{ number_format($product->price) }}₫</bdi>
                                                </span>
                                            </del>
                                            <ins aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>{{ number_format($product->discount_price) }}₫</bdi>
                                                </span>
                                            </ins>
                                        @else
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>{{ number_format($product->price) }}₫</bdi>
                                            </span>
                                        @endif
                                    </p>
                                </div>


                                <form class="cart" action="{{ route('cart.add', $product->id) }}" method="post">
                                    @csrf
                                    <div class="quantity spinners-added">
                                        <input type="button" value="-" class="minus">
                                        <label class="screen-reader-text" for="quantity_{{ $product->id }}">
                                            {{ $product->name }} quantity
                                        </label>
                                        <input type="number" id="quantity_{{ $product->id }}"
                                            class="input-text qty text" name="quantity" value="1"
                                            aria-label="Product quantity" min="1"
                                            max="{{ $product->stock_quantity }}" step="1" inputmode="numeric"
                                            autocomplete="off">
                                        <input type="button" value="+" class="plus">
                                    </div>

                                    <button type="submit" class="">Thêm vào
                                        giỏ hàng</button>

                                </form>
                            </div>


                        </div>
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="tabs wc-tabs" role="tablist">
                                <li class="description_tab active" id="tab-title-description">
                                    <a href="#tab-description" role="tab" aria-controls="tab-description"
                                        aria-selected="true" tabindex="0">Thông tin sản phẩm</a>
                                </li>

                            </ul>
                            @if (!empty($product->description) || ($product->attributes && $product->attributes->isNotEmpty()))
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                                    id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                                    @if (!empty($product->description))
                                        <div class="mb-4">
                                            {!! $product->description !!}
                                        </div>
                                    @endif

                                    @if ($product->attributes && $product->attributes->isNotEmpty())
                                        <h4>Thông tin chi tiết</h4>
                                        <ul>
                                            @foreach ($product->attributes as $attr)
                                                <li><strong>{{ $attr->name }}:</strong>
                                                    {{ $attr->pivot->value ?? 'Không rõ' }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </div>
                            @endif





                        </div>



                        <section class="related products">

                            <h2>Sản phẩm liên quan</h2>

                            <ul
                                class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-md-col-4 grid-lg-col-5 woo-archive-always-visible woo-archive-btn-button align-buttons-bottom  woo-archive-image-hover-fade">

                                @php
                                    $relatedProducts = get_related_products($product->id);
                                @endphp

                                @if ($relatedProducts->isNotEmpty())
                                    @foreach ($relatedProducts as $related)
                                        @php
                                            $mainImage = $related->images->firstWhere('is_main', 1);
                                            $imgUrl = $mainImage
                                                ? asset($mainImage->image_url)
                                                : asset('modules/publish/images/no-images.jpg');
                                        @endphp

                                        <li class="col-md-3 mb-4 entry content-bg loop-entry product">
                                            <div class="product-thumbnail">
                                                <a href="{{ url('san-pham/' . $related->slug) }}"
                                                    class="woocommerce-loop-image-link">
                                                    <img src="{{ $imgUrl }}" alt="{{ $related->name }}"
                                                        class="img-fluid" width="300" height="300">
                                                </a>
                                            </div>
                                            <div class="product-details content-bg entry-content-wrap">
                                                <h2 class="woocommerce-loop-product__title">
                                                    <a href="{{ url('san-pham/' . $related->slug) }}">
                                                        {{ $related->name }}
                                                    </a>
                                                </h2>
                                                <span class="price">
                                                    @if ($related->is_discount)
                                                        <del>{{ number_format($related->price) }}₫</del>
                                                        <ins
                                                            class="text-danger">{{ number_format($related->discount_price) }}₫</ins>
                                                    @else
                                                        <strong>{{ number_format($related->price) }}₫</strong>
                                                    @endif
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif





                            </ul>

                        </section>
                    </div>
                    @if ($reviews->count())
                        <div class="mt-4">
                            <h5>Đánh giá của khách hàng</h5>
                            @foreach ($reviews as $review)
                                <div class="border rounded p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong><i class="fa-solid fa-user" style="color: #cd1818;"></i>
                                            {{ $review->user->name ?? 'Người dùng' }}</strong>
                                        <small class="text-muted">{{ $review->created_at->format('d/m/Y H:i') }}</small>
                                    </div>
                                    <div class="text-warning my-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                        @endfor
                                        <span class="text-muted">({{ $review->rating }} sao)</span>
                                    </div>
                                    <div class="" style="font-weight: bold">{{ $review->comment }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mt-4">Chưa có đánh giá nào cho sản phẩm này.</p>
                    @endif




                </main>
            </div>
        </div>

    </div>
@endsection
