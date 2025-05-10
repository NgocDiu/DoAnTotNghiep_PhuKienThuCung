@extends('publish::layouts.1column')

@section('content')
    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero page-hero-section entry-hero-layout-standard">
            <div class="entry-hero-container-inner">
                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <header
                        class="entry-header page-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                        <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                            <div class="base-breadcrumb-container"><span>
                                    <a href="#" itemprop="url" class="base-bc-home"><span>Trang chủ</span></a></span>
                                <span class="bc-delimiter">/</span> <span class="base-bread-current">Giỏ hàng</span>
                            </div>
                        </nav>
                        <h1 class="entry-title">Giỏ hàng</h1>
                    </header><!-- .entry-header -->
                </div>
            </div>
        </section><!-- .entry-hero -->
        <div id="primary" class="content-area">
            <div class="content-container site-container">
                <main id="main" class="site-main" role="main">
                    <div class="content-wrap">
                        <article id="post-50"
                            class="entry content-bg single-entry post-footer-area-boxed post-50 page type-page status-publish hentry">
                            @if (count($cartItems) > 0)
                                <div class="entry-content-wrap">
                                    <div class="entry-content single-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-notices-wrapper"></div>
                                            <div class="base-woo-cart-form-wrap">
                                                <div class="cart-summary">
                                                    <h2>Tóm tắt giỏ hàng</h2>
                                                </div>
                                                <table
                                                    class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-remove">Xóa</th>
                                                            <th class="product-thumbnail">Ảnh</th>
                                                            <th class="product-name">Sản phẩm</th>
                                                            <th class="product-price">Giá</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal">Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cartItems as $item)
                                                            <tr class="woocommerce-cart-form__cart-item cart_item"
                                                                data-item-id="{{ $item->id }}">
                                                                <td class="product-remove">
                                                                    <a href="javascript:void(0);" class="remove-cart-item"
                                                                        data-remove-url="{{ route('cart.remove', $item->id) }}">×</a>

                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <img src="{{ asset($item->product->images->firstWhere('is_main', 1)?->image_url ?? 'images/no-image.png') }}"
                                                                        style="width: 80px;height: 80px;">

                                                                </td>
                                                                <td class="product-name">{{ $item->product->name }}</td>
                                                                <td class="product-price">
                                                                    {{ number_format($item->product->is_discount ? $item->product->discount_price : $item->product->price) }}₫
                                                                </td>
                                                                <td class="product-quantity">
                                                                    <input type="number" class="cart-qty"
                                                                        data-update-url="{{ route('cart.update', $item->id) }}"
                                                                        value="{{ $item->quantity }}" min="1">
                                                                    <button class="update-cart-item">Cập nhật</button>
                                                                </td>

                                                                <td class="product-subtotal">
                                                                    {{ number_format(($item->product->is_discount ? $item->product->discount_price : $item->product->price) * $item->quantity) }}₫
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="cart-collaterals">
                                                    <div class="cart_totals">
                                                        <div class="cart_totals_summary">
                                                            <h2>Tổng giỏ hàng</h2>
                                                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                                                <tbody>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Tiền hàng</th>
                                                                        <td>{{ number_format($total) }}₫</td>
                                                                    </tr>
                                                                    <tr class="order-total">
                                                                        <th>Tổng cộng</th>
                                                                        <td><strong>{{ number_format($total) }}₫</strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="wc-proceed-to-checkout">
                                                                <a href="#"
                                                                    class="checkout-button button alt wc-forward">Thanh
                                                                    toán</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="entry-content single-content">
                                    <div class="woocommerce">
                                        <div class="cart-empty woocommerce-info">Giỏ hàng của bạn hiện đang trống..</div>
                                        <div class="wc-empty-cart-message"></div>
                                        <p class="return-to-shop">
                                            <a class="button wc-backward" href="/">Quay lại cửa hàng</a>
                                        </p>
                                    </div>
                                </div>
                            @endif



                        </article><!-- #post-50 -->

                    </div>
                </main><!-- #main -->
            </div>
        </div><!-- #primary -->
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.update-cart-item').forEach(button => {
            button.addEventListener('click', async (e) => {
                const row = e.target.closest('tr');
                const qtyInput = row.querySelector('.cart-qty');
                const updateUrl = qtyInput.getAttribute('data-update-url');
                const quantity = qtyInput.value;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content');

                const res = await fetch(updateUrl, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json', // 👈 THÊM DÒNG NÀY
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        quantity
                    })
                });

                if (res.ok) {
                    const data = await res.json();
                    if (data.success) {
                        location.reload();
                    }
                } else {
                    const errorText = await res.text();
                    console.error(errorText);
                    alert("Lỗi cập nhật giỏ hàng!");
                }
            });
        });





        document.querySelectorAll('.remove-cart-item').forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault(); // 👈 Quan trọng!

                const url = button.getAttribute('data-remove-url');
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content');

                const res = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                });

                if (res.ok) {
                    location.reload();
                } else {
                    const err = await res.text();
                    console.error('Error:', err);
                    alert("Lỗi xóa sản phẩm khỏi giỏ hàng!");
                }
            });
        });
    </script>
@endsection
