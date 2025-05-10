
		<!-- Block 3-->
		<section class="elementor-section elementor-top-section elementor-element elementor-element-908c036 popular-product elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="908c036" data-element_type="section">
			<div class="elementor-container elementor-column-gap-no">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9dfb965" data-id="9dfb965" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-2e51b8c elementor-tabs-h-align-left elementor-tabs-view-horizontal elementor-widget elementor-widget-tmcore-products-tabs" data-id="2e51b8c" data-element_type="widget" data-widget_type="tmcore-products-tabs.default">
							<div class="elementor-widget-container">
								<div class="elementor-tabs" role="tablist">
									<div class="elementor-tabs-wrapper">
										<div class="elementor-tabs-items">
		
											<div id="elementor-tab-title-4851" class="elementor-tab-title elementor-tab-desktop-title elementor-active elementor-repeater-item-fcc10f8" data-tab="1" tabindex="4851" role="tab" aria-controls="elementor-tab-content-4851">
												Sản phẩm mới </div>
		
											<div id="elementor-tab-title-4852" class="elementor-tab-title elementor-tab-desktop-title  elementor-repeater-item-5850c0e" data-tab="2" tabindex="4852" role="tab" aria-controls="elementor-tab-content-4852">
												Quan tâm nhiều  </div>
		
											<div id="elementor-tab-title-4853" class="elementor-tab-title elementor-tab-desktop-title  elementor-repeater-item-43f1a37" data-tab="3" tabindex="4853" role="tab" aria-controls="elementor-tab-content-4853">
												Bán chạy </div>
										</div>
									</div>
									<div class="elementor-tabs-content-wrapper" data-settings="{&quot;dimensions&quot;:&quot;1&quot;,&quot;navigation&quot;:&quot;arrows&quot;,&quot;autoplayHoverPause&quot;:true,&quot;autoplay&quot;:false,&quot;autoplayTimeout&quot;:null,&quot;autoplay_speed&quot;:null,&quot;items&quot;:&quot;5&quot;,&quot;items_laptop&quot;:&quot;4&quot;,&quot;items_tablet&quot;:&quot;4&quot;,&quot;items_mobile&quot;:&quot;3&quot;,&quot;loop&quot;:true,&quot;gap&quot;:20,&quot;gap_laptop&quot;:20,&quot;gap_tablet&quot;:20,&quot;gap_mobile&quot;:15}">
		
										<div id="elementor-tab-content-4851" class="elementor-tab-content elementor-clearfix elementor-active elementor-repeater-item-fcc10f8" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-4851">
											<div class="woocommerce columns-5 ">
												<div class="woocommerce-carousel splide" data-settings=''>
													<div class="splide__track">
														<ul class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-md-col-4 grid-lg-col-5 woo-archive-always-visible woo-archive-btn-button align-buttons-bottom  woo-archive-image-hover-fade">
                                                    @if($lastests)
                                                    @foreach($lastests as $lastest)
                                                        @php 
                                                            $price = $lastest->getPrice->price;
                                                            $sale = $lastest->getSalePrice;
                                                            $image = substr(getCoverProduct($lastest->id), 8); 
                                                        @endphp
                                                        @if($image != "")
                                                            <li class="shimmer entry content-bg loop-entry product type-product post-309 status-publish instock product_cat-dining-room product_cat-finished-wood-tables product_cat-outdoor-table product_cat-table product_cat-wooden-study-table product_cat-wooden-table-lamp has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable has-default-attributes  cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                                                                <div class="product-thumbnail">
                                                                    <a href="{{ url('sp/'.$lastest->slug) }}" class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
                                                                        aria-label="{{ $lastest->name }}">
                                                                        @if(isset($popular->getSalePrice) && ($popular->getSalePrice->rule_price > 0 && $popular->getSalePrice->rule_price < $popular->getPrice->price))
                                                                            <div class="product-onsale">
																				<span aria-hidden="true" class="onsale ">-{{calculatorPercent($popular->getSalePrice->rule_price,$popular->getPrice->price)}}%</span>
																			
																			</div>
                                                                        @endif
                                                                        <img loading="lazy" decoding="async" width="300" height="300" src="{{ resize($image, 300, 300, 0) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="{{ resize($image, 300, 300, 0) }} 300w, {{ resize($image, 150, 150, 0) }} 150w, {{ resize($image, 768, 768, 0) }} 768w, {{ resize($image, 600, 600, 0) }} 600w, {{ resize($image, 100, 100, 0) }} 100w, {{ resize($image, 96, 96, 0) }} 96w, {{ resize($image, 460, 460, 0) }} 460w, {{ resize($image, 236, 236, 0) }} 236w, {{ resize($image, 118, 118, 0) }} 118w, {{ resize($image, 296, 296, 0) }} 296w, {{ resize($image, 148, 148, 0) }} 148w, {{ resize($image, 1000, 1000, 0) }} 1000w"
                                                                            sizes="(max-width: 300px) 100vw, 300px" />
                                                                            
                                                                        </a>
                                                                
                                                                </div>
                                                                <div class="product-details content-bg entry-content-wrap">
                                                                    <h2 class="woocommerce-loop-product__title">
                                                                        <a href="{{ url('sp/'.$lastest->slug) }}" class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">{{ $lastest->name }}</a>
                                                                    </h2>
                                                                    
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
		
			<div id="elementor-tab-content-4852" class="elementor-tab-content elementor-clearfix  elementor-repeater-item-5850c0e" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-4852" hidden="">
				<div class="woocommerce columns-5 ">
					<div class="woocommerce-carousel splide" data-settings=''>
						<div class="splide__track">
							<ul class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-md-col-4 grid-lg-col-5 woo-archive-always-visible woo-archive-btn-button align-buttons-bottom  woo-archive-image-hover-fade">
                            @if($populars)
                                @foreach($populars as $popular)
                                    @php 
                                        $price = $popular->getPrice->price;
                                        $sale = $popular->getSalePrice;
                                        $image = substr(getCoverProduct($popular->id), 8); 
                                    @endphp
                                    @if($image != "")
								<li class="shimmer entry content-bg loop-entry product type-product post-234 status-publish first instock product_cat-coffee-table product_cat-daybeds product_cat-dining-room product_cat-finished-wood-tables product_cat-nesting-table product_cat-outdoor-table product_cat-recliner product_cat-storage product_cat-table product_cat-wooden-table-lamp has-post-thumbnail sale shipping-taxable purchasable product-type-variable has-default-attributes  cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
									<div class="product-thumbnail">
										<a href="{{ url('sp/'.$popular->slug) }}" class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image"
											aria-label="{{ $popular->name }}">
                                            @if(isset($popular->getSalePrice) && ($popular->getSalePrice->rule_price > 0 && $popular->getSalePrice->rule_price < $popular->getPrice->price))
                                                <div class="product-onsale">
                                                    <span aria-hidden="true" class="onsale ">-{{calculatorPercent($popular->getSalePrice->rule_price,$popular->getPrice->price)}}%</span>
                                                
                                                </div>
                                            @endif
											<img loading="lazy" decoding="async" width="300" height="300" src="{{ resize($image, 300, 300, 0) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="{{ resize($image, 300, 300, 0) }} 300w, {{ resize($image, 150, 150, 0) }} 150w, {{ resize($image, 768, 768, 0) }} 768w, {{ resize($image, 600, 600, 0) }} 600w, {{ resize($image, 100, 100, 0) }} 100w, {{ resize($image, 96, 96, 0) }} 96w, {{ resize($image, 460, 460, 0) }} 460w, {{ resize($image, 120, 120, 0) }} 120w, {{ resize($image, 60, 60, 0) }} 60w, {{ resize($image, 236, 236, 0) }} 236w, {{ resize($image, 118, 118, 0) }} 118w, {{ resize($image, 296, 296, 0) }} 296w, {{ resize($image, 148, 148, 0) }} 148w, {{ resize($image, 1000, 1000, 0) }} 1000w"
												sizes="(max-width: 300px) 100vw, 300px" /></a>
										
									</div>
									<div class="product-details content-bg entry-content-wrap">
										<h2 class="woocommerce-loop-product__title">
                                            <a href="{{ url('sp/'.$popular->slug) }}" class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">{{ $popular->name }}</a></h2>
									
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
		
			<div id="elementor-tab-content-4853" class="elementor-tab-content elementor-clearfix  elementor-repeater-item-43f1a37" data-tab="3" role="tabpanel" aria-labelledby="elementor-tab-title-4853" hidden="">
				<div class="woocommerce columns-5 ">
					<div class="woocommerce-carousel splide" data-settings=''>
						<div class="splide__track">
							<ul class="products content-wrap product-archive grid-cols grid-ss-col-2 grid-sm-col-3 grid-md-col-4 grid-lg-col-5 woo-archive-always-visible woo-archive-btn-button align-buttons-bottom  woo-archive-image-hover-fade">
                            @if($best_sellers)
                                @foreach($best_sellers as $best_seller)
                                    @php 
                                        $price = $best_seller->getPrice->price;
                                        $sale = $best_seller->getSalePrice;
                                        $image = substr(getCoverProduct($best_seller->id), 8); 
                                    @endphp
                                    @if($image != "")
							
                            <li class="shimmer entry content-bg loop-entry product type-product post-223 status-publish first instock product_cat-baroque product_cat-corner product_cat-decor-items product_cat-dining-room product_cat-hinged product_cat-mirrored product_cat-single product_cat-walk-in product_cat-wooden-table-lamp has-post-thumbnail featured shipping-taxable purchasable product-type-variable has-default-attributes  cart-button-1 action-style-default product-hover-style1 image-hover-icon hover-right">
                            <div class="product-thumbnail">
                                <a href="{{ url('sp/'.$best_seller->slug) }}" class="woocommerce-loop-image-link woocommerce-LoopProduct-link woocommerce-loop-product__link product-has-hover-image" aria-label="{{ $best_seller->name }}">
                                    <img loading="lazy" decoding="async" width="300" height="300" src="{{ resize($image, 300, 300, 0) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="{{ resize($image, 300, 300, 0) }} 300w, {{ resize($image, 150, 150, 0) }} 150w, {{ resize($image, 768, 768, 0) }} 768w, {{ resize($image, 600, 600, 0) }} 600w, {{ resize($image, 100, 100, 0) }} 100w, {{ resize($image, 96, 96, 0) }} 96w, {{ resize($image, 460, 460, 0) }} 460w, {{ resize($image, 120, 120, 0) }} 120w, {{ resize($image, 60, 60, 0) }} 60w, {{ resize($image, 236, 236, 0) }} 236w, {{ resize($image, 118, 118, 0) }} 118w, {{ resize($image, 700, 700, 0) }} 700w, {{ resize($image, 349, 346, 0) }} 346w, {{ resize($image, 173, 173, 0) }} 173w, {{ resize($image, 296, 296, 0) }} 296w, {{ resize($image, 148, 148, 0) }} 148w, {{ resize($image, 1000, 1000, 0) }} 1000w" sizes="(max-width: 300px) 100vw, 300px" />
                                    
                                </a>

                            </div>
                            <div class="product-details content-bg entry-content-wrap">
                                <h2 class="woocommerce-loop-product__title">
                                    <a href="{{ url('sp/'.$best_seller->slug) }}" class="woocommerce-LoopProduct-link-title woocommerce-loop-product__title_ink">{{ $best_seller->name }}</a>
                                </h2>

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
			</div>
			</div>
			</div>
		</section>

		<!-- End Block 3-->