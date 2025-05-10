<!-- Block 8-->
<section class="elementor-section elementor-top-section elementor-element elementor-element-ea8059f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ea8059f" data-element_type="section">
			<div class="elementor-container elementor-column-gap-no">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a09b78e" data-id="a09b78e" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-daa8ad2 elementor-widget elementor-widget-heading" data-id="daa8ad2" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<h5 class="elementor-heading-title elementor-size-default">Sản phẩm nổi bật</h5>
							</div>
						</div>
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-05797ef elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="05797ef" data-element_type="section">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6361617" data-id="6361617" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-f1ce6f2 elementor-widget elementor-widget-tmcore-products" data-id="f1ce6f2" data-element_type="widget" data-widget_type="tmcore-products.default">
											<div class="elementor-widget-container">
												<div class="woocommerce columns-5 ">
													<div class="woocommerce-carousel splide" data-settings='{"dimensions":"1","navigation":"arrows","autoplayHoverPause":true,"autoplay":false,"autoplay_speed":null,"items":"5","items_laptop":"4","items_tablet":"4","items_mobile":"3","loop":false,"gap":20,"gap_laptop":20,"gap_tablet":20,"gap_mobile":15,"product_layout":"grid"}'>
														<div class="splide__track">
															<ul class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-md-col-4 grid-lg-col-5 woo-archive-always-visible woo-archive-btn-button align-buttons-bottom  woo-archive-image-hover-fade">
                                                            @if($populars)
                                                            @foreach($populars as $popular)
                                                                @php 
                                                                    $price = $popular->getPrice->price;
                                                                    $sale = $popular->getSalePrice;
                                                                @endphp
                                                                @php $image = substr(getCoverProduct($popular->id), 8); @endphp
                                                                @if($image != "")
																<li class="shimmer entry content-bg loop-entry product type-product post-309 status-publish first instock product_cat-dining-room product_cat-finished-wood-tables product_cat-outdoor-table product_cat-table product_cat-wooden-study-table product_cat-wooden-table-lamp has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes  cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
																	<div class="product-thumbnail">
																		<a href="{{ url('sp/'.$popular->slug) }}" class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image" aria-label="{{ $popular->name }}">
                                                                        @if(isset($popular->getSalePrice) && ($popular->getSalePrice->rule_price > 0 && $popular->getSalePrice->rule_price < $popular->getPrice->price))
                                                                            <div class="product-onsale">
																				<span aria-hidden="true" class="onsale ">-{{calculatorPercent($popular->getSalePrice->rule_price,$popular->getPrice->price)}}%</span>
																			
																			</div>
                                                                        @endif
																			<img loading="lazy" decoding="async" width="300" height="300" src="{{ resize(substr(getCoverProduct($popular->id),8),300,300,0)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $popular->name }}" srcset="{{ resize(substr(getCoverProduct($popular->id),8),300,300,0)}} 300w, {{ resize(substr(getCoverProduct($popular->id),8),159,159,0)}} 150w, {{ resize(substr(getCoverProduct($popular->id),8),768,768,0)}} 768w, {{ resize(substr(getCoverProduct($popular->id),8),600,600,0)}} 600w, {{ resize(substr(getCoverProduct($popular->id),8),100,100,0)}} 100w, {{ resize(substr(getCoverProduct($popular->id),8),96,96,0)}} 96w, {{ resize(substr(getCoverProduct($popular->id),8),460,460,0)}} 460w, {{ resize(substr(getCoverProduct($popular->id),8),236,236,0)}} 236w, {{ resize(substr(getCoverProduct($popular->id),8),118,118,0)}} 118w, {{ resize(substr(getCoverProduct($popular->id),8),296,296,0)}} 296w, {{ resize(substr(getCoverProduct($popular->id),8),148,148,0)}} 148w, {{ resize(substr(getCoverProduct($popular->id),8),1000,1000,0)}} 1000w"
																				sizes="(max-width: 300px) 100vw, 300px" />
		
																	        </a>
																		<div class="product-actions">
		
																		</div>
																	</div>
																	<div class="product-details content-bg entry-content-wrap">
																		<h2 class="woocommerce-loop-product__title"><a href="{{ url('sp/'.$popular->slug) }}" class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">{{ $popular->name }}</a></h2>
																		


                                                                        <span class="price">
                                                                            @if((int)$price > 0)
                                                                            <span class="price">
                                                                            @if(isset($sale) && ($sale->rule_price > 0 && $sale->rule_price < $price) )
                                                                                <del aria-hidden="true">
                                                                                    <span class="woocommerce-Price-amount amount"><bdi>{{format_currency($price)}}</bdi></span>
                                                                                </del> 
                                                                                <ins aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>{{format_currency($sale->rule_price)}}</bdi></span></ins>
                                                                                
                                                                            @else
                                                                                <ins aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>{{format_currency($price)}}</bdi></span></ins>       
                                                                            @endif
																			</span>
                                                                            @else
                                                                            <span class="price">

                                                                            <ins aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>Liên hệ</bdi></span></ins>

                                                                            </span>

                                                                            @endif
                                                                        </span>
		
                                                                        
																    </div>
																</li>
		
                                                                @endif
                                                                    @endforeach
                                                                @endif
															</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</section>
						</div>
					</div>
				</div>
		</section>

		<!--End Block 8-->