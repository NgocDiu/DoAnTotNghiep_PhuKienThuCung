@extends('layouts.2column')
@section('title', 'Thanh toán')
@section('description', config('settings.meta_description'))
@section('image', url('themes/frontend/hunglan/assets/images/op-hung-lan.jpg'))
@section('image_width', 480)
@section('image_height', 360)
@section('styles')
    <style>
        .text-danger {
            color: red
        }
    </style>
@stop
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
                                    <a href="{{ url('/') }}" itemprop="url" class="base-bc-home"><span>Trang
                                            chủ</span></a></span>
                                <span class="bc-delimiter">/</span> <span class="base-bread-current">Thanh toán</span>
                            </div>
                        </nav>
                        <h1 class="entry-title">Thanh toán</h1>
                    </header>
                    <!-- .entry-header -->
                </div>
            </div>
        </section>
        <!-- .entry-hero -->
        <div id="primary" class="content-area" style="padding-bottom: 50px">
            @if ($quote)
                <div class="content-container site-container">
                    <main id="main" class="site-main" role="main">
                        <div class="content-wrap">
                            <article id="post-51"
                                class="entry content-bg single-entry post-footer-area-boxed post-51 page type-page status-publish hentry">
                                <div class="entry-content-wrap">
                                    <div class="entry-content single-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-notices-wrapper"></div>
                                            <div class="woocommerce-notices-wrapper"></div>
                                            <div id="base-coupon-modal"
                                                class="base-coupone-pro-modal bt-m-animate-in-fadeup bt-m-animate-out-fadeout"
                                                aria-hidden="true">
                                                <div id="bt-coupon-modal-overlay" class="bt-coupon-modal-overlay"
                                                    tabindex="-1">
                                                    <div class="bt-modal-container bt-modal-height-auto bt-close-position-inside"
                                                        role="dialog" aria-modal="true">
                                                        <button class="bt-coupon-modal-close" aria-label="Close Modal"
                                                            data-modal-close="true">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg" strokewidth="2"
                                                                strokelinecap="round" strokelinejoin="round">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18"></line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checkout woocommerce-checkout"></div>
                                            <form id="placeorder_form" method="post" class="checkout woocommerce-checkout"
                                                aria-label="Checkout">
                                                @csrf
                                                <div class="col2-set" id="customer_details">
                                                    <div class="col-1">
                                                        <wc-order-attribution-inputs></wc-order-attribution-inputs>
                                                        <div class="woocommerce-billing-fields">
                                                            <h3>Chi tiết thanh toán</h3>
                                                            <div class="woocommerce-billing-fields__field-wrapper">
                                                                <p class="form-row form-row-wide validate-required validate-phone"
                                                                    id="name" data-priority="1">
                                                                    <label for="phone" class="required_field">Họ
                                                                        tên&nbsp;<span class="required"
                                                                            aria-hidden="true">*</span></label>
                                                                    <span class="woocommerce-input-wrapper"
                                                                        style="
    flex-direction: column;
">
                                                                        <input type="tel" class="input-text "
                                                                            name="fullname" id="fullname" placeholder=""
                                                                            aria-required="true" autocomplete="tel" />
                                                                        <span id="fullname_error"
                                                                            class="text-danger"></span>
                                                                    </span>

                                                                </p>
                                                                <p class="form-row form-row-wide validate-required validate-phone"
                                                                    id="phone" data-priority="2">
                                                                    <label for="phone" class="required_field">Điện
                                                                        thoại&nbsp;<span class="required"
                                                                            aria-hidden="true">*</span></label>
                                                                    <span class="woocommerce-input-wrapper"
                                                                        style="
        flex-direction: column;">
                                                                        <input type="tel" class="input-text "
                                                                            name="telephone" id="telephone" placeholder=""
                                                                            aria-required="true" autocomplete="tel" />
                                                                        <br><span id="telephone_error"
                                                                            class="text-danger"></span>

                                                                    </span>
                                                                </p>
                                                                <p class="form-row form-row-wide validate-required validate-email"
                                                                    id="billing_email_field" data-priority="3">
                                                                    <label for="email"
                                                                        class="required_field">Email&nbsp;<span
                                                                            class="required"
                                                                            aria-hidden="true">*</span></label>
                                                                    <span class="woocommerce-input-wrapper"
                                                                        style="
    flex-direction: column;
