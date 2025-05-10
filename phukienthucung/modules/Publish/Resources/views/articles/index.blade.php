@php
    $articles = getActiveArticles(4);
    $activeArticles1 = getActiveArticles(20);
@endphp
@extends('publish::layouts.master')
@section('title', 'Trang chủ')
@section('styles')


@stop
@section('content')

    <!-- #masthead -->

    <section role="banner" class="entry-hero post-archive-hero-section entry-hero-layout-standard">
        <div class="entry-hero-container-inner">
            <div class="hero-section-overlay"></div>
            <div class="hero-container site-container">
                <header
                    class="entry-header post-archive-title title-align-inherit title-tablet-align-inherit title-mobile-align-inherit">
                    <nav id="base-breadcrumbs" aria-label="Breadcrumbs" class="base-breadcrumbs">
                        <div class="base-breadcrumb-container"><span><a href="#" itemprop="url"
                                    class="base-bc-home"><span>Trang chủ</span></a>
                            </span> <span class="bc-delimiter">/</span> <span class="base-bread-current">Tin tức</span>
                        </div>
                    </nav>
                    <h1 class="page-title post-home-title archive-title">
                        Tin tức </h1>
                </header>
                <!-- .entry-header -->
            </div>
        </div>
    </section>

    <div id="primary" class="content-area">
        <div class="content-container site-container">
            <main id="main" class="site-main" role="main">
                <div class="woocommerce base-woo-messages-none-woo-pages woocommerce-notices-wrapper"></div>




                <div style="margin-top: 10px" id="archive-container1"
                    class="content-wrap grid-cols post-archive grid-sm-col-2 grid-md-col-3 grid-lg-col-4 item-image-style-above"
                    data-infinite-scroll="{ &quot;path&quot;: &quot;.next.page-numbers&quot;, &quot;append&quot;: &quot;#archive-container .entry&quot;, &quot;hideNav&quot;: &quot;.pagination&quot;, &quot;status&quot;: &quot;.page-load-status&quot; }">

                    @foreach ($articles as $article)
                        <article
                            class="entry content-bg loop-entry post type-post status-publish format-standard has-post-thumbnail">
                            <a class="post-thumbnail base-thumbnail-ratio-inherit"
                                href="{{ route('article.show', $article->slug) }}">
                                <div class="post-thumbnail-inner">
                                    <img loading="lazy" width="768" height="505"
                                        src="{{ asset('storage/' . $article->image) }}"
                                        class="attachment-medium_large size-medium_large wp-post-image"
                                        alt="{{ $article->title }}" style="max-height: 180px">
                                </div>
                            </a>

                            <div class="entry-content-wrap" style="padding: 5px">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="{{ route('article.show', $article->slug) }}" rel="bookmark"
                                            style="font-size: 20px">
                                            {{ $article->title }}
                                        </a>
                                    </h2>
                                    <div class="entry-meta entry-meta-divider-dot">
                                        <span class="posted-on">
                                            <time class="entry-date published updated"
                                                datetime="{{ $article->created_at->toIso8601String() }}">
                                                {{ $article->created_at->format('d/m/Y H:i') }}
                                            </time>
                                        </span>
                                    </div>
                                </header>

                                <div class="entry-summary">
                                    <p>{{ Str::limit(strip_tags($article->description), 75) }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach






                </div>

                <style>
                    .bt-loader-ellips {
                        font-size: 20px;
                        position: relative;
                        width: 4em;
                        height: 1em;
                        margin: 10px auto
                    }

                    .bt-loader-ellips__dot {
                        display: block;
                        width: 0.7em;
                        height: 0.7em;
                        border-radius: .5em;
                        background: var(--global-palette6);
                        position: absolute;
                        animation-duration: .5s;
                        animation-timing-function: ease;
                        animation-iteration-count: infinite
                    }

                    .bt-loader-ellips__dot:nth-child(1),
                    .bt-loader-ellips__dot:nth-child(2) {
                        left: 0
                    }

                    .bt-loader-ellips__dot:nth-child(3) {
                        left: 1.5em
                    }

                    .bt-loader-ellips__dot:nth-child(4) {
                        left: 3em
                    }

                    @keyframes loaderReveal {
                        from {
                            transform: scale(.001)
                        }

                        to {
                            transform: scale(1)
                        }
                    }

                    @keyframes loaderSlide {
                        to {
                            transform: translateX(1.5em)
                        }
                    }

                    .bt-loader-ellips__dot:nth-child(1) {
                        animation-name: loaderReveal
                    }

                    .bt-loader-ellips__dot:nth-child(2),
                    .bt-loader-ellips__dot:nth-child(3) {
                        animation-name: loaderSlide
                    }

                    .bt-loader-ellips__dot:nth-child(4) {
                        animation-name: loaderReveal;
                        animation-direction: reverse
                    }

                    .page-load-status {
                        display: none;
                        padding-top: 20px;
                        text-align: center;
                        color: var(--global-palette4);
                    }
                </style>
                <div class="page-load-status">
                    <div class="bt-loader-ellips infinite-scroll-request"><span class="bt-loader-ellips__dot"></span><span
                            class="bt-loader-ellips__dot"></span><span class="bt-loader-ellips__dot"></span><span
                            class="bt-loader-ellips__dot"></span></div>
                    <p class="infinite-scroll-last">End of content</p>
                    <p class="infinite-scroll-error">End of content</p>
                </div>

            </main>
            <!-- #main -->
            <aside id="secondary" role="complementary"
                class="primary-sidebar widget-area sidebar-slug-sidebar-primary sidebar-link-style-normal">
                <div class="sidebar-inner-wrap">


                    <section id="block-7" class="widget widget_block">
                        <h2 class="widget-title">Nổi bật</h2>
                        <div class="wp-widget-group__inner-blocks">
                            @php
                                $outstandingArticles = \App\Models\Article::where('is_active', 1)
                                    ->where('is_outstanding', 1)
                                    ->orderByDesc('created_at')
                                    ->take(5)
                                    ->get();
                            @endphp
                            <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                                @foreach ($outstandingArticles as $article)
                                    <li>
                                        <div class="wp-block-latest-posts__featured-image alignleft">
                                            <img loading="lazy" decoding="async" width="300" height="197"
                                                src="{{ asset('storage/' . $article->image) }}"
                                                class="attachment-medium size-medium wp-post-image"
                                                alt="{{ $article->title }}" style="max-width:90px;max-height:59px;">
                                        </div>
                                        <a class="wp-block-latest-posts__post-title"
                                            href="{{ route('article.show', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>



                </div>
            </aside><!-- #secondary -->
        </div>
    </div>




@endsection
