@extends('layouts.1column')
@section('title', $title)
@section('description', config('settings.meta_description'))
@section('image', url('themes/frontend/hunglan/assets/images/op-hung-lan.jpg'))
@section('image_width', 480)
@section('image_height', 360)
@section('styles')
    <style>
        .text-danger {
            color: red
        }

        #contact_success {
            display: none;
            /* Ẩn ban đầu */
            margin-top: 15px;
            padding: 12px 20px;
            margin: 10px 0;
            background-color: #d4edda;
            /* nền xanh nhạt */
            color: #2e7d32;
            /* chữ xanh đậm */
            border: 1px solid #c3e6cb;
            /* viền xanh nhạt */
            border-radius: 5px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
        }

        #contact_success.show {
            display: block;
            /* Khi có class show thì hiện ra */
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
@stop
@section('content')
    <section role="banner" class="entry-hero page-hero-section entry-hero-layout-standard">
        <div class="entry-hero-container-inner">
            <div class="hero-section-overlay"></div>
            <div class="hero-container site-container">
                <header
                    class="entry-header page-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                    <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                        <div class="base-breadcrumb-container"><span><a href="{{ url('/') }}" itemprop="url"
                                    class="base-bc-home"><span>Trang chủ</span></a>
                            </span> <span class="bc-delimiter">/</span> <span class="base-bread-current">Liên hệ</span>
                        </div>
                    </nav>
                    <h1 class="entry-title">Liên hệ</h1>
                </header>
                <!-- .entry-header -->
            </div>
        </div>
    </section>

    <div id="primary" class="content-area" style="margin-top: 48px;margin-bottom: 48px">

        <div class="content-container site-container">
            <div id="contact_success" class="content-container">

            </div>
            <main id="main" class="site-main" role="main">
                <div class="woocommerce base-woo-messages-none-woo-pages woocommerce-notices-wrapper"></div>
                <div class="content-wrap">
                    <article id="post-26"
                        class="entry content-bg single-entry post-footer-area-boxed post-26 page type-page status-publish hentry">
                        <div class="entry-content-wrap">

                            <div class="entry-content single-content">
                                <div data-elementor-type="wp-page" data-elementor-id="26" class="elementor elementor-26">
                                    <section
                                        class="elementor-section elementor-top-section elementor-element elementor-element-4d7d907 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="4d7d907" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-75 elementor-top-column elementor-element elementor-element-9d96a1b"
                                                data-id="9d96a1b" data-element_type="column">
                                                <div id="map-canvas" style="height: 100%; width: 100%;"></div>
                                            </div>
                                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-5c96c19"
                                                data-id="5c96c19" data-element_type="column"
                                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-0db544b elementor-widget elementor-widget-heading"
                                                        data-id="0db544b" data-element_type="widget"
                                                        data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">Liên
                                                                hệ với chúng tôi</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-5721ac0 elementor-widget elementor-widget-heading"
                                                        data-id="5721ac0" data-element_type="widget"
                                                        data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <span class="elementor-heading-title elementor-size-default">Nếu
                                                                bạn muốn liên hệ trực tiếp với chúng tôi, vui lòng điền vào
                                                                mẫu dưới đây -</span>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-ee042b6 elementor-widget-mobile__width-inherit contact-form elementor-widget elementor-widget-shortcode"
                                                        data-id="ee042b6" data-element_type="widget"
                                                        data-widget_type="shortcode.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-shortcode">
                                                                <div class="wpcf7 no-js" id="wpcf7-f55-p26-o1"
                                                                    lang="en-US" dir="ltr" data-wpcf7-id="55">
                                                                    <div class="screen-reader-response">
                                                                        <p role="status" aria-live="polite"
                                                                            aria-atomic="true"></p>
                                                                        <ul></ul>
                                                                    </div>
                                                                    <form id="contact_form" action="" method="post"
                                                                        class="wpcf7-form init" aria-label="Contact form"
                                                                        novalidate="novalidate" data-status="init">
                                                                        @csrf
                                                                        <div style="display: none;">
                                                                            <input type="hidden" name="_wpcf7"
                                                                                value="55">
                                                                            <input type="hidden" name="_wpcf7_version"
                                                                                value="6.0.4">
                                                                            <input type="hidden" name="_wpcf7_locale"
                                                                                value="en_US">
                                                                            <input type="hidden" name="_wpcf7_unit_tag"
                                                                                value="wpcf7-f55-p26-o1">
                                                                            <input type="hidden"
                                                                                name="_wpcf7_container_post" value="26">
                                                                            <input type="hidden"
                                                                                name="_wpcf7_posted_data_hash"
                                                                                value="">
                                                                        </div>
                                                                        <p><label> Họ tên *<br>
                                                                                <span class="wpcf7-form-control-wrap"
                                                                                    data-name="your-name"><input
                                                                                        size="40" maxlength="400"
                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                        autocomplete="name"
                                                                                        aria-required="true"
                                                                                        aria-invalid="false"
                                                                                        value="" type="text"
                                                                                        name="fullname">
                                                                                    <span id="fullname_error"
                                                                                        class="text-danger"></span></span>
                                                                            </label>
                                                                        </p>
                                                                        <p><label> Số điện thoại *<br>
                                                                                <span class="wpcf7-form-control-wrap"
                                                                                    data-name="your-name"><input
                                                                                        size="40" maxlength="400"
                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                        autocomplete="name"
                                                                                        aria-required="true"
                                                                                        aria-invalid="false"
                                                                                        value="" type="text"
                                                                                        name="telephone">
                                                                                    <span id="telephone_error"
                                                                                        class="text-danger"></span></span>
                                                                            </label>
                                                                        </p>
                                                                        <p><label> Email<br>
                                                                                <span class="wpcf7-form-control-wrap"
                                                                                    data-name="your-email"><input
                                                                                        size="40" maxlength="400"
                                                                                        class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                                                                                        autocomplete="email"
                                                                                        aria-required="true"
                                                                                        aria-invalid="false"
                                                                                        value="" type="email"
                                                                                        name="email">
                                                                                </span>
                                                                                <span id="email_error"
                                                                                    class="text-danger"></span></label>
                                                                        </p>
                                                                        <p><label> Tiêu đề *<br>
                                                                                <span class="wpcf7-form-control-wrap"
                                                                                    data-name=""><input size="40"
                                                                                        maxlength="400"
                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                        autocomplete="name"
                                                                                        aria-required="true"
                                                                                        aria-invalid="false"
                                                                                        value="" type="text"
                                                                                        name="subject"></span>
                                                                                <span id="subject_error"
                                                                                    class="text-danger"></label>
                                                                        </p>
                                                                        <p><label> Tin nhắn của bạn *<br>
                                                                                <span class="wpcf7-form-control-wrap"
                                                                                    data-name="">
                                                                                    <textarea cols="40" rows="10" maxlength="2000" class="wpcf7-form-control wpcf7-textarea"
                                                                                        aria-invalid="false" name="message"></textarea>
                                                                                    <span id="message_error"
                                                                                        class="text-danger">
                                                                                    </span> </label>
                                                                        </p>
                                                                        <p><input
                                                                                class="wpcf7-form-control wpcf7-submit has-spinner"
                                                                                id="btn_contact" type="submit"
                                                                                value="Gửi">
                                                                        </p>
                                                                        <div class="wpcf7-response-output"
                                                                            aria-hidden="true"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section
                                        class="elementor-section elementor-top-section elementor-element elementor-element-a6df4b6 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="a6df4b6" data-element_type="section">
                                        @php
                                            $locators = getStorelocators();
                                        @endphp
                                        @if ($locators)
                                            @foreach ($locators as $locator)
                                                <div class="elementor-container elementor-column-gap-default"
                                                    style="margin: 10px 0">
                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-9d7bf58"
                                                        data-id="9d7bf58" data-element_type="column"
                                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-dd18a3c elementor-view-framed elementor-position-left elementor-vertical-align-middle elementor-shape-circle elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                                                data-id="dd18a3c" data-element_type="widget"
                                                                data-widget_type="icon-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-box-wrapper">

                                                                        <div class="elementor-icon-box-icon">
                                                                            <span class="elementor-icon">
                                                                                <i aria-hidden="true"
                                                                                    class="fa-solid fa-store"></i>
                                                                            </span>
                                                                        </div>

                                                                        <div class="elementor-icon-box-content">


                                                                            <p class="elementor-icon-box-description">
                                                                                {{ $locator->name }} </p>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-3d4ba2f"
                                                        data-id="3d4ba2f" data-element_type="column"
                                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-487a555 elementor-view-framed elementor-position-left elementor-vertical-align-middle elementor-shape-circle elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                                                data-id="487a555" data-element_type="widget"
                                                                data-widget_type="icon-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-box-wrapper">

                                                                        <div class="elementor-icon-box-icon">
                                                                            <span class="elementor-icon">
                                                                                <i aria-hidden="true"
                                                                                    class=" fas fa-map-marker-alt"></i>
                                                                            </span>
                                                                        </div>

                                                                        <div class="elementor-icon-box-content">

                                                                            <span class="elementor-icon-box-title">
                                                                                <span>
                                                                                    Địa chỉ : </span>
                                                                            </span>

                                                                            <p class="elementor-icon-box-description">
                                                                                {{ $locator->address }} </p>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-705864a"
                                                        data-id="705864a" data-element_type="column"
                                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-20c2a74 elementor-view-framed elementor-position-left elementor-vertical-align-middle elementor-shape-circle elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                                                data-id="20c2a74" data-element_type="widget"
                                                                data-widget_type="icon-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-box-wrapper">

                                                                        <div class="elementor-icon-box-icon">
                                                                            <span class="elementor-icon">
                                                                                <i aria-hidden="true"
                                                                                    class="fas fa-phone-alt"></i>
                                                                            </span>
                                                                        </div>

                                                                        <div class="elementor-icon-box-content">

                                                                            <span class="elementor-icon-box-title">
                                                                                <span>
                                                                                    Gọi cho chúng tôi : </span>
                                                                            </span>

                                                                            <p class="elementor-icon-box-description">
                                                                                {{ $locator->phone }} </p>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </section>
                                </div>
                            </div><!-- .entry-content -->
                        </div>
                    </article><!-- #post-26 -->

                </div>
            </main><!-- #main -->
        </div>
    </div>

