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
                    <div id="toast"
                        style="display: none; background: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 4px; position: fixed; top: 20px; right: 20px; z-index: 9999;">
                    </div>

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
                                                <div class=""
                                                    style="width: 100%;display: flex;flex-direction: row;justify-content:space-between">
                                                    <table
                                                        class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                        cellspacing="0" style="width: 80%;">
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
                                                                        <a href="javascript:void(0);"
                                                                            class="remove-cart-item"
                                                                            data-remove-url="{{ route('cart.remove', $item->id) }}"
                                                                            style="font-size:24px;font-weight: bold ">×</a>


                                                                    </td>
                                                                    <td class="product-thumbnail">
                                                                        <img src="{{ asset($item->product->images->firstWhere('is_main', 1)?->image_url ?? 'images/no-image.png') }}"
                                                                            style="width: 80px;height: 80px;">

                                                                    </td>
                                                                    <td class="product-name"><a
                                                                            href="{{ route('product.show', $item->product->slug) }}">{{ $item->product->name }}</a>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        {{ number_format($item->product->is_discount ? $item->product->discount_price : $item->product->price) }}₫
                                                                    </td>
                                                                    <td class="product-quantity" style="">
                                                                        <form method="POST"
                                                                            action="{{ route('cart.update', $item->id) }}"
                                                                            class="update-form"
                                                                            style="display: flex; gap: 8px;">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <input type="number" name="quantity"
                                                                                value="{{ $item->quantity }}" min="1"
                                                                                style="width: 60px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">

                                                                            <button type="submit"
                                                                                style="padding: 6px 10px; background: none; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                                                                <i class="fa-solid fa-circle-check"
                                                                                    style="color:#cd1818"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>



                                                                    <td class="product-subtotal">
                                                                        {{ number_format(($item->product->is_discount ? $item->product->discount_price : $item->product->price) * $item->quantity) }}₫
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                    <div class="cart-collaterals" style="width: 17%;">
                                                        <div class="cart_totals">
                                                            <div class="cart_totals_summary">
                                                                <h2>Tổng giỏ hàng</h2>
                                                                <table cellspacing="0"
                                                                    class="shop_table shop_table_responsive">
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
                                                                    <a href="{{ route('checkout.index') }}"
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
        <form id="deleteCartForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </div>
    <style>
        .custom-modal-overlay {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .custom-modal {
            background: #fff;
            border-radius: 6px;
            width: 400px;
            max-width: 90%;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease;
        }

        .custom-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-modal-body {
            margin: 15px 0;
        }

        .custom-modal-footer {
            text-align: right;
        }

        .custom-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 10px;
        }

        .cancel-btn {
            background: #ccc;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        }

        .custom-modal-close {
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    <!-- Modal xác nhận xóa -->
    <div id="customRemoveModal" class="custom-modal-overlay">
        <div class="custom-modal">
            <div class="custom-modal-header">
                <h3>Xác nhận xóa</h3>
                <button class="custom-modal-close" onclick="closeRemoveModal()">&times;</button>
            </div>
            <div class="custom-modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?
            </div>
            <div class="custom-modal-footer">
                <button class="custom-btn cancel-btn" onclick="closeRemoveModal()">Hủy</button>
                <button type="button" id="confirmRemoveBtn" class="custom-btn delete-btn"
                    style="text-decoration: none">Xóa</button>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        // ===============================
        // Xử lý xoá bằng modal xác nhận
        // ===============================
        let removeUrl = '';

        function openRemoveModal(url) {
            removeUrl = url;
            document.getElementById('customRemoveModal').style.display = 'flex';
        }

        function closeRemoveModal() {
            document.getElementById('customRemoveModal').style.display = 'none';
            removeUrl = '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Gán sự kiện mở modal khi click "×"
            document.querySelectorAll('.remove-cart-item').forEach(function(el) {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    openRemoveModal(el.getAttribute('data-remove-url'));
                });
            });

            // Gán sự kiện khi bấm nút Xóa trong modal
            document.getElementById('confirmRemoveBtn').addEventListener('click', function() {
                if (removeUrl) {
                    const form = document.getElementById('deleteCartForm');
                    form.action = removeUrl;
                    form.submit();
                }
            });


            // ===============================
            // Tự động ẩn thông báo sau 3 giây
            // ===============================
            setTimeout(() => {
                document.querySelectorAll('.alert-dismissible').forEach(el => {
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 300);
                });
            }, 3000);
        });
    </script>
@endsection
