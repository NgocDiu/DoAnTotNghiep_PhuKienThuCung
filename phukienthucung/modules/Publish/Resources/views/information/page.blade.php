@extends('layouts.1column')
@section('title', $title)
@section('description', config('settings.meta_description'))
@section('image',url('themes/frontend/hunglan/assets/images/op-hung-lan.jpg'))
@section('image_width',480)
@section('image_height',360)
@section('styles')
<style>

</style>
@stop
@section('content')
    <div id="inner-wrap" class="wrap hfeed bt-clear">
        <section role="banner" class="entry-hero page-hero-section entry-hero-layout-standard">
        <div class="entry-hero-container-inner">
            <div class="hero-section-overlay"></div>
            <div class="hero-container site-container">
                <header class="entry-header page-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                    <nav id="base-breadcrumbs" aria-label="Breadcrumbs"  class="base-breadcrumbs">
                    <div class="base-breadcrumb-container">
                        <span>
                        <a href="{{url('/')}}" itemprop="url" class="base-bc-home" ><span>Trang chủ</span></a>
                        </span> 
                        <span class="bc-delimiter">/</span> <span class="base-bread-current">Giới thiệu</span>
                    </div>
                    </nav>
                    <h1 class="entry-title">Giới thiệu</h1>
                </header>
                <!-- .entry-header -->
            </div>
        </div>
        </section>
        <!-- .entry-hero -->
        <div id="primary" class="content-area">
        <div class="content-container site-container">
            <main id="main" class="site-main" role="main">
                <div class="woocommerce base-woo-messages-none-woo-pages woocommerce-notices-wrapper"></div>
                <div class="content-wrap">
                    <article id="post-25" class="entry content-bg single-entry post-footer-area-boxed post-25 page type-page status-publish hentry">
                    <div class="entry-content-wrap">
                        <div class="entry-content single-content">
                            <div data-elementor-type="wp-page" data-elementor-id="25" class="elementor elementor-25">
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-7c1db74 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7c1db74" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-no">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6848f97" data-id="6848f97" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-3466b0b elementor-widget elementor-widget-heading" data-id="3466b0b" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default" style="margin-top: 30px">Thông tin về chúng tôi</h2>
                                            </div>
                                            </div>
                                            <div class="elementor-element elementor-element-b964bf1 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="b964bf1" data-element_type="widget" data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <p class="bst-adv-heading_586d74-db wp-block-base-advancedheading" data-bsb-block="bsb-adv-heading_586d74-db">{!!$page->description!!}</p>
                                            </div>
                                            </div>
                                            <div class="elementor-element elementor-element-66f875d elementor-align-center elementor-widget elementor-widget-button" data-id="66f875d" data-element_type="widget" data-widget_type="button.default">
                                            <div class="elementor-widget-container" style="margin-bottom: 20px;">
                                                <div class="elementor-button-wrapper">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm" href="{{url('lien-he')}}" style="background:#cd1818;">
                                                    <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">LIÊN HỆ VỚI CHÚNG TÔI</span>
                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </section>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </div>
                    </article>
                    <!-- #post-25 -->
                </div>
            </main>
            <!-- #main -->
        </div>
        </div>
        <!-- #primary -->
    </div>

@stop 
@section('scripts')

@endsection