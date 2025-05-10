<!-- Block 6-->
<section class="elementor-section elementor-top-section elementor-element elementor-element-37754a8 home-category elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="37754a8" data-element_type="section"
		data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
		<div class="elementor-container elementor-column-gap-no">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3dfed20" data-id="3dfed20" data-element_type="column">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-3286a47 elementor-widget elementor-widget-heading" data-id="3286a47" data-element_type="widget" data-widget_type="heading.default">
						<div class="elementor-widget-container">
							<h5 class="elementor-heading-title elementor-size-default">Danh mục tiêu biểu</h5>
						</div>
					</div>
					<div class="elementor-element elementor-element-7ae1e36 product-cat-style-3 elementor-widget elementor-widget-tmcore-product-categories-carousel" data-id="7ae1e36" data-element_type="widget" data-widget_type="tmcore-product-categories-carousel.default">
						<div class="elementor-widget-container">
							<div class="woocommerce categories-wrap columns-5 carousel">
								<div class="woocommerce-carousel splide" data-settings='{"dimensions":1,"navigation":"arrows","autoplayHoverPause":true,"autoplay":false,"autoplay_speed":null,"items":"5","items_laptop":"5","items_tablet":"4","items_mobile":"3","column_minimum":"2","loop":false,"gap":30,"gap_laptop":20,"gap_tablet":20,"gap_mobile":15,"categories_style":"3"}'>
									<div class="splide__track">
										<ul class="products categories content-wrap grid-cols splide__list">
                                        @if($categories)
											@foreach($categories as $category)
											<li class="shimmercat product category cat-35 product-cat splide__slide">
												<div class="cat-image">
													<a class="image-wrap link_category_product" href="{{ url('cat/'. $category->slug) }}" title="{{ $category->name }}">
														<img loading="lazy" decoding="async" width="216" height="216" src="{{ url('storage/catalog/category/' . $category->image_thumbnail) }}" class="attachment-full size-full" alt="{{ $category->name }}" srcset="{{ url('storage/catalog/category/' . $category->image_thumbnail) }} 216w, {{ url('storage/catalog/category/' . $category->image_thumbnail) }} 150w, {{ url('storage/catalog/category/' . $category->image_thumbnail) }} 100w, {{ url('storage/catalog/category/' . $category->image_thumbnail) }} 96w" sizes="(max-width: 216px) 100vw, 216px" /></a>                                                
												</div>
												<div class="cat-contents">
													<div class="cat-title"><a href="#" title="{{ $category->name }}">{{ $category->name }}</a></div>
													
												</div>
											</li>
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

		<!--End Block 6-->