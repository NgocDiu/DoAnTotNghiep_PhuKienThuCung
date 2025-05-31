@extends('publish::layouts.master')

@section('content')
    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero page-hero-section entry-hero-layout-standard">
            <div class="entry-hero-container-inner">
                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <header class="entry-header page-title title-align-inherit">
                        <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                            <div class="base-breadcrumb-container">
                                <span><a href="{{ route('publish.index') }}" class="base-bc-home"><span>Trang
                                            chủ</span></a></span>
                                <span class="bc-delimiter">/</span>
                                <span class="base-bread-current">Thanh toán</span>
                            </div>
                        </nav>
                        <h1 class="entry-title">Thanh toán thành công</h1>
                    </header>
                </div>
            </div>
        </section>

        <div id="primary" class="content-area" style="margin-top: 20px">
            <div class="site-container">
                <main id="main" class="site-main" role="main">
                    <div class="content-wrap">
                        <article class="entry content-bg single-entry">
                            <div class="entry-content-wrap">
                                <div class="entry-content single-content">
                                    <div class="woocommerce">
                                        <div class="woocommerce-order">
                                            <h4 class="woocommerce-notice--success">Cảm ơn bạn. Đơn hàng của bạn đã được đặt
                                                thành công.</h4>

                                            <ul class="woocommerce-order-overview order_details"
                                                style="
                                                    display: flex;
                                                    flex-direction: row;
                                                    justify-content: space-between;
                                                    background-color: #f5f5f5;
                                                    padding: 10px 0;
                                                    font-weight: bold !important;
                                                ">
                                                <li class="woocommerce-order-overview__order">Mã đơn:
                                                    <strong>#{{ $order->id }}</strong>
                                                </li>
                                                <li class="woocommerce-order-overview__date">Ngày:
                                                    <strong>{{ $order->created_at->format('d/m/Y H:i') }}</strong>
                                                </li>
                                                <li class="woocommerce-order-overview__total">Tổng tiền:
                                                    <strong>{{ number_format($order->grand_total) }} đ</strong>
                                                </li>
                                                <li class="woocommerce-order-overview__payment-method">Phương thức thanh
                                                    toán:
                                                    <strong>
                                                        {{ strtoupper(optional($order->payment)->payment_method) === 'COD' ? 'Thanh toán khi nhận hàng (COD)' : 'VNPAY' }}
                                                    </strong>
                                                </li>
                                            </ul>

                                            <section class="woocommerce-order-details">
                                                <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>

                                                <table class="shop_table order_details">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Sản phẩm</th>
                                                            <th class="product-total">Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($items as $item)
                                                            <tr class="order_item">
                                                                <td class="product-name">
                                                                    {{ $item->product->name }}
                                                                    <strong class="product-quantity">×
                                                                        {{ $item->quantity }}</strong>
                                                                </td>
                                                                <td class="product-total">
                                                                    {{ number_format($item->line_total) }} đ
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th scope="row">Tiền hàng:</th>
                                                            <td>{{ number_format($order->items->sum('line_total')) }} đ</td>
                                                        </tr>
                                                        @if ($order->discount_amount > 0)
                                                            <tr>
                                                                <th>Giảm giá</th>
                                                                <td>-{{ number_format($order->discount_amount) }}₫</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th scope="row">Phí vận chuyển:</th>
                                                            <td>{{ number_format($order->ship_fee) }} đ</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tổng tiền:</th>
                                                            <td>{{ number_format($order->grand_total) }} đ</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </section>
                                            <div class="text-end" style="text-align: end">
                                                <a href="{{ route('publish.index') }}" class="btn btn-primary mt-3">Về
                                                    trang
                                                    chủ</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
