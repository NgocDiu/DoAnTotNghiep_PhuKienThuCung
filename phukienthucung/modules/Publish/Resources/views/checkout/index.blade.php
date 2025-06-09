@extends('publish::layouts.4column')

@section('content')
    <style>
        /* Wrapper tổng */
        .payment-method-wrapper {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 100%;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* Tiêu đề */
        .payment-method-wrapper h4 {
            font-size: 18px;
            margin-bottom: 16px;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 6px;
        }

        /* Radio form */
        .payment-method-wrapper .form-check {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }

        .payment-method-wrapper .form-check-input {
            margin-right: 10px;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .payment-method-wrapper .form-check-label {
            font-size: 14px;
            color: #444;
            cursor: pointer;
        }

        /* Mã giảm giá */
        .promotion-code-wrapper {
            background-color: #f9f9f9;
            border: 1px dashed #ccc;
            border-radius: 8px;
            padding: 16px;
            margin-top: 20px;
        }

        .promotion-code-wrapper label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
        }

        .promotion-code-wrapper .input-group {
            display: flex;
        }

        .promotion-code-wrapper input[type="text"] {
            flex: 1;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #bbb;
            border-radius: 6px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .promotion-code-wrapper input[type="text"]:focus {
            border-color: #007bff;
        }

        .promotion-code-wrapper small {
            font-size: 12px;
            color: #666;
            margin-top: 6px;
            display: block;
        }

        .checkout-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin-top: 20px;
        }

        .checkout-left,
        .checkout-right {
            width: 100%;
        }

        @media (min-width: 992px) {
            .checkout-container {
                flex-direction: row;
                align-items: flex-start;
            }

            .checkout-left {
                flex: 0 0 70%;
                max-width: 70%;
                padding-right: 16px;
            }

            .checkout-right {
                flex: 0 0 30%;
                max-width: 30%;
                padding-left: 16px;
            }
        }

        .promotion-scroll-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 200px;
            /* mặc định desktop */
            overflow-y: auto;
            padding-right: 5px;
            /* tránh bị che khi scroll */
        }

        .promotion-option {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            display: flex !important;
            align-items: center;
            gap: 10px;
            flex-direction: row !important;
        }

        /* Mobile: chỉ hiển thị tối đa khoảng 1.5 item, cho scroll */
        @media (max-width: 576px) {
            .promotion-scroll-list {
                max-height: 120px;
            }
        }
    </style>



    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero page-hero-section entry-hero-layout-standard">
            <div class="entry-hero-container-inner">
                <div class="hero-section-overlay"></div>
                <div class="hero-container site-container">
                    <header
                        class="entry-header page-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                        <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                            <div class="base-breadcrumb-container">
                                <span><a href="#" itemprop="url" class="base-bc-home"><span>Trang
                                            chủ</span></a></span>
                                <span class="bc-delimiter">/</span> <span class="base-bread-current">Thanh toán</span>
                            </div>
                        </nav>
                        <h1 class="entry-title">Thanh toán</h1>
                    </header><!-- .entry-header -->
                </div>
            </div>
        </section><!-- .entry-hero -->
        <div id="primary" class="content-area">

            <div class="content-container site-container">
                <main id="main" class="site-main" role="main">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif



                    <article id="post-51"
                        class="entry content-bg single-entry post-footer-area-boxed post-51 page type-page status-publish hentry">
                        <div class="entry-content-wrap">

                            <div class="entry-content single-content">
                                <div class="woocommerce">
                                    <div class="woocommerce-notices-wrapper"></div>
                                    <div class="woocommerce-notices-wrapper"></div>

                                    <form method="POST" action="{{ route('checkout.process') }}">
                                        @csrf

                                        <div class="checkout-container">
                                            <div class="checkout-left">
                                                <h4 class="mb-2">Địa chỉ giao hàng</h4>

                                                @if (count($addresses) > 0)
                                                    <select name="address_id" class="form-control mb-3" required
                                                        style="width: 100%;border-radius: 5px">
                                                        @foreach ($addresses as $address)
                                                            <option value="{{ $address->id }}"
                                                                data-province="{{ $address->to_province_id }}"
                                                                data-district="{{ $address->to_district_id }}"
                                                                data-ward="{{ $address->to_ward_code }}"
                                                                {{ $address->is_default ? 'selected' : '' }}>
                                                                {{ $address->full_address }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <div class="alert alert-warning">
                                                        Bạn chưa có địa chỉ giao hàng. <br>
                                                        <a href="{{ route('information') }}"
                                                            class="btn btn-sm btn-outline-primary mt-2 text-end">
                                                            Thêm địa chỉ ngay
                                                        </a>
                                                    </div>
                                                @endif

                                                @php $total = 0; @endphp

                                                @if (isset($selectedItems) && count($selectedItems))
                                                    <div id="order_review" class="woocommerce-checkout-review-order"
                                                        style="margin-top: 10px">
                                                        <h2 id="order_review_title">Đơn hàng của bạn</h2>
                                                        <table class="shop_table woocommerce-checkout-review-order-table1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Sản phẩm</th>
                                                                    <th class="product-total">Tiền hàng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($selectedItems as $item)
                                                                    @php
                                                                        $product = $item->product;
                                                                        $quantity = $item->quantity;
                                                                        $price = $product->is_discount
                                                                            ? $product->discount_price
                                                                            : $product->price;
                                                                        $lineTotal = $price * $quantity;
                                                                        $total += $lineTotal;
                                                                        $image = asset(
                                                                            $product->images->firstWhere('is_main', 1)
                                                                                ?->image_url ?? 'images/no-image.png',
                                                                        );
                                                                    @endphp

                                                                    <tr class="cart_item">
                                                                        <td class="product-name"
                                                                            style="display: flex; align-items: center; gap: 10px;">
                                                                            <span class="checkout-review-product-image"
                                                                                style="position: relative;">
                                                                                <img loading="lazy" decoding="async"
                                                                                    width="80" height="80"
                                                                                    src="{{ $image }}"
                                                                                    alt="{{ $product->name }}">
                                                                                <strong class="product-quantity"
                                                                                    style="position: absolute; left: 67px; top: -9px; padding: 1px 8px; background-color: #cd1818; color: white; border-radius: 50%;">
                                                                                    {{ $quantity }}
                                                                                </strong>
                                                                            </span>

                                                                            <span
                                                                                class="checkout-review-product-name">{{ $product->name }}</span>

                                                                            <span
                                                                                class="checkout-review-product-price price">
                                                                                @if ($product->is_discount)
                                                                                    <del><span>{{ number_format($product->price) }}₫</span></del>
                                                                                    <ins><span>{{ number_format($product->discount_price) }}₫</span></ins>
                                                                                @else
                                                                                    <span>{{ number_format($product->price) }}₫</span>
                                                                                @endif
                                                                            </span>
                                                                        </td>

                                                                        <td class="product-total">
                                                                            <span>{{ number_format($lineTotal) }}₫</span>
                                                                        </td>
                                                                    </tr>

                                                                    {{-- Hidden input để gửi ID sản phẩm --}}
                                                                    <input type="hidden" name="selected_items[]"
                                                                        value="{{ $item->id }}">
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="cart-subtotal">
                                                                    <th>Tiền hàng</th>
                                                                    <td><span
                                                                            id="cart_total">{{ number_format($total) }}₫</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart-subtotal">
                                                                    <th>Phí vận chuyển</th>
                                                                    <td>
                                                                        <span id="ship_fee_value">đ</span>
                                                                        <input type="hidden" name="ship_fee"
                                                                            id="ship_fee">
                                                                    </td>
                                                                </tr>
                                                                <tr class="order-total">
                                                                    <th>Tổng thanh toán</th>
                                                                    <td><strong><span id="grand_total">đ</span></strong>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                @else
                                                    <div class="alert alert-danger mt-3">Không có sản phẩm nào được chọn để
                                                        thanh toán.</div>
                                                @endif

                                                <div class="form-group mt-3">
                                                    <label for="note">Ghi chú đơn hàng </label>
                                                    <textarea class="form-control" name="note" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="checkout-right">
                                                <div class="payment-method-wrapper">
                                                    <h4>Phương thức thanh toán</h4>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" value="cod" id="cod" checked>
                                                        <label class="form-check-label" for="cod">
                                                            Thanh toán khi nhận hàng (COD) <i
                                                                class="fa-solid fa-money-bill"></i>
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" value="vnpay" id="vnpay">
                                                        <label class="form-check-label" for="vnpay">
                                                            Thanh toán qua VNPAY <i class="fa-solid fa-credit-card"></i>
                                                        </label>
                                                    </div>

                                                    <div class="promotion-code-wrapper mt-3">
                                                        <label>Chọn mã giảm giá <i class="fa-solid fa-tag"></i></label>

                                                        <div class="promotion-scroll-list">
                                                            @foreach ($promotions as $promotion)
                                                                <label class="promotion-option">
                                                                    <input type="radio" name="promotion_code"
                                                                        value="{{ $promotion->code }}">
                                                                    <div>
                                                                        Giảm giá
                                                                        :
                                                                        {{ $promotion->discount_type == 'percent' ? $promotion->discount_value . '%' : number_format($promotion->discount_value) . '₫' }}

                                                                        <small
                                                                            style="color: #666">{{ $promotion->description }}</small>
                                                                        @if ($promotion->end_date)
                                                                            <small style="color: #888">HSD:
                                                                                {{ \Carbon\Carbon::parse($promotion->end_date)->format('d/m/Y') }}</small>
                                                                        @endif
                                                                    </div>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>



                                                    <div id="payment" class="woocommerce-checkout-payment1">
                                                        <div class="form-row place-order mt-4">
                                                            <button type="submit" class="button alt"
                                                                name="woocommerce_checkout_place_order" id="place_order"
                                                                value="Place order">
                                                                Xác nhận thanh toán
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>






                                </div>


                            </div>
                        </div><!-- .entry-content -->
            </div>
            </article>


            </main><!-- #main -->
        </div>
    </div><!-- #primary -->
    </div>
@endsection

<script>
    const GHN_CONFIG = {
        token: "{{ config('services.ghn.token') }}",
        shop_id: {{ config('services.ghn.shop_id') }},
        from_district: {{ config('services.ghn.from_district') }},
        from_ward: "{{ config('services.ghn.from_ward') }}"
    };

    const CART_TOTAL = {{ $total }};

    const CART_ITEMS = {!! json_encode(
        $selectedItems->values()->map(function ($item) {
            $values = $item->product->attributeValues->pluck('value', 'attribute_id');
            return [
                'name' => $item->product->name,
                'quantity' => (int) $item->quantity,
                'height' => (int) ($values[6] ?? 0),
                'weight' => (int) ($values[2] ?? 0),
                'length' => (int) ($values[4] ?? 0),
                'width' => (int) ($values[5] ?? 0),
            ];
        }),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
    ) !!};
</script>

@push('scripts')
    <script>
        const DEFAULT_SHIP_FEE = Math.floor(Math.random() * (35000 - 23000 + 1)) + 23000;


        function formatVNDWithComma(amount) {
            return amount.toLocaleString('vi-VN').replace(/\./g, ',') + ' đ';
        }

        function updateShippingUI(shipFee) {
            const grandTotal = CART_TOTAL + shipFee;
            document.getElementById('ship_fee_value').textContent = formatVNDWithComma(shipFee);
            document.getElementById('grand_total').textContent = formatVNDWithComma(grandTotal);

            const feeInput = document.getElementById('ship_fee');
            if (feeInput) feeInput.value = shipFee;
        }

        // Dùng mặc định ban đầu
        updateShippingUI(DEFAULT_SHIP_FEE);

        document.addEventListener("DOMContentLoaded", function() {
            const selectAddress = document.querySelector('select[name="address_id"]');
            if (!selectAddress) return;

            function calculateTotalDimensions(items) {
                // Nếu không phải mảng nhưng là object ⇒ ép về mảng các value
                if (!Array.isArray(items) && typeof items === 'object' && items !== null) {
                    items = Object.values(items);
                    console.warn('Đã ép object có key → array:', items);
                }

                let total = {
                    height: 0,
                    length: 0,
                    width: 0,
                    weight: 0
                };

                items.forEach(item => {
                    total.height += (item.height || 0) * (item.quantity || 1);
                    total.length += (item.length || 0) * (item.quantity || 1);
                    total.width += (item.width || 0) * (item.quantity || 1);
                    total.weight += (item.weight || 0) * (item.quantity || 1);
                });

                return total;
            }



            function fetchShippingFee(service_id, service_type_id, toDistrictId, toWardCode) {
                const totals = calculateTotalDimensions(CART_ITEMS);

                const body = {
                    from_district_id: GHN_CONFIG.from_district,
                    from_ward_code: GHN_CONFIG.from_ward,
                    service_id,
                    service_type_id,
                    to_district_id: parseInt(toDistrictId),
                    to_ward_code: toWardCode,
                    height: totals.height,
                    length: totals.length,
                    weight: totals.weight,
                    width: totals.width,
                    insurance_value: CART_TOTAL,
                    cod_failed_amount: 2000,
                    coupon: null,
                    items: CART_ITEMS
                };

                fetch("https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "token": GHN_CONFIG.token,
                            "ShopId": GHN_CONFIG.shop_id
                        },
                        body: JSON.stringify(body)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.code == 200 && data.data?.total) {
                            updateShippingUI(data.data.total);
                        } else {
                            console.warn("GHN trả về không hợp lệ. Giữ nguyên phí mặc định.");
                        }
                    })
                    .catch(err => {
                        console.error("Lỗi khi gọi API GHN:", err);
                    });
            }

            function fetchAvailableServices(toDistrictId, toWardCode) {
                fetch('https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'token': GHN_CONFIG.token
                        },
                        body: JSON.stringify({
                            shop_id: GHN_CONFIG.shop_id,
                            from_district: GHN_CONFIG.from_district,
                            to_district: parseInt(toDistrictId)
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.code === 200 && Array.isArray(data.data) && data.data.length > 0) {
                            const service = data.data[0];
                            fetchShippingFee(service.service_id, service.service_type_id, toDistrictId,
                                toWardCode);
                        } else {
                            console.warn("Không có dịch vụ GHN phù hợp. Giữ phí mặc định.");
                        }
                    })
                    .catch(err => {
                        console.error("Lỗi khi gọi API dịch vụ GHN:", err);
                    });
            }

            const defaultOption = selectAddress.selectedOptions[0];
            if (defaultOption) {
                const district = defaultOption.getAttribute('data-district');
                const ward = defaultOption.getAttribute('data-ward');
                if (district && ward) {
                    fetchAvailableServices(district, ward);
                }
            }

            selectAddress.addEventListener('change', function() {
                const selected = this.selectedOptions[0];
                const district = selected.getAttribute('data-district');
                const ward = selected.getAttribute('data-ward');
                if (district && ward) {
                    fetchAvailableServices(district, ward);
                }
            });
            document.getElementById('check_coupon_btn').addEventListener('click', () => {
                const code = document.getElementById('coupon_code').value;
                const resultEl = document.getElementById('coupon_result');

                if (!code) {
                    resultEl.innerText = '⚠️ Vui lòng nhập mã.';
                    resultEl.style.color = 'red';
                    return;
                }

                fetch(`/api/check-coupon?code=${encodeURIComponent(code)}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.valid) {
                            const discountText = data.type === 'percent' ?
                                `${data.value}%` :
                                `${number_format(data.value)}₫`;

                            resultEl.innerText = `Mã giảm giá ${discountText} tổng đơn`;
                            resultEl.style.color = 'green';
                        } else {
                            resultEl.innerText = ' Mã không hợp lệ hoặc đã hết hạn.';
                            resultEl.style.color = 'red';
                        }
                    })
                    .catch(() => {
                        resultEl.innerText = '⚠️ Lỗi khi kiểm tra mã.';
                        resultEl.style.color = 'red';
                    });
            });

            // Format tiền VNĐ
            function number_format(number) {
                return new Intl.NumberFormat('vi-VN').format(number);
            }


        });
    </script>
@endpush