"><input
                                                                            type="email" class="input-text "
                                                                            name="email" id="email" placeholder=""
                                                                            aria-required="true" autocomplete="email" />
                                                                        <br><span id="email_error"
                                                                            class="text-danger"></span>
                                                                    </span>
                                                                </p>
                                                                <p class="form-row form-row-wide validate-required validate-email"
                                                                    id="billing_email_field" data-priority="3">
                                                                    <label for="street" class="required_field">Địa
                                                                        chỉ&nbsp;<span class="required"
                                                                            aria-hidden="true">*</span></label>
                                                                    <span class="woocommerce-input-wrapper"
                                                                        style="
    flex-direction: column;
"><input
                                                                            type="text" class="input-text "
                                                                            name="street" id="street" placeholder=""
                                                                            aria-required="true" />
                                                                        <br><span id="address_error"
                                                                            class="text-danger"></span></span>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="woocommerce-additional-fields">
                                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                                <p class="form-row notes" id="order_comments_field"
                                                                    data-priority=""><label for="order_note"
                                                                        class="">Ghi chú đơn hàng&nbsp;</label>
                                                                    <span class="woocommerce-input-wrapper">
                                                                        <textarea name="order_note" class="input-text " id="order_comments" placeholder="" rows="2" cols="5"></textarea>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                                <div class="checkout-order-review">
                                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                                        <h2 id="order_review_title">Đơn hàng của bạn</h2>
                                                        <table class="shop_table woocommerce-checkout-review-order-table1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Sản phẩm</th>
                                                                    <th class="product-total">Tiền hàng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if ($items)
                                                                    @foreach ($items as $item)
                                                                        <tr class="cart_item">
                                                                            <td class="product-name">
                                                                                <span
                                                                                    class="checkout-review-product-image">
                                                                                    <img loading="lazy" decoding="async"
                                                                                        width="80" height="80"
                                                                                        src="{{ resize(substr($item->image, 8), 80, 80, 1) }}"
                                                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                                        alt=""
                                                                                        style="margin-bottom: 10px;" />
                                                                                    <div class="product-quantity">
                                                                                        <div
                                                                                            class="quantity spinners-added">
                                                                                            <label
                                                                                                class="screen-reader-text"
                                                                                                for="quantity_6804e597452dd">{{ $item->name }}
                                                                                            </label>
                                                                                            <p>
                                                                                                Số lượng sản phẩm:
                                                                                                {{ (int) $item->qty }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </span>
                                                                                <span class="checkout-review-product-name">
                                                                                    {{ $item->name }}
                                                                                </span> <br>
                                                                                <span
                                                                                    class="checkout-review-product-price price">
                                                                                    <span
                                                                                        class="checkout-review-product-price price">
                                                                                        <del aria-hidden="true">
                                                                                            <span
                                                                                                class="woocommerce-Price-amount amount">
                                                                                                <span
                                                                                                    class="woocommerce-Price-currencySymbol"></span>
                                                                                                {{ format_currency($item->origin_price) }}
                                                                                            </span>
                                                                                        </del>
                                                                                        <span class="screen-reader-text">
                                                                                            Original price was:
                                                                                            {{ format_currency($item->origin_price) }}.
                                                                                        </span>
                                                                                        <ins aria-hidden="true">
                                                                                            <span
                                                                                                class="woocommerce-Price-amount amount">
                                                                                                <span
                                                                                                    class="woocommerce-Price-currencySymbol"></span>
                                                                                                {{ format_currency($item->price) }}
                                                                                            </span>
                                                                                        </ins>
                                                                                        <span class="screen-reader-text">
                                                                                            Current price is:
                                                                                            {{ format_currency($item->price) }}.
                                                                                        </span>
                                                                                    </span>&nbsp;
                                                                                </span>

                                                                            </td>
                                                                            <td class="product-total">
                                                                                <span
                                                                                    class="woocommerce-Price-amount amount">
                                                                                    <bdi>
                                                                                        <span
                                                                                            class="woocommerce-Price-currencySymbol"></span>
                                                                                        {{ format_currency($item->row_total) }}
                                                                                    </bdi>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="order-total">
                                                                    <th>
                                                                        <p style="font-size: 18px">Tổng thanh toán</p>
                                                                    </th>
                                                                    <td><strong><span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol"></span>{{ format_currency($quote->subtotal) }}</bdi></span></strong>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div id="payment" class="woocommerce-checkout-payment1">
                                                            <div class="form-row place-order">
                                                                <button class="button alt"
                                                                    name="woocommerce_checkout_place_order"
                                                                    id="placeorder" value="Place order"
                                                                    data-value="Place order"
                                                                    style="display: flex;width: 100%;justify-content: center; background:#cd1818;">
                                                                    Thanh toán</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                            </article>
                            <!-- #post-51 -->
                        </div>
                    </main>
                    <!-- #main -->
                </div>
            @else
            @endif
        </div>
        <!-- #primary -->
    </div>
    <!-- #inner-wrap -->
@stop
@section('scripts')
    <script src="{{ url('themes/frontend/hunglan/assets/js/jquery.min.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            jQuery('#placeorder').click(function(e) {
                e.preventDefault();

                let hasError = false;

                // Reset các thông báo lỗi trước đó
                jQuery('.text-danger').text('');

                // Lấy các giá trị từ form
                let fullname = jQuery('#fullname').val().trim();
                let telephone = jQuery('#telephone').val().trim();
                let email = jQuery('#email').val().trim();
                let street = jQuery('#street').val().trim();

                // Validate Họ tên
                if (fullname === '') {
                    jQuery('#fullname_error').text('Vui lòng nhập họ tên');
                    hasError = true;
                }

                // Validate Điện thoại
                let phoneRegex = /^[0-9]{10,11}$/;
                if (telephone === '') {
                    jQuery('#telephone_error').text('Vui lòng nhập số điện thoại');
                    hasError = true;
                } else if (!phoneRegex.test(telephone)) {
                    jQuery('#telephone_error').text('Số điện thoại không hợp lệ');
                    hasError = true;
                }

                // Validate Email
                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email === '') {
                    jQuery('#email_error').text('Vui lòng nhập email');
                    hasError = true;
                } else if (!emailRegex.test(email)) {
                    jQuery('#email_error').text('Email không hợp lệ');
                    hasError = true;
                }

                // Validate Địa chỉ
                if (street === '') {
                    jQuery('#address_error').text('Vui lòng nhập địa chỉ');
                    hasError = true;
                }

                // Nếu có lỗi, dừng lại không gửi form
                if (hasError) {
                    jQuery('html, body').animate({
                        scrollTop: jQuery('.text-danger:visible:first').offset().top - 100
                    }, 500);
                    return false;
                }

                // Nếu không có lỗi, tiến hành gửi AJAX
                let eventForm = jQuery("#placeorder_form");
                let formData = eventForm.serialize();

                jQuery.ajax({
                    url: '{{ route('checkout.placeorder') }}',
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {
                        jQuery('#placeorder').hide();
                        jQuery('#loading_checkout').html(
                            '<input type="button" class="btn disable_bt" value="THANH TOÁN"/>'
                        );
                    },
                    success: function(data) {

                        if (data.errors) {
                            if (data.errors.address_id) {
                                jQuery('#address_id_error').html(data.errors.address_id[0]);
                            }
                            if (data.errors.shipping_method) {
                                jQuery('#shipping_error').html(data.errors.shipping_method[0]);
                            }
                            if (data.errors.payment_method) {
                                jQuery('#payment_error').html(data.errors.payment_method[0]);
                            }

                            if (data.errors.fullname) {
                                jQuery('#fullname_error').html(data.errors.fullname[0]);
                            }

                            if (data.errors.telephone) {
                                jQuery('#telephone_error').html(data.errors.telephone[0]);
                            }

                            if (data.errors.province) {
                                jQuery('#province_error').html(data.errors.province[0]);
                            }

                            if (data.errors.district) {
                                jQuery('#district_error').html(data.errors.district[0]);
                            }

                            if (data.errors.ward) {
                                jQuery('#ward_error').html(data.errors.ward[0]);
                            }

                            if (data.errors.street) {
                                jQuery('#address_error').html(data.errors.street[0]);
                            }

                            jQuery('#placeorder').show();
                            jQuery('#loading_checkout').html('');

                            if (data[0].items) {
                                data[0].items.forEach((id) => {
                                    jQuery('#item_error_' + id).show();
                                });
                            }
                        }

                        if (data.redirect) {
                            window.location = data.url;
                        }

                        if (data.success) {
                            window.location = "{{ route('checkout.success') }}";
                        }
                    },
                });

            });

        });
    </script>
@endsection
