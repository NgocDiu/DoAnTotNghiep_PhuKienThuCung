@extends('layouts.2column')
@section('title', 'Đặt hàng thành công')
@section('description', config('settings.meta_description'))
@section('image', url('themes/frontend/furniture/dist/images/op-hung-lan.jpg'))
@section('image_width', 480)
@section('image_height', 360)
@section('styles')

    <style>
        .woocommerce ul.woocommerce-order-overview.woocommerce-thankyou-order-details {
            /* display: -webkit-box; */
            display: -ms-flexbox;
            display: flex;
            background: var(--global-palette8);
            padding: 20px;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            border: 1px solid var(--global-gray-400);
            overflow-x: auto;
            scrollbar-width: thin;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            overflow-y: hidden;
            scroll-behavior: smooth;
        }

        .woocommerce ul.woocommerce-order-overview.woocommerce-thankyou-order-details li {
            font-size: 14px
        }

        .woocommerce ul.woocommerce-order-overview.woocommerce-thankyou-order-details li strong {
            font-size: 14px;
            font-weight: 500;
            padding-top: 10px
        }
    </style>
@stop
@section('content')


    <section role="banner" class="entry-hero page-hero-section entry-hero-layout-standard">
        <div class="entry-hero-container-inner"
            style="background-image: url('https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/templatemela-plugin-couchly/layouts/default/img/breadcumb-bkg.jpg');background-position: center;
    background-size: cover;">
            <div class="hero-section-overlay"></div>
            <div class="hero-container site-container">
                <header
                    class="entry-header page-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                    <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                        <div class="base-breadcrumb-container">
                            <span><a href="{{ url('/') }}" itemprop="url" class="base-bc-home"><span>Trang
                                        chủ</span></a></span>
                            <span class="bc-delimiter">/</span> <span class="base-bread-current">Thanh toán</span>
                        </div>
                    </nav>
                    <h1 class="entry-title">Thanh toán</h1>
                </header><!-- .entry-header -->
            </div>
        </div>
    </section>

    <div id="primary" class="content-area">
        <div class="content-container site-container">
            <main id="main" class="site-main" role="main">
                <div class="content-wrap">
                    <article id="post-51"
                        class="entry content-bg single-entry post-footer-area-boxed post-51 page type-page status-publish hentry">
                        <div class="entry-content-wrap">

                            <div class="entry-content single-content">
                                <div class="woocommerce">
                                    <div class="woocommerce-order">





                                        @if ($order)
                                            <p
                                                class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                                                Cảm ơn bạn. Đơn hàng của bạn đã được đặt thành công.
                                            </p>

                                            <ul
                                                class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                                <li class="woocommerce-order-overview__order order">
                                                    Mã đơn: <strong>{{ $sale_number }}</strong>
                                                </li>

                                                <li class="woocommerce-order-overview__date date">
                                                    Ngày:
                                                    <strong>{{ date('d/m/Y', strtotime($order->created_at)) }}</strong>
                                                </li>

                                                <li class="woocommerce-order-overview__total total">
                                                    Total: <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol"></span>
                                                                {{ format_currency($order->grand_total ?? 0) }}
                                                            </bdi>
                                                        </span>
                                                    </strong>
                                                </li>

                                                <li class="woocommerce-order-overview__payment-method method">
                                                    Phương thức thanh toán:
                                                    <strong>{{ $order->shipping_description ?? 'Thanh toán khi nhận hàng COD' }}</strong>
                                                </li>

                                            </ul>
                                            <p>Thanh toán bằng tiền mặt khi nhận hàng.</p>
                                        @endif




                                        <section class="woocommerce-order-details">



                                            @if ($order && $order->getSaleItems->count())
                                                <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>
                                                <table
                                                    class="woocommerce-table woocommerce-table--order-details shop_table order_details"
                                                    cellpadding="8" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="woocommerce-table__product-name product-name">Sản
                                                                phẩm</th>
                                                            <th class="woocommerce-table__product-total product-total">Tổng
                                                                tiền</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($order->getSaleItems as $item)
                                                            <tr class="woocommerce-table__line-item order_item">
                                                                <td class="woocommerce-table__product-name product-name">
                                                                    <a href="#">
                                                                        {{ $item->name }}
                                                                    </a>
                                                                    <strong class="product-quantity">×
                                                                        {{ (int) $item->qty_ordered }}</strong>
                                                                </td>
                                                                <td class="woocommerce-table__product-total product-total">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>{{ format_currency($item->price) }}</bdi>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Tiền hàng:</th>
                                                                <td><span class="woocommerce-Price-amount amount">
                                                                        <bdi>{{ format_currency($item->row_total) }}</bdi>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Phí vận chuyển:</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol"></span>0đ</span>&nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Phương thức thanh toán:</th>
                                                                <td>{{ $order->shipping_description ?? 'Thanh toán khi nhận hàng COD' }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th scope="row">Tổng tiền đơn hàng:</th>
                                                            <td>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    {{ format_currency($order->grand_total ?? 0) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            @else
                                                <p style="text-align: center">Không có sản phẩm nào trong đơn hàng.</p>
                                            @endif




                                        </section>

                                        @if ($order)
                                            <section class="woocommerce-customer-details">


                                                <h2 class="woocommerce-column__title">Địa chỉ nhận hàng</h2>

                                                <address>
                                                    {{ $order->getBilling->firstname }}<br>{{ $order->getBilling->street }}<br>
                                                    <p class="woocommerce-customer-details--phone">
                                                        {{ $order->getBilling->telephone }}</p>

                                                    <p class="woocommerce-customer-details--email"><a href="#"
                                                            class="__cf_email__"
                                                            data-cfemail="1c7279687f7d7a79747d72745c7b717d7570327f7371">{{ $order->customer_email }}</a>
                                                    </p>

                                                </address>



                                            </section>
                                        @endif



                                    </div>
                                </div>
                            </div><!-- .entry-content -->
                        </div>
                    </article><!-- #post-51 -->

                </div>
            </main><!-- #main -->
        </div>
    </div>

@stop
@section('scripts')
    <script src="{{ url('themes/frontend/hunglan/assets/js/jquery.min.js') }}"></script>
@endsection
