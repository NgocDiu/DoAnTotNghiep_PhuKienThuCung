
         
                <div class="base-mini-cart-refresh">
                    @if ($quote)
                        <div class="tmcore-fsb tmcore-fsb--preload tm-is-success tm-progress-full"
                            data-message="Congratulations! Your order is eligible for <strong>FREE Delivery.</strong>"
                            data-percent="100%" data-classes=" tm-is-success tm-progress-full"
                            style="--fsb-percent: 100%;">
                        </div>

                        @if ($items)
                            <ul class="woocommerce-mini-cart cart_list product_list_widget">
                                @foreach ($items as $item)
                                    @php
                                        $img = substr($item->image, 8);
                                        $additional_data = json_decode($item->additional_data);
                                    @endphp
                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                        <a href="javascript:void(0);" class="remove remove_from_cart_button"
                                            aria-label="Remove"
                                            data-product_id="{{ $item->product_id }}"
                                            data-cart_item_key="{{ $item->id }}"
                                            onclick="delItem({{ $item->id }});">×</a>

                                        <a href="{{ url('sp/' . $additional_data->slug) }}">
                                            <img width="300" height="300"
                                                src="{{ resize($img, config('settings.pc_img_cart_width'), config('settings.pc_img_cart_height')) }}"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                alt="{{ $item->name }}" />
                                            {{ $item->name }}
                                        </a>

                                        <span class="quantity">
                                            {{ (int) $item->qty }}
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi style="padding-left: 10px;"><span class="woocommerce-Price-currencySymbol"></span>
                                                    Giá: {{ format_currency($item->price) }}</bdi>
                                            </span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="widget_shopping_cart_footer">
                            <p class="woocommerce-mini-cart__total total">
                                <strong>Tổng tiền thanh toán:</strong>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol"></span>
                                        {{ format_currency($quote->subtotal) }}</bdi>
                                </span>
                            </p>

                            <p class="woocommerce-mini-cart__buttons buttons">
                                <a href="{{ route('checkout.cart') }}" class="button wc-forward">Xem giỏ hàng</a>
                                <a href="{{ url('checkout') }}" class="button checkout wc-forward" style="background:#cd1818;">Thanh toán</a>
                            </p>
                        </div>
                    @else
                        <div class="woocommerce-mini-cart__empty-message">
                            <h4>Giỏ hàng trống</h4>
                            <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                            <a class="button" href="/">Bắt đầu mua hàng</a>
                        </div>
                    @endif {{-- <-- đóng if ($quote) --}}
                </div>
           