@stop
@section('scripts')
    <script src="{{ url('themes/frontend/hunglan/assets/js/jquery.min.js') }}"></script>
    <script src='https://maps.google.com/maps/api/js?key=AIzaSyC6AZs2DC4cqJfXiHwmnt8hBgRQvA4-5Yg'></script>
    <script>
        (function() {
            var datas, resultSearch;

            resultSearch = (function() {
                'use strict';
                var infoWindowListener;

                class resultSearch {
                    constructor(mapID, lat, lng, items) {
                        var i, item, len, self;
                        self = this;
                        this.initMap(mapID, lat, lng);
                        for (i = 0, len = items.length; i < len; i++) {
                            item = items[i];
                            this.addMaker(item.lat, item.lng, item.content);
                        }
                        if (this._infoWindow) {
                            google.maps.event.addListener(this._infoWindow, 'domready', function() {
                                return jQuery('.infowindow_data_slick').slick({
                                    infinite: true,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-chevron-left"></i></button>',
                                    nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-chevron-right"></i></button>'
                                });
                            });
                        }
                        google.maps.event.addListener(this._map, 'click', function() {
                            if (self._infoWindow) {
                                return self._infoWindow.close();
                            }
                        });
                    }

                    initMap(mapID, lat, lng) {
                        var options;
                        options = {
                            zoom: 11,
                            center: new google.maps.LatLng(lat, lng),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        return this._map = new google.maps.Map(document.getElementById(mapID), options);
                    }

                    addMaker(lat, lng, content) {
                        var self, template;
                        self = this;
                        template = this.templates(content);
                        this._marker = new google.maps.Marker({
                            position: new google.maps.LatLng(lat, lng),
                            map: this._map
                        });
                        return infoWindowListener(self, this._marker, template.slide + template.intro);
                    }

                    templates(content) {
                        var slideRender;
                        slideRender = function(slides) {
                            var slide;
                            return ((function() {
                                var i, len, results;
                                results = [];
                                for (i = 0, len = slides.length; i < len; i++) {
                                    slide = slides[i];
                                    results.push(
                                        `<div><img src=${slide} alt="img"/></div>`);
                                }
                                return results;
                            })()).join('');
                        };
                        return {
                            slide: `<div class="infowindow_wrapper slider infowindow_data_slick" data-slick>${slideRender(content.slides)}</div>`,
                            intro: `<div class="infowindow_wrapper intro">
   <h4>${content.title}</h4>
   <p>${content.summary}</p>
</div>`
                        };
                    }

                };

                resultSearch.prototype._map = null;

                resultSearch.prototype._infoWindow = null;

                infoWindowListener = function(obj, mkr, content) {
                    if (!obj._infoWindow) {
                        obj._infoWindow = new google.maps.InfoWindow({
                            pixelOffset: new google.maps.Size(5, 20)
                        });
                    }
                    return google.maps.event.addListener(mkr, 'click', function() {
                        obj._infoWindow.setContent('<div class="infowindow container-fluid">' +
                            content + '</div>');
                        obj._infoWindow.open(obj._map, mkr);
                        return setTimeout(function() {
                            var gmStyle;
                            gmStyle = jQuery('.gm-style-iw');
                            gmStyle.addClass('custom');
                            gmStyle.next().remove();
                            gmStyle.prev().remove();
                            gmStyle.find('>div').css('overflow', '');
                            return gmStyle.find('>div').find('>div').css('overflow', '');
                        }, 5);
                    });
                };

                return resultSearch;

            }).call(this);

            //Sample Datas
            datas = [{
                    lat: 20.985543,
                    lng: 105.808029,
                    content: {
                        title: 'SHOWROOM HÙNG LAN 2',
                        summary: '215 Đ. Nguyễn Xiển, Tân Triều, Thanh Xuân, Hà Nội, Việt Nam',
                        slides: []
                    }
                },
                {
                    lat: 21.068567,
                    lng: 105.7076047,
                    content: {
                        title: 'SHOWROOM HÙNG LAN 1',
                        summary: 'Khu 6 - Thị trấn Trạm Trôi - Hoài Đức - Hà Nội',
                        slides: []
                    }
                }
            ];

            new resultSearch('map-canvas', 20.985543, 105.808029, datas);

        }).call(this);
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#btn_contact').click(function(e) {
                e.preventDefault(); // Ngăn form submit mặc định

                var eventForm = jQuery("#contact_form");
                var formData = eventForm.serialize();

                jQuery.ajax({
                    type: "POST",
                    url: "{{ route('website.contact_store') }}",
                    data: formData,
                    beforeSend: function() {
                        jQuery('#contact_success').text(''); // Clear thành công
                        jQuery('#btn_contact').prop('disabled', true).val('Đang gửi...');
                        jQuery('.text-danger').text(''); // Clear lỗi cũ
                    },
                    success: function(data) {
                        jQuery('#btn_contact').prop('disabled', false).val('Gửi');

                        if (data.errors) {
                            // Nếu có lỗi trả về từ server
                            if (data.errors.fullname) {
                                jQuery('#fullname_error').text(data.errors.fullname[0]);
                            }
                            if (data.errors.email) {
                                jQuery('#email_error').text(data.errors.email[0]);
                            }
                            if (data.errors.telephone) {
                                jQuery('#telephone_error').text(data.errors.telephone[0]);
                            }
                            if (data.errors.subject) {
                                jQuery('#subject_error').text(data.errors.subject[0]);
                            }
                            if (data.errors.message) {
                                jQuery('#message_error').text(data.errors.message[0]);
                            }
                        }

                        if (data.success) {
                            // Thành công
                            jQuery('#contact_success').text('Gửi liên hệ thành công!').addClass(
                                'show');

                            // Reset form
                            jQuery('#contact_form').find(
                                'input[type="text"], input[type="email"], textarea').val('');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Nếu lỗi hệ thống
                        jQuery('#btn_contact').prop('disabled', false).val('Gửi');
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            });

            jQuery('.showroom').click(function() {
                jQuery('.map').hide();
                jQuery('#frame-' + jQuery(this).data('id')).show();
            });
        });
    </script>

@endsection
