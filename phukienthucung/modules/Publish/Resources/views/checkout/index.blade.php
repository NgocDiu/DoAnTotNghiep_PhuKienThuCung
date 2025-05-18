@extends('publish::layouts.4column')

@section('content')




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

                                    <form class="mt-2" action="{{ route('checkout.process') }}" method="POST">
                                        @csrf

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



                                        <div id="order_review" class="woocommerce-checkout-review-order"
                                            style="margin-top: 10px">
                                            <h2 id="order_review_title" style="">Đơn hàng của bạn</h2>
                                            <table class="shop_table woocommerce-checkout-review-order-table1">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Sản phẩm</th>
                                                        <th class="product-total">Tiền hàng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cart->items as $item)
                                                        @php
                                                            $product = $item->product;
                                                            $quantity = $item->quantity;
                                                            $price = $product->is_discount
                                                                ? $product->discount_price
                                                                : $product->price;
                                                            $lineTotal = $price * $quantity;

                                                            // Lấy ảnh chính hoặc ảnh mặc định
                                                            $image = asset(
                                                                $product->images->firstWhere('is_main', 1)
                                                                    ?->image_url ?? 'images/no-image.png',
                                                            );
                                                        @endphp

                                                        <tr class="cart_item">
                                                            <td class="product-name"
                                                                style="display: flex;flex-direction: row;align-items: center">
                                                                <span class="checkout-review-product-image"
                                                                    style="position: relative;margin: 0 10px">
                                                                    <img loading="lazy" decoding="async" width="80"
                                                                        height="80" src="{{ $image }}"
                                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                        alt="{{ $product->name }}">
                                                                    <strong class="product-quantity"
                                                                        style="
                                                                        left: 67px;
                                                                        top: -9px;
                                                                        position: absolute;
                                                                        padding: 1px 8px;
                                                                        background-color: #cd1818;
                                                                        color: white;
                                                                        border-radius: 50%;
                                                                    ">{{ $quantity }}</strong>
                                                                </span>

                                                                <span class="checkout-review-product-name"
                                                                    style="margin: 0 10px">{{ $product->name }}</span>

                                                                <span class="checkout-review-product-price price">
                                                                    @if ($product->is_discount)
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                {{ number_format($product->price) }}₫
                                                                            </span>
                                                                        </del>
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                {{ number_format($product->discount_price) }}₫
                                                                            </span>
                                                                        </ins>
                                                                    @else
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            {{ number_format($product->price) }}₫
                                                                        </span>
                                                                    @endif
                                                                </span>

                                                            </td>

                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <bdi>{{ number_format($lineTotal) }}₫</bdi>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>

                                                    <tr class="cart-subtotal">
                                                        <th>Tiền hàng</th>
                                                        <td>
                                                            <span class="woocommerce-Price-amount amount"
                                                                id="cart_total">{{ number_format($total) }}
                                                                đ</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart-subtotal">
                                                        <th>Phí vận chuyển</th>
                                                        <td>

                                                            <span class="woocommerce-Price-amount amount"
                                                                id="ship_fee_value">đ</span>
                                                            <input type="hidden" name="ship_fee" id="ship_fee">
                                                        </td>
                                                    </tr>


                                                    <tr class="order-total">
                                                        <th>Tổng thanh toán</th>
                                                        <td><strong>

                                                                <span class="woocommerce-Price-amount amount"
                                                                    id="grand_total">đ</span>
                                                            </strong>
                                                        </td>
                                                    </tr>


                                                </tfoot>
                                            </table>




                                        </div>





                                        <h4>Phương thức thanh toán</h4>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                value="cod" id="cod" checked>
                                            <label class="form-check-label" for="cod">
                                                Thanh toán khi nhận hàng (COD)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                value="vnpay" id="vnpay">
                                            <label class="form-check-label" for="vnpay">
                                                Thanh toán qua VNPAY
                                            </label>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="note">Ghi chú đơn hàng (tùy chọn)</label>
                                            <textarea class="form-control" name="note" rows="3"></textarea>
                                        </div>
                                        <div id="payment" class="woocommerce-checkout-payment1">

                                            <div class="form-row place-order">

                                                <button type="submit" class="button alt"
                                                    name="woocommerce_checkout_place_order" id="place_order"
                                                    value="Place order" data-value="Place order">Xác nhận thanh
                                                    toán</button>


                                            </div>
                                        </div>

                                    </form>





                                </div>
                                </form>

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
        $cart->items->map(function ($item) {
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
        function formatVNDWithComma(amount) {
            return amount.toLocaleString('vi-VN').replace(/\./g, ',') + ' đ';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const selectAddress = document.querySelector('select[name="address_id"]');
            if (!selectAddress) return;

            function calculateTotalDimensions(items) {
                let total = {
                    height: 0,
                    length: 0,
                    width: 0,
                    weight: 0
                };

                items.forEach(item => {
                    total.height += item.height * item.quantity;
                    total.length += item.length * item.quantity;
                    total.width += item.width * item.quantity;
                    total.weight += item.weight * item.quantity;
                });

                return total;
            }

            function fetchShippingFee(service_id, service_type_id, toDistrictId, toWardCode) {
                const totals = calculateTotalDimensions(CART_ITEMS);

                const body = {
                    from_district_id: GHN_CONFIG.from_district,
                    from_ward_code: GHN_CONFIG.from_ward,
                    service_id: service_id,
                    service_type_id: service_type_id,
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
                        if (data.code == 200) {
                            const shipFee = data.data.total;

                            // Cập nhật giao diện


                            const grandTotal = CART_TOTAL + shipFee;
                            document.getElementById('ship_fee_value').textContent = formatVNDWithComma(shipFee);
                            document.getElementById('grand_total').textContent = formatVNDWithComma(grandTotal);

                            // Gán vào input ẩn
                            const feeInput = document.getElementById('ship_fee');
                            if (feeInput) {
                                feeInput.value = shipFee;
                            }
                        } else {
                            console.warn("Không tính được phí GHN.");
                        }
                    })
                    .catch(err => {
                        console.error("Lỗi khi gọi API GHN phí:", err);
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
                        if (data.code === 200 && Array.isArray(data.data)) {
                            const service = data.data[0];
                            fetchShippingFee(service.service_id, service.service_type_id, toDistrictId,
                                toWardCode);
                        } else {
                            console.warn("Không có dịch vụ GHN phù hợp.");
                        }
                    })
                    .catch(err => {
                        console.error("Lỗi khi gọi API dịch vụ GHN:", err);
                    });
            }

            // Gọi khi vừa load
            const defaultOption = selectAddress.selectedOptions[0];
            if (defaultOption) {
                const district = defaultOption.getAttribute('data-district');
                const ward = defaultOption.getAttribute('data-ward');
                if (district && ward) {
                    fetchAvailableServices(district, ward);
                }
            }

            // Gọi lại khi chọn địa chỉ khác
            selectAddress.addEventListener('change', function() {
                const selected = this.selectedOptions[0];
                const district = selected.getAttribute('data-district');
                const ward = selected.getAttribute('data-ward');
                if (district && ward) {
                    fetchAvailableServices(district, ward);
                }
            });
        });
    </script>
@endpush
