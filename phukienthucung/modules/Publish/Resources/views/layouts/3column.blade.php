<!doctype html>
<html lang="vi-VN" class="no-js" itemtype="https://schema.org/Blog" itemscope>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>@yield('title')</title>
    <meta itemprop="image" content="@yield('image')" />
    <meta name="description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="@yield('canonical')">
    <meta property="og:site_name" content="{{ config('settings.store_name') }}">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="@yield('image_width')">
    <meta property="og:image:height" content="@yield('image_height')">
    <meta property="article:publisher" content="{{ config('settings.facebook_url') }}">
    <meta property="fb:app_id" content="{{ config('settings.facebook_app_id') }}" />
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="@yield('canonical')" />
    <link rel='stylesheet' id='base-dark-mode-css' href='{{ asset('modules/publish/css/dark-mode.css?ver=3.4.0') }}'
        media='all' />
    <style id='base-dark-mode-inline-css'>
        :root {
            color-scheme: light dark;
        }

        html:not(.specificity) {
            color-scheme: light;
        }

        html body {
            --global-light-toggle-switch: #F7FAFC;
            --global-dark-toggle-switch: #2D3748;
        }

        body.color-switch-dark {
            color-scheme: dark;
            --global-gray-400: #2f3336;
            --global-gray-500: #6B7280;
            --global-palette1: #ffd21d;
            --global-palette2: #e7ba0a;
            --global-palette3: #f8f9fb;
            --global-palette4: #d9d9d9;
            --global-palette5: #d9d9d9;
            --global-palette6: #d9d9d9;
            --global-palette7: #212121;
            --global-palette8: #0f0f0f;
            --global-palette9: #1f1a1a;
            --global-palette9rgb: 24, 24, 24;
            --global-palette-highlight: var(--global-palette1);
            --global-palette-highlight-alt: var(--global-palette2);
            --global-palette-highlight-alt2: var(--global-palette9);
            --global-palette-btn-bg: var(--global-palette1);
            --global-palette-btn-bg-hover: var(--global-palette2);
            --global-palette-btn: var(--global-palette9);
            --global-palette-btn-hover: var(--global-palette9);
            --tec-color-background-events: var(--global-palette9);
            --tec-color-text-event-date: var(--global-palette3);
            --tec-color-text-event-title: var(--global-palette3);
            --tec-color-text-events-title: var(--global-palette3);
            --tec-color-background-view-selector-list-item-hover: var(--global-palette7);
            --tec-color-background-secondary: var(--global-palette7);
            --tec-color-link-primary: var(--global-palette3);
            --tec-color-icon-active: var(--global-palette3);
            --tec-color-day-marker-month: var(--global-palette4);
            --tec-color-border-active-month-grid-hover: var(--global-palette5);
            --tec-color-accent-primary: var(--global-palette1);
        }

        .base-color-palette-fixed-switcher {
            bottom: 30px;
        }

        .base-color-palette-fixed-switcher.kcpf-position-right {
            right: 30px;
        }

        .base-color-palette-fixed-switcher.kcpf-position-left {
            left: 30px;
        }

        .base-color-palette-fixed-switcher .base-color-palette-switcher.kcps-style-switch.kcps-type-icon button.base-color-palette-toggle:after {
            width: calc(1.2em + .3em);
            height: calc(1.2em + .3em);
        }

        .base-color-palette-fixed-switcher .base-color-palette-switcher button.base-color-palette-toggle .base-color-palette-icon {
            font-size: 1.2em;
        }

        .base-color-palette-header-switcher {
            --global-light-toggle-switch: #F7FAFC;
            --global-dark-toggle-switch: #2D3748;
        }

        .base-color-palette-header-switcher .base-color-palette-switcher.kcps-style-switch.kcps-type-icon button.base-color-palette-toggle:after {
            width: calc(1.2em + .3em);
            height: calc(1.2em + .3em);
        }

        .base-color-palette-header-switcher .base-color-palette-switcher button.base-color-palette-toggle .base-color-palette-icon {
            font-size: 1.2em;
        }

        .base-color-palette-mobile-switcher {
            --global-light-toggle-switch: #F7FAFC;
            --global-dark-toggle-switch: #2D3748;
        }

        .base-color-palette-mobile-switcher .base-color-palette-switcher.kcps-style-switch.kcps-type-icon button.base-color-palette-toggle:after {
            width: calc(1.2em + .3em);
            height: calc(1.2em + .3em);
        }

        .base-color-palette-mobile-switcher .base-color-palette-switcher button.base-color-palette-toggle .base-color-palette-icon {
            font-size: 1.2em;
        }

        .base-color-palette-footer-switcher {
            --global-light-toggle-switch: #F7FAFC;
            --global-dark-toggle-switch: #2D3748;
        }

        .base-color-palette-footer-switcher .base-color-palette-switcher.kcps-style-switch.kcps-type-icon button.base-color-palette-toggle:after {
            width: calc(1.2em + .3em);
            height: calc(1.2em + .3em);
        }

        .base-color-palette-footer-switcher .base-color-palette-switcher button.base-color-palette-toggle .base-color-palette-icon {
            font-size: 1.2em;
        }
    </style>
    <meta name='robots' content='noindex, nofollow' />
    <style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
    <script>
        document.documentElement.classList.remove('no-js');
    </script>

    <link rel='stylesheet' id='wp-block-library-css' href='{{ asset('modules/publish/css/style.min.css?ver=6.7.2') }}'
        media='all' />
    <style id='wp-block-library-inline-css'>
        .wp-block-quote.is-style-blue-quote {
            color: blue;
        }
    </style>
    <style id='wp-block-library-theme-inline-css'>
        .wp-block-audio :where(figcaption) {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio :where(figcaption) {
            color: #ffffffa6
        }

        .wp-block-audio {
            margin: 0 0 1em
        }

        .wp-block-code {
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Menlo, Consolas, monaco, monospace;
            padding: .8em 1em
        }

        .wp-block-embed :where(figcaption) {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed :where(figcaption) {
            color: #ffffffa6
        }

        .wp-block-embed {
            margin: 0 0 1em
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: #ffffffa6
        }

        :root :where(.wp-block-image figcaption) {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme :root :where(.wp-block-image figcaption) {
            color: #ffffffa6
        }

        .wp-block-image {
            margin: 0 0 1em
        }

        .wp-block-pullquote {
            border-bottom: 4px solid;
            border-top: 4px solid;
            color: currentColor;
            margin-bottom: 1.75em
        }

        .wp-block-pullquote cite,
        .wp-block-pullquote footer,
        .wp-block-pullquote__citation {
            color: currentColor;
            font-size: .8125em;
            font-style: normal;
            text-transform: uppercase
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            font-style: normal;
            position: relative
        }

        .wp-block-quote:where(.has-text-align-right) {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote:where(.has-text-align-center) {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large,
        .wp-block-quote:where(.is-style-plain) {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        .wp-block-search__button {
            border: 1px solid #ccc;
            padding: .375em .625em
        }

        :where(.wp-block-group.has-background) {
            padding: 1.25em 2.375em
        }

        .wp-block-separator.has-css-opacity {
            opacity: .4
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto
        }

        .wp-block-separator.has-alpha-channel-opacity {
            opacity: 1
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table {
            margin: 0 0 1em
        }

        .wp-block-table td,
        .wp-block-table th {
            word-break: normal
        }

        .wp-block-table :where(figcaption) {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table :where(figcaption) {
            color: #ffffffa6
        }

        .wp-block-video :where(figcaption) {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video :where(figcaption) {
            color: #ffffffa6
        }

        .wp-block-video {
            margin: 0 0 1em
        }

        :root :where(.wp-block-template-part.has-background) {
            margin-bottom: 0;
            margin-top: 0;
            padding: 1.25em 2.375em
        }
    </style>
    <style id='global-styles-inline-css'>
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--color--theme-palette-1: var(--global-palette1);
            --wp--preset--color--theme-palette-2: var(--global-palette2);
            --wp--preset--color--theme-palette-3: var(--global-palette3);
            --wp--preset--color--theme-palette-4: var(--global-palette4);
            --wp--preset--color--theme-palette-5: var(--global-palette5);
            --wp--preset--color--theme-palette-6: var(--global-palette6);
            --wp--preset--color--theme-palette-7: var(--global-palette7);
            --wp--preset--color--theme-palette-8: var(--global-palette8);
            --wp--preset--color--theme-palette-9: var(--global-palette9);
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: var(--global-font-size-small);
            --wp--preset--font-size--medium: var(--global-font-size-medium);
            --wp--preset--font-size--large: var(--global-font-size-large);
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--font-size--larger: var(--global-font-size-larger);
            --wp--preset--font-size--xxlarge: var(--global-font-size-xxlarge);
            --wp--preset--font-family--inter: "Inter", sans-serif;
            --wp--preset--font-family--cardo: Cardo;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :root {
            --wp--style--global--content-size: var(--global-calc-content-width);
            --wp--style--global--wide-size: var(--global-calc-wide-content-width);
        }

        :where(body) {
            margin: 0;
        }

        .wp-site-blocks>.alignleft {
            float: left;
            margin-right: 2em;
        }

        .wp-site-blocks>.alignright {
            float: right;
            margin-left: 2em;
        }

        .wp-site-blocks>.aligncenter {
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        body {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-theme-palette-1-color {
            color: var(--wp--preset--color--theme-palette-1) !important;
        }

        .has-theme-palette-2-color {
            color: var(--wp--preset--color--theme-palette-2) !important;
        }

        .has-theme-palette-3-color {
            color: var(--wp--preset--color--theme-palette-3) !important;
        }

        .has-theme-palette-4-color {
            color: var(--wp--preset--color--theme-palette-4) !important;
        }

        .has-theme-palette-5-color {
            color: var(--wp--preset--color--theme-palette-5) !important;
        }

        .has-theme-palette-6-color {
            color: var(--wp--preset--color--theme-palette-6) !important;
        }

        .has-theme-palette-7-color {
            color: var(--wp--preset--color--theme-palette-7) !important;
        }

        .has-theme-palette-8-color {
            color: var(--wp--preset--color--theme-palette-8) !important;
        }

        .has-theme-palette-9-color {
            color: var(--wp--preset--color--theme-palette-9) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-theme-palette-1-background-color {
            background-color: var(--wp--preset--color--theme-palette-1) !important;
        }

        .has-theme-palette-2-background-color {
            background-color: var(--wp--preset--color--theme-palette-2) !important;
        }

        .has-theme-palette-3-background-color {
            background-color: var(--wp--preset--color--theme-palette-3) !important;
        }

        .has-theme-palette-4-background-color {
            background-color: var(--wp--preset--color--theme-palette-4) !important;
        }

        .has-theme-palette-5-background-color {
            background-color: var(--wp--preset--color--theme-palette-5) !important;
        }

        .has-theme-palette-6-background-color {
            background-color: var(--wp--preset--color--theme-palette-6) !important;
        }

        .has-theme-palette-7-background-color {
            background-color: var(--wp--preset--color--theme-palette-7) !important;
        }

        .has-theme-palette-8-background-color {
            background-color: var(--wp--preset--color--theme-palette-8) !important;
        }

        .has-theme-palette-9-background-color {
            background-color: var(--wp--preset--color--theme-palette-9) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-theme-palette-1-border-color {
            border-color: var(--wp--preset--color--theme-palette-1) !important;
        }

        .has-theme-palette-2-border-color {
            border-color: var(--wp--preset--color--theme-palette-2) !important;
        }

        .has-theme-palette-3-border-color {
            border-color: var(--wp--preset--color--theme-palette-3) !important;
        }

        .has-theme-palette-4-border-color {
            border-color: var(--wp--preset--color--theme-palette-4) !important;
        }

        .has-theme-palette-5-border-color {
            border-color: var(--wp--preset--color--theme-palette-5) !important;
        }

        .has-theme-palette-6-border-color {
            border-color: var(--wp--preset--color--theme-palette-6) !important;
        }

        .has-theme-palette-7-border-color {
            border-color: var(--wp--preset--color--theme-palette-7) !important;
        }

        .has-theme-palette-8-border-color {
            border-color: var(--wp--preset--color--theme-palette-8) !important;
        }

        .has-theme-palette-9-border-color {
            border-color: var(--wp--preset--color--theme-palette-9) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .has-larger-font-size {
            font-size: var(--wp--preset--font-size--larger) !important;
        }

        .has-xxlarge-font-size {
            font-size: var(--wp--preset--font-size--xxlarge) !important;
        }

        .has-inter-font-family {
            font-family: var(--wp--preset--font-family--inter) !important;
        }

        .has-cardo-font-family {
            font-family: var(--wp--preset--font-family--cardo) !important;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :root :where(.wp-block-pullquote) {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css' href='{{ asset('modules/publish/css/styles.css?ver=6.0.4') }}'
        media='all' />
    <style id='woocommerce-inline-inline-css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='menu-addons-css' href='{{ asset('modules/publish/css/menu-addon.css?ver=3.4.0') }}'
        media='all' />
    <link rel='stylesheet' id='base-min-cart-shipping-notice-css'
        href='{{ asset('modules/publish/css/mini-cart-notice.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='vertical-navigation-style-css'
        href='{{ asset('modules/publish/css/vertical-navigation.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='search-advanced-style-css'
        href='{{ asset('modules/publish/css/search-advanced.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='header-wishlist-style-css'
        href='{{ asset('modules/publish/css/header-wishlist.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='tmcore-clever-style-css'
        href='{{ asset('modules/publish/css/clever.min.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='{{ asset('modules/publish/css/custom-frontend.min.css?ver=1740568330') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-54-css'
        href='{{ asset('modules/publish/css/post-54.css?ver=1740568330') }}' media='all' />
    <link rel='stylesheet' id='perfect-scrollbar-css'
        href='{{ asset('modules/publish/css/perfect-scrollbar.min.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='tmcore-frontend-css'
        href='{{ asset('modules/publish/css/frontend.min.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='tmcore-skeleton-css'
        href='{{ asset('modules/publish/css/skeleton.min.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='hint-css' href='{{ asset('modules/publish/css/hint.min.css?ver=6.7.2') }}'
        media='all' />
    <link rel='stylesheet' id='perfect-scrollbar-wpc-css'
        href='{{ asset('modules/publish/css/custom-theme.css?ver=6.7.2') }}' media='all' />
    <link rel='stylesheet' id='woosc-icons-css' href='{{ asset('modules/publish/css/icons.css?ver=6.4.4') }}'
        media='all' />
    <link rel='stylesheet' id='woosc-frontend-css' href='{{ asset('modules/publish/css/frontend.css?ver=6.4.4') }}'
        media='all' />
    <link rel='stylesheet' id='slick-css' href='{{ asset('modules/publish/css/slick.css?ver=6.7.2') }}'
        media='all' />
    <link rel='stylesheet' id='magnific-popup-css'
        href='{{ asset('modules/publish/css/magnific-popup.css?ver=6.7.2') }}' media='all' />
    <link rel='stylesheet' id='woosq-feather-css' href='{{ asset('modules/publish/css/feather.css?ver=6.7.2') }}'
        media='all' />
    <link rel='stylesheet' id='woosq-icons-css' href='{{ asset('modules/publish/css/icons.css?ver=4.1.6') }}'
        media='all' />
    <link rel='stylesheet' id='woosq-frontend-css' href='{{ asset('modules/publish/css/frontend.css?ver=4.1.6') }}'
        media='all' />
    <link rel='stylesheet' id='woosw-icons-css' href='{{ asset('modules/publish/css/icons.css?ver=4.9.8') }}'
        media='all' />
    <link rel='stylesheet' id='woosw-frontend-css' href='{{ asset('modules/publish/css/frontend.css?ver=4.9.8') }}'
        media='all' />
    <style id='woosw-frontend-inline-css'>
        .woosw-popup .woosw-popup-inner .woosw-popup-content .woosw-popup-content-bot .woosw-notice {
            background-color: #5fbd74;
        }

        .woosw-popup .woosw-popup-inner .woosw-popup-content .woosw-popup-content-bot .woosw-popup-content-bot-inner a:hover {
            color: #5fbd74;
            border-color: #5fbd74;
        }
    </style>
    <link rel='stylesheet' id='brands-styles-css' href='{{ asset('modules/publish/css/brands.css?ver=9.7.0') }}'
        media='all' />
    <link rel='stylesheet' id='base-global-css' href='{{ asset('modules/publish/css/global.min.css?ver=1.5.3') }}'
        media='all' />
    <style id='base-global-inline-css'>
        /* Base Base CSS */
        :root {
            --global-palette1: ##cd1818;
            --global-palette2: #1e1e1e;
            --global-palette3: #1e1e1e;
            --global-palette4: #666666;
            --global-palette5: #777777;
            --global-palette6: #888888;
            --global-palette7: #f0f0f0;
            --global-palette8: #f5f5f5;
            --global-palette9: #ffffff;
            --global-palette9rgb: 255, 255, 255;
            --global-palette-highlight: var(--global-palette1);
            --global-palette-highlight-alt: var(--global-palette2);
            --global-palette-highlight-alt2: var(--global-palette9);
            --global-palette-btn-bg: var(--global-palette1);
            --global-palette-btn-bg-hover: var(--global-palette2);
            --global-palette-btn: var(--global-palette9);
            --global-palette-btn-hover: var(--global-palette9);
            --global-body-font-family: Lora, var(--global-fallback-font);
            --global-heading-font-family: inherit;
            --global-fallback-font: sans-serif;
            --global-display-fallback-font: sans-serif;
            --global-content-width: 1230px;
            --global-content-narrow-width: 842px;
            --global-content-edge-padding: 0.9375rem;
            --global-content-boxed-padding: 2rem;
            --global-calc-content-width: calc(1230px - var(--global-content-edge-padding) - var(--global-content-edge-padding));
            --wp--style--global--content-size: var(--global-calc-content-width);
        }

        .wp-site-blocks {
            --global-vw: calc(100vw - (0.5 * var(--scrollbar-offset)));
        }

        :root body.base-elementor-colors {
            --e-global-color-base1: var(--global-palette1);
            --e-global-color-base2: var(--global-palette2);
            --e-global-color-base3: var(--global-palette3);
            --e-global-color-base4: var(--global-palette4);
            --e-global-color-base5: var(--global-palette5);
            --e-global-color-base6: var(--global-palette6);
            --e-global-color-base7: var(--global-palette7);
            --e-global-color-base8: var(--global-palette8);
            --e-global-color-base9: var(--global-palette9);
        }

        body {
            background: var(--global-palette8);
        }

        body,
        input,
        select,
        optgroup,
        textarea {
            font-weight: 400;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0.5px;
            font-family: var(--global-body-font-family);
            color: var(--global-palette4);
        }

        .content-bg,
        body.content-style-unboxed .site {
            background: var(--global-palette9);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--global-heading-font-family);
        }

        h1 {
            font-weight: 400;
            font-size: 28px;
            line-height: 1.2;
            letter-spacing: 1px;
            font-family: Lora, var(--global-fallback-font);
            color: var(--global-palette3);
        }

        h2 {
            font-weight: 400;
            font-size: 26px;
            line-height: 1.2;
            letter-spacing: 1px;
            font-family: Lora, var(--global-fallback-font);
            color: var(--global-palette3);
        }

        h3 {
            font-weight: 400;
            font-size: 24px;
            line-height: 1.5;
            letter-spacing: 1px;
            font-family: Lora, var(--global-fallback-font);
            color: var(--global-palette3);
        }

        h4 {
            font-weight: 400;
            font-size: 22px;
            line-height: 1.5;
            font-family: Lora, var(--global-fallback-font);
            color: var(--global-palette3);
        }

        h5 {
            font-weight: 400;
            font-size: 20px;
            line-height: 1.5;
            font-family: Lora, var(--global-fallback-font);
            color: var(--global-palette3);
        }

        h6 {
            font-weight: 400;
            font-size: 18px;
            line-height: 1.5;
            font-family: Lora, var(--global-fallback-font);
            color: var(--global-palette3);
        }

        .entry-hero h1 {
            font-size: 36px;
            color: #1e1e1e;
        }

        .entry-hero .base-breadcrumbs,
        .entry-hero .search-form {
            color: #1e1e1e;
        }

        @media all and (max-width: 1024px) {
            h2 {
                font-size: 24px;
            }
        }

        @media all and (max-width: 767px) {
            h1 {
                font-size: 26px;
            }

            h2 {
                font-size: 22px;
            }

            .wp-site-blocks .entry-hero h1 {
                font-size: 32px;
            }
        }

        .entry-hero .base-breadcrumbs {
            max-width: 1230px;
        }

        .site-container,
        .site-header-row-layout-contained,
        .site-footer-row-layout-contained,
        .entry-hero-layout-contained,
        .comments-area,
        .alignfull>.wp-block-cover__inner-container,
        .alignwide>.wp-block-cover__inner-container {
            max-width: var(--global-content-width);
        }

        .content-width-narrow .content-container.site-container,
        .content-width-narrow .hero-container.site-container {
            max-width: var(--global-content-narrow-width);
        }

        @media all and (min-width: 1460px) {
            .wp-site-blocks .content-container .alignwide {
                margin-left: -115px;
                margin-right: -115px;
                width: unset;
                max-width: unset;
            }
        }

        @media all and (min-width: 1102px) {
            .content-width-narrow .wp-site-blocks .content-container .alignwide {
                margin-left: -130px;
                margin-right: -130px;
                width: unset;
                max-width: unset;
            }
        }

        .content-style-boxed .wp-site-blocks .entry-content .alignwide {
            margin-left: calc(-1 * var(--global-content-boxed-padding));
            margin-right: calc(-1 * var(--global-content-boxed-padding));
        }

        .content-area {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        @media all and (max-width: 1024px) {
            .content-area {
                margin-top: 2rem;
                margin-bottom: 2rem;
            }
        }

        @media all and (max-width: 767px) {
            .content-area {
                margin-top: 1rem;
                margin-bottom: 1rem;
            }
        }

        @media all and (max-width: 1024px) {
            :root {
                --global-content-boxed-padding: 2rem;
            }
        }

        @media all and (max-width: 767px) {
            :root {
                --global-content-boxed-padding: 1.5rem;
            }
        }

        .entry-content-wrap {
            padding: 2rem;
        }

        @media all and (max-width: 1024px) {
            .entry-content-wrap {
                padding: 2rem;
            }
        }

        @media all and (max-width: 767px) {
            .entry-content-wrap {
                padding: 1.5rem;
            }
        }

        .entry.single-entry {
            box-shadow: 0px 15px 15px -10px rgba(0, 0, 0, 0.05);
        }

        .entry.loop-entry {
            box-shadow: 0px 15px 15px -10px rgba(0, 0, 0, 0.05);
        }

        .loop-entry .entry-content-wrap {
            padding: 2rem;
        }

        @media all and (max-width: 1024px) {
            .loop-entry .entry-content-wrap {
                padding: 2rem;
            }
        }

        @media all and (max-width: 767px) {
            .loop-entry .entry-content-wrap {
                padding: 1.5rem;
            }
        }

        .has-sidebar:not(.has-left-sidebar) .content-container {
            grid-template-columns: 1fr 22%;
        }

        .has-sidebar.has-left-sidebar .content-container {
            grid-template-columns: 22% 1fr;
        }

        .primary-sidebar.widget-area .widget {
            margin-bottom: 1.8em;
            color: var(--global-palette4);
        }

        .primary-sidebar.widget-area .widget-title,
        .primary-sidebar.widget-area .wp-block-heading {
            font-weight: 500;
            font-size: 18px;
            line-height: 1.5;
            color: var(--global-palette3);
        }

        .primary-sidebar.widget-area .sidebar-inner-wrap a:where(:not(.button):not(.wp-block-button__link):not(.wp-element-button)) {
            color: var(--global-palette4);
        }

        .primary-sidebar.widget-area .sidebar-inner-wrap a:where(:not(.button):not(.wp-block-button__link):not(.wp-element-button)):hover {
            color: var(--global-palette1);
        }

        button,
        .button,
        .wp-block-button__link,
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .fl-button,
        .elementor-button-wrapper .elementor-button {
            font-weight: 400;
            font-size: 14px;
            line-height: 25px;
            letter-spacing: 0.5px;
            border-radius: 50px;
            padding: 9px 28px 9px 28px;
            box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.0);
        }

        .wp-block-button.is-style-outline .wp-block-button__link {
            padding: 9px 28px 9px 28px;
        }

        button:hover,
        button:focus,
        button:active,
        .button:hover,
        .button:focus,
        .button:active,
        .wp-block-button__link:hover,
        .wp-block-button__link:focus,
        .wp-block-button__link:active,
        input[type="button"]:hover,
        input[type="button"]:focus,
        input[type="button"]:active,
        input[type="reset"]:hover,
        input[type="reset"]:focus,
        input[type="reset"]:active,
        input[type="submit"]:hover,
        input[type="submit"]:focus,
        input[type="submit"]:active,
        .elementor-button-wrapper .elementor-button:hover,
        .elementor-button-wrapper .elementor-button:focus,
        .elementor-button-wrapper .elementor-button:active {
            box-shadow: 0px 15px 25px 0px rgba(0, 0, 0, 0.0);
        }

        .kb-button.kb-btn-global-outline.kb-btn-global-inherit {
            padding-top: calc(9px - 2px);
            padding-right: calc(28px - 2px);
            padding-bottom: calc(9px - 2px);
            padding-left: calc(28px - 2px);
        }

        @media all and (max-width: 1024px) {

            button,
            .button,
            .wp-block-button__link,
            input[type="button"],
            input[type="reset"],
            input[type="submit"],
            .fl-button,
            .elementor-button-wrapper .elementor-button {
                padding: 9px 20px 9px 20px;
                line-height: 26px;
            }

            .wp-block-button.is-style-outline .wp-block-button__link {
                padding: 9px 20px 9px 20px;
            }

            .kb-button.kb-btn-global-outline.kb-btn-global-inherit {
                padding-top: calc(9px - 2px);
                padding-right: calc(20px - 2px);
                padding-bottom: calc(9px - 2px);
                padding-left: calc(20px - 2px);
            }
        }

        @media all and (min-width: 1025px) {
            .transparent-header .entry-hero .entry-hero-container-inner {
                padding-top: calc(45px + 100px + 50px);
            }
        }

        @media all and (max-width: 1024px) {
            .mobile-transparent-header .entry-hero .entry-hero-container-inner {
                padding-top: calc(45px + 90px);
            }
        }

        @media all and (max-width: 767px) {
            .mobile-transparent-header .entry-hero .entry-hero-container-inner {
                padding-top: calc(45px + 80px);
            }
        }

        #bt-scroll-up-reader,
        #bt-scroll-up {
            border: 1px solid transparent;
            border-radius: 100px 100px 100px 100px;
            color: var(--global-palette9);
            background: #cd1818;
            border-color: var(--global-palette9);
            bottom: 30px;
            font-size: 1.3em;
            padding: 0.4em 0.4em 0.4em 0.4em;
        }

        #bt-scroll-up-reader.scroll-up-side-right,
        #bt-scroll-up.scroll-up-side-right {
            right: 30px;
        }

        #bt-scroll-up-reader.scroll-up-side-left,
        #bt-scroll-up.scroll-up-side-left {
            left: 30px;
        }

        #bt-scroll-up-reader:hover,
        #bt-scroll-up:hover {
            color: var(--global-palette9);
            background: #b50000;
        }

        .post-archive-hero-section .entry-hero-container-inner {
            background-color: var(--global-palette8);
            background-image: url({{ asset('modules/publish/images/breadcumb-bkg.jpg') }});
            background-repeat: repeat;
            background-position: center;
            background-size: cover;
            background-attachment: scroll;
        }

        .entry-hero.post-archive-hero-section .entry-header {
            min-height: 180px;
        }

        @media all and (max-width: 1024px) {
            .entry-hero.post-archive-hero-section .entry-header {
                min-height: 170px;
            }
        }

        @media all and (max-width: 767px) {
            .entry-hero.post-archive-hero-section .entry-header {
                min-height: 120px;
            }
        }

        .post-archive-title .archive-description {
            color: #1e1e1e;
        }

        .loop-entry.type-post h2.entry-title {
            font-weight: 500;
            font-size: 20px;
            line-height: 1.4;
        }

        @media all and (max-width: 767px) {
            .loop-entry.type-post h2.entry-title {
                font-size: 18px;
            }
        }

        /* Base Header CSS */
        @media all and (max-width: 1024px) {
            .mobile-transparent-header #masthead {
                position: absolute;
                left: 0px;
                right: 0px;
                z-index: 100;
            }

            .base-scrollbar-fixer.mobile-transparent-header #masthead {
                right: var(--scrollbar-offset, 0);
            }

            .mobile-transparent-header #masthead,
            .mobile-transparent-header .site-top-header-wrap .site-header-row-container-inner,
            .mobile-transparent-header .site-main-header-wrap .site-header-row-container-inner,
            .mobile-transparent-header .site-bottom-header-wrap .site-header-row-container-inner {
                background: transparent;
            }

            .site-header-row-tablet-layout-fullwidth,
            .site-header-row-tablet-layout-standard {
                padding: 0px;
            }
        }

        @media all and (min-width: 1025px) {
            .transparent-header #masthead {
                position: absolute;
                left: 0px;
                right: 0px;
                z-index: 100;
            }

            .transparent-header.base-scrollbar-fixer #masthead {
                right: var(--scrollbar-offset, 0);
            }

            .transparent-header #masthead,
            .transparent-header .site-top-header-wrap .site-header-row-container-inner,
            .transparent-header .site-main-header-wrap .site-header-row-container-inner,
            .transparent-header .site-bottom-header-wrap .site-header-row-container-inner {
                background: transparent;
            }
        }

        .site-branding {
            padding: 0px 0px 0px 0px;
        }

        #masthead,
        #masthead .base-sticky-header.item-is-fixed:not(.item-at-start):not(.site-header-row-container):not(.site-main-header-wrap),
        #masthead .base-sticky-header.item-is-fixed:not(.item-at-start)>.site-header-row-container-inner {
            background: var(--global-palette9);
        }

        .site-main-header-wrap .site-header-row-container-inner {
            background: var(--global-palette9);
        }

        .site-main-header-inner-wrap {
            min-height: 100px;
        }

        @media all and (max-width: 1024px) {
            .site-main-header-inner-wrap {
                min-height: 90px;
            }
        }

        @media all and (max-width: 767px) {
            .site-main-header-inner-wrap {
                min-height: 80px;
            }
        }

        .site-top-header-wrap .site-header-row-container-inner {
            background: var(--global-palette9);
            border-bottom: 1px solid var(--global-gray-400);
        }

        .site-top-header-inner-wrap {
            min-height: 45px;
        }

        .site-bottom-header-wrap .site-header-row-container-inner {
            background: #cd1818;
            border-bottom: 0px none transparent;
        }

        .site-bottom-header-inner-wrap {
            min-height: 50px;
        }

        #masthead .base-sticky-header.item-is-fixed:not(.item-at-start):not(.site-header-row-container):not(.item-hidden-above):not(.site-main-header-wrap),
        #masthead .base-sticky-header.item-is-fixed:not(.item-at-start):not(.item-hidden-above)>.site-header-row-container-inner {
            background: #cd1818;
        }

        @media all and (max-width: 1024px) {

            #masthead .base-sticky-header.item-is-fixed:not(.item-at-start):not(.site-header-row-container):not(.item-hidden-above):not(.site-main-header-wrap),
            #masthead .base-sticky-header.item-is-fixed:not(.item-at-start):not(.item-hidden-above)>.site-header-row-container-inner {
                background: var(--global-palette9);

                border-bottom:1px solid var(--global-gray-400);}}.header-navigation[class*="header-navigation-style-underline"] .header-menu-container.primary-menu-container>ul>li>a:after {
                    width: calc(100% - 40px);
                }

                .main-navigation .primary-menu-container>ul>li.menu-item>a {
                    padding-left: calc(40px / 2);
                    padding-right: calc(40px / 2);
                    padding-top: 12px;
                    padding-bottom: 12px;
                    color: var(--global-palette9);
                }

                .main-navigation .primary-menu-container>ul>li.menu-item .dropdown-nav-special-toggle {
                    right: calc(40px / 2);
                }

                .main-navigation .primary-menu-container>ul li.menu-item>a{font-weight:500;font-size:15px;letter-spacing:0.3px;}.header-navigation[class*="header-navigation-style-underline"] .header-menu-container.secondary-menu-container>ul>li>a:after {
                    width: calc(100% - 3em);
                }

                .secondary-navigation .secondary-menu-container>ul>li.menu-item>a {
                    padding-left: calc(3em / 2);
                    padding-right: calc(3em / 2);
                    padding-top: 0.5em;
                    padding-bottom: 0.5em;
                    color: var(--global-palette3);
                }

                .secondary-navigation .primary-menu-container>ul>li.menu-item .dropdown-nav-special-toggle {
                    right: calc(3em / 2);
                }

                .secondary-navigation .secondary-menu-container>ul li.menu-item>a {
                    font-weight: 400;
                    font-size: 14px;
                }

                .secondary-navigation .secondary-menu-container>ul>li.menu-item>a:hover {
                    color: var(--global-palette1);
                }

                .header-navigation .header-menu-container ul ul.sub-menu,
                .header-navigation .header-menu-container ul ul.submenu {
                    background: var(--global-palette9);
                    box-shadow: 0px 2px 13px 0px rgba(0, 0, 0, 0.1);
                }

                .page-hero-section .entry-hero-container-inner {
                    background-color: var(--global-palette8);
                    background-image: url({{ asset('modules/publish/images/breadcumb-bkg.jpg') }});
                    background-repeat: repeat;
                    background-position: center;
                    background-size: cover;
                    background-attachment: scroll;
                }

                .header-navigation .header-menu-container ul ul li.menu-item>a {
                    width: 240px;
                    padding-top: 0.2em;
                    padding-bottom: 0.2em;
                    color: var(--global-palette4);
                    font-weight: 400;
                    font-size: 14px;
                    line-height: 1.7;
                    letter-spacing: 0.5px;
                    font-family: Lora, var(--global-fallback-font);
                    color: var(--global-palette4);
                }

                .header-navigation .header-menu-container ul ul li.menu-item>a:hover {
                    color: var(--global-palette1);
                }

                .header-navigation .header-menu-container ul ul li.menu-item.current-menu-item>a {
                    color: var(--global-palette1);
                }

                .mobile-toggle-open-container .menu-toggle-open {
                    color: var(--global-palette3);
                    padding: 0.4em 0.6em 0.4em 0.6em;
                    font-size: 14px;
                }

                .mobile-toggle-open-container .menu-toggle-open.menu-toggle-style-bordered {
                    border: 1px solid currentColor;
                }

                .mobile-toggle-open-container .menu-toggle-open .menu-toggle-icon {
                    font-size: 24px;
                }

                .mobile-toggle-open-container .menu-toggle-open:hover,
                .mobile-toggle-open-container .menu-toggle-open:focus-visible {
                    color: var(--global-palette1);
                }

                .mobile-navigation ul li {
                    font-weight: 500;
                    font-size: 15px;
                }

                .mobile-navigation ul li a {
                    padding-top: 0.6em;
                    padding-bottom: 0.6em;
                }

                .mobile-navigation ul li>a,
                .mobile-navigation ul li.menu-item-has-children>.drawer-nav-drop-wrap {
                    color: var(--global-palette3);
                }

                .mobile-navigation ul li>a:hover,
                .mobile-navigation ul li.menu-item-has-children>.drawer-nav-drop-wrap:hover {
                    color: var(--global-palette1);
                }

                .mobile-navigation ul li.menu-item-has-children .drawer-nav-drop-wrap,
                .mobile-navigation ul li:not(.menu-item-has-children) a {
                    border-bottom: 0px solid rgba(255, 255, 255, 0.1);
                }

                .mobile-navigation:not(.drawer-navigation-parent-toggle-true) ul li.menu-item-has-children .drawer-nav-drop-wrap button {
                    border-left: 0px solid rgba(255, 255, 255, 0.1);
                }

                #mobile-drawer .drawer-inner,
                #mobile-drawer.popup-drawer-layout-fullwidth.popup-drawer-animation-slice .pop-portion-bg,
                #mobile-drawer.popup-drawer-layout-fullwidth.popup-drawer-animation-slice.pop-animated.show-drawer .drawer-inner {
                    color: var(--global-palette4);
                    background: var(--global-palette9);
                }

                #mobile-drawer .drawer-header .drawer-toggle {
                    padding: 0.6em 0.15em 0.6em 0.15em;
                    font-size: 24px;
                }

                #mobile-drawer .drawer-header .drawer-toggle,
                #mobile-drawer .drawer-header .drawer-toggle:focus {
                    color: var(--global-palette3);
                }

                .site-header-item .header-cart-wrap .header-cart-inner-wrap .header-cart-button {
                    color: var(--global-palette3);
                }

                .header-cart-wrap .header-cart-button .header-cart-total {
                    background: #cd1818;
                    color: var(--global-palette9);
                }

                .header-cart-wrap .header-cart-button .header-cart-label {
                    color: var(--global-palette3);
                }

                .header-cart-wrap .header-cart-button .base-svg-iconset {
                    font-size: 28px;
                }

                .header-cart-wrap .header-cart-button .header-cart-label.subtotal {
                    color: var(--global-palette3);
                }

                .header-cart-wrap .header-cart-button .header-cart-label.subtotal span {
                    color: var(--global-palette3);
                }

                .header-cart-wrap .header-cart-button .header-cart-label.subtotal .woocommerce-Price-amount:not(del .woocommerce-Price-amount):not(.tmcore-product-price-filter .woocommerce-Price-amount) {
                    color: var(--global-palette3);
                }

                .header-mobile-cart-wrap .header-cart-inner-wrap .header-cart-button {
                    color: var(--global-palette3);
                }

                .header-mobile-cart-wrap .header-cart-button .header-cart-total {
                    background: var(--global-palette1);
                    color: var(--global-palette9);
                }

                .header-mobile-cart-wrap .header-cart-inner-wrap .header-cart-button:hover {
                    color: var(--global-palette1);
                }

                .header-mobile-cart-wrap .header-cart-button:hover .header-cart-total {
                    background: var(--global-palette1);
                    color: var(--global-palette9);
                }

                .header-mobile-cart-wrap .header-cart-button .base-svg-iconset {
                    font-size: 29px;
                }

                .search-toggle-open-container .search-toggle-open {
                    color: var(--global-palette3);
                    padding: 0em 0em 0em 0em;
                }

                .search-toggle-open-container .search-toggle-open.search-toggle-style-bordered {
                    border: 1px solid currentColor;
                }

                @media all and (max-width: 1024px) {
                    .search-toggle-open-container .search-toggle-open .search-toggle-icon {
                        font-size: 26px;
                    }
                }

                .search-toggle-open-container .search-toggle-open:hover,
                .search-toggle-open-container .search-toggle-open:focus {
                    color: var(--global-palette1);
                }

                #search-drawer .drawer-inner .drawer-content form input.search-field,
                #search-drawer .drawer-inner .drawer-content form .base-search-icon-wrap,
                #search-drawer .drawer-header {
                    color: var(--global-palette3);
                }

                #search-drawer .drawer-inner {
                    background: var(--global-palette3);
                }

                .mobile-html {
                    font-size: 14px;
                    color: var(--global-palette3);
                }

                .mobile-html a {
                    color: var(--global-palette3);
                }

                .mobile-html a:hover {
                    color: var(--global-palette1);
                }

                /* Base Footer CSS */
                #colophon {
                    background: var(--global-palette9);
                }

                .site-middle-footer-wrap .site-footer-row-container-inner {
                    font-weight: 400;
                    font-size: 14px;
                    color: var(--global-palette3);
                    border-bottom: 1px solid var(--global-gray-400);
                }

                .site-footer .site-middle-footer-wrap a:where(:not(.button):not(.wp-block-button__link):not(.wp-element-button)) {
                    color: var(--global-palette3);
                }

                .site-footer .site-middle-footer-wrap a:where(:not(.button):not(.wp-block-button__link):not(.wp-element-button)):hover {
                    color: var(--global-palette1);
                }

                .site-middle-footer-inner-wrap {
                    padding-top: 80px;
                    padding-bottom: 80px;
                    grid-column-gap: 30px;
                    grid-row-gap: 30px;
                }

                .site-middle-footer-inner-wrap .widget {
                    margin-bottom: 30px;
                }

                .site-middle-footer-inner-wrap .widget-area .widget-title {
                    font-weight: 500;
                    font-size: 16px;
                    letter-spacing: 0.5px;
                    color: var(--global-palette3);
                }

                .site-middle-footer-inner-wrap .site-footer-section:not(:last-child):after {
                    right: calc(-30px / 2);
                }

                @media all and (max-width: 1024px) {
                    .site-middle-footer-inner-wrap {
                        padding-top: 60px;
                        padding-bottom: 30px;
                    }
                }

                @media all and (max-width: 767px) {
                    .site-middle-footer-inner-wrap {
                        grid-column-gap: 20px;
                        grid-row-gap: 20px;
                    }

                    .site-middle-footer-inner-wrap .site-footer-section:not(:last-child):after {
                        right: calc(-20px / 2);
                    }
                }

                .site-top-footer-wrap .site-footer-row-container-inner {
                    background-image: url({{ asset('modules/publish/images/footer-bkg.jpg') }});
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    background-attachment: fixed;
                    font-weight: 400;
                    font-size: 14px;
                    letter-spacing: 0.5px;
                    color: #1e1e1e;
                }

                .site-top-footer-inner-wrap {
                    padding-top: 112px;
                    padding-bottom: 90px;
                    grid-column-gap: 30px;
                    grid-row-gap: 30px;
                }

                .site-top-footer-inner-wrap .widget {
                    margin-bottom: 30px;
                }

                .site-top-footer-inner-wrap .widget-area .widget-title {
                    font-weight: 500;
                    font-size: 28px;
                    color: #1e1e1e;
                }

                .site-top-footer-inner-wrap .site-footer-section:not(:last-child):after {
                    right: calc(-30px / 2);
                }

                @media all and (max-width: 1024px) {
                    .site-top-footer-inner-wrap {
                        padding-top: 42px;
                        padding-bottom: 42px;
                    }
                }

                @media all and (max-width: 767px) {
                    .site-top-footer-inner-wrap .widget-area .widget-title {
                        font-size: 20px;
                    }

                    .site-top-footer-inner-wrap {
                        padding-top: 32px;
                        padding-bottom: 32px;
                    }
                }

                .site-bottom-footer-inner-wrap {
                    padding-top: 30px;
                    padding-bottom: 90px;
                    grid-column-gap: 30px;
                    grid-row-gap: 30px;
                }

                .site-bottom-footer-inner-wrap .widget {
                    margin-bottom: 30px;
                }

                .site-bottom-footer-inner-wrap .site-footer-section:not(:last-child):after {
                    right: calc(-30px / 2);
                }

                @media all and (max-width: 1024px) {
                    .site-bottom-footer-inner-wrap {
                        padding-top: 15px;
                        padding-bottom: 80px;
                        grid-column-gap: 15px;
                        grid-row-gap: 15px;
                    }

                    .site-bottom-footer-inner-wrap .site-footer-section:not(:last-child):after {
                        right: calc(-15px / 2);
                    }
                }

                .footer-social-wrap {
                    margin: 15px 0px 0px 0px;
                }

                .footer-social-wrap .footer-social-inner-wrap {
                    font-size: 1.2em;
                    gap: 0.6em;
                }

                .site-footer .site-footer-wrap .site-footer-section .footer-social-wrap .footer-social-inner-wrap .social-button {
                    color: var(--global-palette3);
                    background: var(--global-palette8);
                    border: 2px none transparent;
                    border-radius: 50px;
                }

                .site-footer .site-footer-wrap .site-footer-section .footer-social-wrap .footer-social-inner-wrap .social-button:hover {
                    color: var(--global-palette9);
                    background: var(--global-palette1);
                }

                #colophon .footer-html {
                    font-weight: 400;
                    font-size: 14px;
                    color: var(--global-palette3);
                    margin: 0px 0px 0px 0px;
                }

                #colophon .site-footer-row-container .site-footer-row .footer-html a {
                    color: var(--global-palette3);
                }

                #colophon .site-footer-row-container .site-footer-row .footer-html a:hover {
                    color: var(--global-palette1);
                }

                /* TemplateMela Core Header CSS */
                .header-navigation-dropdown-direction-left ul ul.submenu,
                .header-navigation-dropdown-direction-left ul ul.sub-menu {
                    right: 0px;
                    left: auto;
                }

                .rtl .header-navigation-dropdown-direction-right ul ul.submenu,
                .rtl .header-navigation-dropdown-direction-right ul ul.sub-menu {
                    left: 0px;
                    right: auto;
                }

                .header-account-style-icon_title_label .header-account-content {
                    padding-left: 5px;
                }

                .header-account-style-icon_title_label .header-account-title {
                    display: block;
                }

                .header-account-style-icon_title_label .header-account-label {
                    display: block;
                }

                .header-account-button .nav-drop-title-wrap>.base-svg-iconset,
                .header-account-button>.base-svg-iconset {
                    font-size: 23px;
                }

                .site-header-item .header-account-button .nav-drop-title-wrap,
                .site-header-item .header-account-wrap>.header-account-button {
                    display: flex;
                    align-items: center;
                }

                .header-account-style-icon_label .header-account-label {
                    padding-left: 5px;
                }

                .header-account-style-label_icon .header-account-label {
                    padding-right: 5px;
                }

                .site-header-item .header-account-wrap .header-account-button {
                    text-decoration: none;
                    box-shadow: none;
                    color: var(--global-palette3);
                    background: transparent;
                    padding: 0.6em 0em 0.6em 0em;
                    text-align: inherit;
                }

                .header-account-wrap .header-account-button .header-account-title {
                    color: inherit;
                }

                .header-account-wrap .header-account-button .header-account-label {
                    color: inherit;
                }

                .header-mobile-account-wrap .header-account-button .nav-drop-title-wrap>.base-svg-iconset,
                .header-mobile-account-wrap .header-account-button>.base-svg-iconset {
                    font-size: 23px;
                }

                .header-mobile-account-wrap .header-account-button .nav-drop-title-wrap,
                .header-mobile-account-wrap>.header-account-button {
                    display: flex;
                    align-items: center;
                }

                .header-mobile-account-wrap.header-account-style-icon_label .header-account-label {
                    padding-left: 5px;
                }

                .header-mobile-account-wrap.header-account-style-label_icon .header-account-label {
                    padding-right: 5px;
                }

                .header-mobile-account-wrap .header-account-button {
                    text-decoration: none;
                    box-shadow: none;
                    color: var(--global-palette3);
                    background: transparent;
                    padding: 0.6em 0em 0.6em 0em;
                }

                .header-mobile-account-wrap .header-account-button:hover {
                    color: var(--global-palette1);
                }

                .header-mobile-account-wrap .header-account-button .header-account-title {
                    color: inherit;
                }

                .header-mobile-account-wrap .header-account-button .header-account-label {
                    color: inherit;
                }

                #login-drawer .drawer-inner .drawer-content {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: absolute;
                    top: 0px;
                    bottom: 0px;
                    left: 0px;
                    right: 0px;
                    padding: 0px;
                }

                #loginform p label,
                #login-drawer .login p label {
                    display: block;
                }

                #login-drawer #loginform,
                #login-drawer .login {
                    width: 100%;
                }

                #login-drawer #loginform input,
                #login-drawer .login input {
                    width: 100%;
                }

                #login-drawer .login button {
                    width: 100%;
                }

                #login-drawer #loginform input[type="checkbox"],
                #login-drawer .login input[type="checkbox"] {
                    width: auto;
                }

                #login-drawer .drawer-inner .drawer-header {
                    position: relative;
                    z-index: 100;
                }

                #login-drawer .drawer-content_inner.widget_login_form_inner {
                    padding: 2em;
                    width: 100%;
                    max-width: 350px;
                    border-radius: .25rem;
                    background: var(--global-palette9);
                    color: var(--global-palette4);
                }

                #login-drawer .lost_password a {
                    color: var(--global-palette6);
                    font-size: 80%;
                }

                #login-drawer .lost_password,
                #login-drawer .register-field {
                    text-align: center;
                }

                #login-drawer .widget_login_form_inner p {
                    margin-top: 1.2em;
                    margin-bottom: 0em;
                    width: 100%;
                    float: none;
                }

                #login-drawer .widget_login_form_inner p:first-child {
                    margin-top: 0em;
                }

                #login-drawer .widget_login_form_inner label {
                    margin-bottom: 0.5em;
                }

                #login-drawer hr.register-divider {
                    margin: 1.2em 0;
                    border-width: 1px;
                }

                #login-drawer .register-field {
                    font-size: 90%;
                }

                @media all and (min-width: 1025px) {
                    #login-drawer hr.register-divider.hide-desktop {
                        display: none;
                    }

                    #login-drawer p.register-field.hide-desktop {
                        display: none;
                    }
                }

                @media all and (max-width: 1024px) {
                    #login-drawer hr.register-divider.hide-mobile {
                        display: none;
                    }

                    #login-drawer p.register-field.hide-mobile {
                        display: none;
                    }
                }

                @media all and (max-width: 767px) {
                    #login-drawer hr.register-divider.hide-mobile {
                        display: none;
                    }

                    #login-drawer p.register-field.hide-mobile {
                        display: none;
                    }
                }

                .tertiary-navigation .tertiary-menu-container>ul>li.menu-item>a {
                    padding-left: calc(1.2em / 2);
                    padding-right: calc(1.2em / 2);
                    padding-top: 0.6em;
                    padding-bottom: 0.6em;
                    color: var(--global-palette5);
                }

                .tertiary-navigation .tertiary-menu-container>ul>li.menu-item>a:hover {
                    color: var(--global-palette-highlight);
                }

                .tertiary-navigation .tertiary-menu-container>ul>li.menu-item.current-menu-item>a{color:var(--global-palette3);}.header-navigation[class*="header-navigation-style-underline"] .header-menu-container.tertiary-menu-container>ul>li>a:after {
                    width: calc(100% - 1.2em);
                }

                .quaternary-navigation .quaternary-menu-container>ul>li.menu-item>a {
                    padding-left: calc(1.2em / 2);
                    padding-right: calc(1.2em / 2);
                    padding-top: 0.6em;
                    padding-bottom: 0.6em;
                    color: var(--global-palette5);
                }

                .quaternary-navigation .quaternary-menu-container>ul>li.menu-item>a:hover {
                    color: var(--global-palette-highlight);
                }

                .quaternary-navigation .quaternary-menu-container>ul>li.menu-item.current-menu-item>a{color:var(--global-palette3);}.header-navigation[class*="header-navigation-style-underline"] .header-menu-container.quaternary-menu-container>ul>li>a:after {
                    width: calc(100% - 1.2em);
                }

                #main-header .header-divider {
                    border-right: 1px solid var(--global-palette6);
                    height: 50%;
                }

                #main-header .header-divider2 {
                    border-right: 1px solid var(--global-palette6);
                    height: 50%;
                }

                #main-header .header-divider3 {
                    border-right: 1px solid var(--global-palette6);
                    height: 50%;
                }

                #mobile-header .header-mobile-divider,
                #mobile-drawer .header-mobile-divider {
                    border-right: 1px solid var(--global-palette6);
                    height: 50%;
                }

                #mobile-drawer .header-mobile-divider {
                    border-top: 1px solid var(--global-palette6);
                    width: 50%;
                }

                #mobile-header .header-mobile-divider2 {
                    border-right: 1px solid var(--global-palette6);
                    height: 50%;
                }

                #mobile-drawer .header-mobile-divider2 {
                    border-top: 1px solid var(--global-palette6);
                    width: 50%;
                }

                .header-item-search-bar form ::-webkit-input-placeholder {
                    color: currentColor;
                    opacity: 0.5;
                }

                .header-item-search-bar form ::placeholder {
                    color: currentColor;
                    opacity: 0.5;
                }

                .header-search-bar form {
                    max-width: 100%;
                    width: 240px;
                }

                .header-mobile-search-bar form {
                    max-width: calc(100vw - var(--global-sm-spacing) - var(--global-sm-spacing));
                    width: 240px;
                }

                .header-widget-lstyle-normal .header-widget-area-inner a:not(.button) {
                    text-decoration: underline;
                }

                .element-contact-inner-wrap {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    margin-top: -0.6em;
                    margin-left: calc(-0.6em / 2);
                    margin-right: calc(-0.6em / 2);
                }

                .element-contact-inner-wrap .header-contact-item {
                    display: inline-flex;
                    flex-wrap: wrap;
                    align-items: center;
                    color: var(--global-palette3);
                    font-weight: 400;
                    font-size: 14px;
                    letter-spacing: 0.5px;
                    margin-top: 0.6em;
                    margin-left: calc(0.6em / 2);
                    margin-right: calc(0.6em / 2);
                }

                .element-contact-inner-wrap a.header-contact-item:hover {
                    color: var(--global-palette1);
                }

                .element-contact-inner-wrap .header-contact-item .base-svg-iconset {
                    font-size: 1em;
                }

                .header-contact-item img {
                    display: inline-block;
                }

                .header-contact-item .contact-content {
                    margin-left: 0.935em;
                }

                .rtl .header-contact-item .contact-content {
                    margin-right: 0.935em;
                    margin-left: 0px;
                }

                .header-contact-item .contact-content span {
                    display: block;
                }

                .header-mobile-contact-wrap .element-contact-inner-wrap {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    margin-top: -0.6em;
                    margin-left: calc(-0.6em / 2);
                    margin-right: calc(-0.6em / 2);
                }

                .header-mobile-contact-wrap .element-contact-inner-wrap .header-contact-item {
                    display: inline-flex;
                    flex-wrap: wrap;
                    align-items: center;
                    margin-top: 0.6em;
                    margin-left: calc(0.6em / 2);
                    margin-right: calc(0.6em / 2);
                }

                .header-mobile-contact-wrap .element-contact-inner-wrap .header-contact-item .base-svg-iconset {
                    font-size: 1em;
                }

                #main-header .header-button2 {
                    border: 2px none transparent;
                    box-shadow: 0px 0px 0px -7px rgba(0, 0, 0, 0);
                }

                #main-header .header-button2:hover {
                    box-shadow: 0px 15px 25px -7px rgba(0, 0, 0, 0.1);
                }

                .mobile-header-button2-wrap .mobile-header-button-inner-wrap .mobile-header-button2 {
                    border: 2px none transparent;
                    box-shadow: 0px 0px 0px -7px rgba(0, 0, 0, 0);
                }

                .mobile-header-button2-wrap .mobile-header-button-inner-wrap .mobile-header-button2:hover {
                    box-shadow: 0px 15px 25px -7px rgba(0, 0, 0, 0.1);
                }

                #widget-drawer.popup-drawer-layout-fullwidth .drawer-content .header-widget2,
                #widget-drawer.popup-drawer-layout-sidepanel .drawer-inner {
                    max-width: 400px;
                }

                #widget-drawer.popup-drawer-layout-fullwidth .drawer-content .header-widget2 {
                    margin: 0 auto;
                }

                .widget-toggle-open {
                    display: flex;
                    align-items: center;
                    background: transparent;
                    box-shadow: none;
                }

                .widget-toggle-open:hover,
                .widget-toggle-open:focus {
                    border-color: currentColor;
                    background: transparent;
                    box-shadow: none;
                }

                .widget-toggle-open .widget-toggle-icon {
                    display: flex;
                }

                .widget-toggle-open .widget-toggle-label {
                    padding-right: 5px;
                }

                .rtl .widget-toggle-open .widget-toggle-label {
                    padding-left: 5px;
                    padding-right: 0px;
                }

                .widget-toggle-open .widget-toggle-label:empty,
                .rtl .widget-toggle-open .widget-toggle-label:empty {
                    padding-right: 0px;
                    padding-left: 0px;
                }

                .widget-toggle-open-container .widget-toggle-open {
                    color: var(--global-palette5);
                    padding: 0.4em 0.6em 0.4em 0.6em;
                    font-size: 14px;
                }

                .widget-toggle-open-container .widget-toggle-open.widget-toggle-style-bordered {
                    border: 1px solid currentColor;
                }

                .widget-toggle-open-container .widget-toggle-open .widget-toggle-icon {
                    font-size: 20px;
                }

                .widget-toggle-open-container .widget-toggle-open:hover,
                .widget-toggle-open-container .widget-toggle-open:focus {
                    color: var(--global-palette-highlight);
                }

                #widget-drawer .header-widget-2style-normal a:not(.button) {
                    text-decoration: underline;
                }

                #widget-drawer .header-widget-2style-plain a:not(.button) {
                    text-decoration: none;
                }

                #widget-drawer .header-widget2 .widget-title {
                    color: var(--global-palette9);
                }

                #widget-drawer .header-widget2 {
                    color: var(--global-palette8);
                }

                #widget-drawer .header-widget2 a:not(.button),
                #widget-drawer .header-widget2 .drawer-sub-toggle {
                    color: var(--global-palette8);
                }

                #widget-drawer .header-widget2 a:not(.button):hover,
                #widget-drawer .header-widget2 .drawer-sub-toggle:hover {
                    color: var(--global-palette9);
                }

                #mobile-secondary-site-navigation ul li a {
                    padding-top: 0.5em;
                    padding-bottom: 0.5em;
                }

                /* TemplateMela Core Header CSS */
                #filter-drawer.popup-drawer-layout-fullwidth .drawer-content .product-filter-widgets,
                #filter-drawer.popup-drawer-layout-sidepanel .drawer-inner {
                    max-width: 300px;
                }

                #filter-drawer.popup-drawer-layout-fullwidth .drawer-content .product-filter-widgets {
                    margin: 0 auto;
                }

                .filter-toggle-open-container {
                    margin-right: 0.5em;
                }

                .filter-toggle-open>*:first-child:not(:last-child) {
                    margin-right: 4px;
                }

                .filter-toggle-open {
                    display: flex;
                    align-items: center;
                    box-shadow: none;
                }

                .filter-toggle-open.filter-toggle-style-default {
                    border: 0px;
                }

                .filter-toggle-open:hover,
                .filter-toggle-open:focus {
                    box-shadow: none;
                }

                .filter-toggle-open .filter-toggle-icon {
                    display: flex;
                }

                .filter-toggle-open>*:first-child:not(:last-child):empty {
                    margin-right: 0px;
                }

                .filter-toggle-open-container .filter-toggle-open {
                    padding: 6px 15px 6px 15px;
                    font-size: 14px;
                }

                .filter-toggle-open-container .filter-toggle-open.filter-toggle-style-bordered {
                    border: 1px solid currentColor;
                }

                .filter-toggle-open-container .filter-toggle-open .filter-toggle-icon {
                    font-size: 20px;
                }

                #filter-drawer .drawer-inner {
                    background: var(--global-palette9);
                }

                #filter-drawer .drawer-header .drawer-toggle,
                #filter-drawer .drawer-header .drawer-toggle:focus {
                    color: var(--global-palette5);
                }

                #filter-drawer .drawer-header .drawer-toggle:hover,
                #filter-drawer .drawer-header .drawer-toggle:focus:hover {
                    color: var(--global-palette3);
                }

                #filter-drawer .header-filter-2style-normal a:not(.button) {
                    text-decoration: underline;
                }

                #filter-drawer .header-filter-2style-plain a:not(.button) {
                    text-decoration: none;
                }

                #filter-drawer .drawer-inner .product-filter-widgets .widget-title {
                    font-weight: 500;
                    font-size: 18px;
                    color: var(--global-palette3);
                }

                #filter-drawer .drawer-inner .product-filter-widgets {
                    color: var(--global-palette4);
                }

                #filter-drawer .drawer-inner .product-filter-widgets a,
                #filter-drawer .drawer-inner .product-filter-widgets .drawer-sub-toggle {
                    color: var(--global-palette4);
                }

                #filter-drawer .drawer-inner .product-filter-widgets a:hover,
                #filter-drawer .drawer-inner .product-filter-widgets .drawer-sub-toggle:hover {
                    color: var(--global-palette1);
                }

                .base-shop-active-filters {
                    display: flex;
                    flex-wrap: wrap;
                }

                .base-clear-filters-container a {
                    text-decoration: none;
                    background: var(--global-palette7);
                    color: var(--global-palette5);
                    padding: .6em;
                    font-size: 80%;
                    transition: all 0.3s ease-in-out;
                    -webkit-transition: all 0.3s ease-in-out;
                    -moz-transition: all 0.3s ease-in-out;
                }

                .base-clear-filters-container ul {
                    margin: 0px;
                    padding: 0px;
                    border: 0px;
                    list-style: none outside;
                    overflow: hidden;
                    zoom: 1;
                }

                .base-clear-filters-container ul li {
                    float: left;
                    padding: 0 0 1px 1px;
                    list-style: none;
                }

                .base-clear-filters-container a:hover {
                    background: var(--global-palette9);
                    color: var(--global-palette3);
                }

                /* TemplateMela Core More CSS */
                .vertical-navigation .vertical-navigation-header {
                    padding-left: calc(2.2em / 2);
                    padding-right: calc(2.2em / 2);
                    padding-top: 0.6em;
                    padding-bottom: 0.6em;
                    color: var(--global-palette9);
                    background: #b50000;
                }

                .vertical-navigation .vertical-navigation-header .base-svg-iconset {
                    padding: calc(0em / 2);
                    font-size: em;
                }

                .vertical-navigation .vertical-menu-container>ul>li.menu-item>a {
                    padding-left: calc(2.9em / 2);
                    padding-right: calc(2.9em / 2);
                    padding-top: 0.7em;
                    padding-bottom: 0.7em;
                    color: var(--global-palette3);
                    background: var(--global-palette9);
                    font-weight: 500;
                }

                .vertical-navigation .vertical-menu-container>ul>li.menu-item>a:hover {
                    color: var(--global-palette1);
                }

                .vertical-navigation .vertical-menu-container>ul.menu {
                    border: 0px solid var(--global-palette1);
                }

                .vertical-navigation .vertical-menu-container>ul.menu>li.menu-item {
                    border-bottom: 1px solid var(--global-palette7);
                }

                .vertical-navigation .vertical-menu-container>ul>li.menu-item.current-menu-item>a {
                    color: var(--global-palette1);
                }

                .site-header-item .header-wishlist-wrap .header-wishlist-inner-wrap .header-wishlist-button {
                    color: var(--global-palette3);
                }

                .header-wishlist-wrap .header-wishlist-button .header-wishlist-total {
                    background: var(--global-palette1);
                    color: var(--global-palette9);
                }

                .header-wishlist-wrap .header-wishlist-button .base-svg-iconset {
                    font-size: 24px;
                }

                .header-item-search-advanced form ::-webkit-input-placeholder {
                    color: currentColor;
                    opacity: 0.5;
                }

                .header-item-search-advanced form ::placeholder {
                    color: currentColor;
                    opacity: 0.5;
                }

                .header-search-advanced form.search-form {
                    max-width: 100%;
                    width: 600px;
                }

                .header-search-advanced form.search-form {
                    background: var(--global-palette9);
                    border: 1px solid var(--global-gray-400);
                    border-radius: 50px 50px 50px 50px;
                }

                .header-search-advanced form.search-form .search-submit {
                    background: #cd1818;
                    color: var(--global-palette9);
                    font-weight: 500;
                    font-size: 14px;
                    letter-spacing: 0.4px;
                    padding: 9px 18px 9px 18px;
                    border-radius: 0px 50px 50px 0px;
                }

                .header-search-advanced form.search-form .search-submit:hover,
                .header-search-advanced form.search-form .search-submit:focus {
                    background: var(--global-palette1);
                    color: var(--global-palette9);
                }

                .header-search-advanced form.search-form input.search-field {
                    padding: 10px 20px 7px 15px;
                }

                .header-search-advanced form.search-form .search-category-field .search-select {
                    line-height: 38px;
                }

                /* TemplateMela Core CSS */
                :root {
                    --skeleton-gradient-color: #f5f5f5;
                }

                /* Base Woo CSS */
                .woocommerce table.shop_table td.product-quantity {
                    min-width: 130px;
                }

                .woocommerce div.product div.images {
                    width: 600px;
                }

                .product-hero-section .entry-hero-container-inner {
                    background-color: var(--global-palette8);
                    background-image: url({{ asset('modules/publish/images/breadcumb-bkg.jpg') }});
                    background-repeat: repeat;
                    background-position: center;
                    background-size: cover;
                    background-attachment: scroll;
                }

                .entry-hero.product-hero-section .entry-header {
                    min-height: 180px;
                }

                @media all and (max-width: 1024px) {
                    .entry-hero.product-hero-section .entry-header {
                        min-height: 170px;
                    }
                }

                @media all and (max-width: 767px) {
                    .entry-hero.product-hero-section .entry-header {
                        min-height: 120px;
                    }
                }

                .product-title .single-category {
                    font-weight: 700;
                    font-size: 32px;
                    line-height: 1.5;
                    color: var(--global-palette3);
                }

                .wp-site-blocks .product-hero-section .extra-title {
                    font-weight: 700;
                    font-size: 32px;
                    line-height: 1.5;
                }

                .woocommerce div.product .product_title {
                    font-weight: 500;
                    font-size: 24px;
                    line-height: 1.3;
                    color: var(--global-palette3);
                }

                @media all and (max-width: 1024px) {
                    .woocommerce div.product .product_title {
                        font-size: 22px;
                    }
                }

                @media all and (max-width: 767px) {
                    .woocommerce div.product .product_title {
                        font-size: 20px;
                    }
                }

                @media all and (max-width: 767px) {

                    .woocommerce ul.products:not(.products-list-view):not(.splide__list),
                    .wp-site-blocks .wc-block-grid:not(.has-2-columns):not(.has-1-columns) .wc-block-grid__products {
                        grid-template-columns: repeat(2, minmax(0, 1fr));
                        column-gap: 0.5rem;
                        grid-row-gap: 0.5rem;
                    }
                }

                .product-archive-hero-section .entry-hero-container-inner {
                    background-color: var(--global-palette8);
                    background-image: url({{ asset('modules/publish/images/breadcumb-bkg.jpg') }});
                    background-repeat: repeat;
                    background-position: center;
                    background-size: cover;
                    background-attachment: scroll;
                }

                .entry-hero.product-archive-hero-section .entry-header {
                    min-height: 180px;
                }

                @media all and (max-width: 1024px) {
                    .entry-hero.product-archive-hero-section .entry-header {
                        min-height: 170px;
                    }
                }

                @media all and (max-width: 767px) {
                    .entry-hero.product-archive-hero-section .entry-header {
                        min-height: 120px;
                    }
                }

                .woocommerce ul.products li.product h3,
                .woocommerce ul.products li.product .product-details .woocommerce-loop-product__title,
                .woocommerce ul.products li.product .product-details .woocommerce-loop-category__title,
                .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-title {
                    font-weight: 400;
                    font-size: 14px;
                    line-height: 22px;
                    letter-spacing: 0.5px;
                    color: var(--global-palette3);
                }

                .woocommerce ul.products li.product .product-details .price,
                .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-price {
                    font-weight: 600;
                    font-size: 15px;
                    line-height: 1.2;
                    color: var(--global-palette2);
                }

                .woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button:not(.kb-button),
                .woocommerce ul.products li.woo-archive-btn-button .button:not(.kb-button),
                .wc-block-grid__product.woo-archive-btn-button .product-details .wc-block-grid__product-add-to-cart .wp-block-button__link {
                    color: var(--global-palette3);
                    background: var(--global-palette8);
                    border: 2px none transparent;
                    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.0);
                }

                .woocommerce ul.products.woo-archive-btn-button .product-action-wrap .button:not(.kb-button):hover,
                .woocommerce ul.products li.woo-archive-btn-button .button:not(.kb-button):hover,
                .wc-block-grid__product.woo-archive-btn-button .product-details .wc-block-grid__product-add-to-cart .wp-block-button__link:hover {
                    color: var(--global-palette9);
                    background: var(--global-palette1);
                    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);
                }

                /* TemplateMela CSS */
                .primary-sidebar.widget-area .widget-title,
                .widget_block h2,
                .widget_block .widgettitle,
                .widget_block .widgettitle,
                .primary-sidebar h2 {
                    font-weight: 500;
                    font-size: 18px;
                    line-height: 1.5;
                    color: var(--global-palette3);
                }
    </style>
    <link rel='stylesheet' id='base-header-css' href='{{ asset('modules/publish/css/header.min.css?ver=1.5.3') }}'
        media='all' />
    <link rel='stylesheet' id='base-content-css' href='{{ asset('modules/publish/css/content.min.css?ver=1.5.3') }}'
        media='all' />
    <link rel='stylesheet' id='base-sidebar-css' href='{{ asset('modules/publish/css/sidebar.min.css?ver=1.5.3') }}'
        media='all' />
    <link rel='stylesheet' id='base-woocommerce-css'
        href='{{ asset('modules/publish/css/woocommerce.min.css?ver=1.5.3') }}' media='all' />
    <link rel='stylesheet' id='base-footer-css' href='{{ asset('modules/publish/css/footer.min.css?ver=1.5.3') }}'
        media='all' />
    <link rel='stylesheet' id='base-extra-brands-css-css'
        href='{{ asset('modules/publish/css/bt_extra_brands.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='tmcore-elementor-css'
        href='{{ asset('modules/publish/css/elementor.min.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='tmcore-elementor-editor-icon-css'
        href='{{ asset('modules/publish/css/elementor-icons.min.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='base-splide-css' href='{{ asset('modules/publish/css/splide.min.css?ver=6.7.2') }}'
        media='all' />
    <link rel='stylesheet' id='base_variation_swatches_css-css'
        href='{{ asset('modules/publish/css/bt_variation_swatches.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='base-snackbar-notice-css'
        href='{{ asset('modules/publish/css/base-snackbar-notice.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='tmcore-woocommerce-style-css'
        href='{{ asset('modules/publish/css/woocommerce.min2.css?ver=3.4.0') }}' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-css'
        href='{{ asset('modules/publish/css/wc-blocks.css?ver=wc-9.7.0') }}' media='all' />
    <link rel='stylesheet' id='couchly-layout-style-css'
        href='{{ asset('modules/publish/css/style.css?ver=1.1.0') }}' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'
        href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.7.2'
        media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script type="text/template" id="tmpl-unavailable-variation-template">
	<p role="alert">Sorry, this product is unavailable. Please choose a different combination.</p>
</script>
    <script src="{{ asset('modules/publish/js/jquery.min.js?ver=3.7.1') }}" id="jquery-core-js"></script>
    <script src="{{ asset('modules/publish/js/jquery-migrate.min.js?ver=3.4.1') }}" id="jquery-migrate-js"></script>
    <script src="{{ asset('modules/publish/js/jquery.blockUI.min.js?ver=2.7.0-wc.9.7.0') }}" id="jquery-blockui-js"
        data-wp-strategy="defer"></script>
    <script id="wc-add-to-cart-js-extra">
        var wc_add_to_cart_params = {
            "ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "i18n_view_cart": "View cart",
            "cart_url": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/cart\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
    </script>
    <script src="{{ asset('modules/publish/js/add-to-cart.min.js?ver=9.7.0') }}" id="wc-add-to-cart-js" defer
        data-wp-strategy="defer"></script>
    <script src="{{ asset('modules/publish/js/js.cookie.min.js?ver=2.1.4-wc.9.7.0') }}" id="js-cookie-js"
        data-wp-strategy="defer"></script>
    <script id="woocommerce-js-extra">
        var woocommerce_params = {
            "ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "i18n_password_show": "Show password",
            "i18n_password_hide": "Hide password"
        };
    </script>
    <script src="{{ asset('modules/publish/js/woocommerce.min.js?ver=9.7.0') }}" id="woocommerce-js" defer
        data-wp-strategy="defer"></script>
    <script id="base-dark-mode-js-extra">
        var baseDarkModeConfig = {
            "siteSlug": "2ql3e4285lp0",
            "auto": ""
        };
    </script>
    <script src="{{ asset('modules/publish/js/dark-mode.min.js?ver=3.4.0') }}" id="base-dark-mode-js"></script>
    <script src="{{ asset('modules/publish/js/helpers.min.js?ver=3.4.0') }}" id="tmcore-helpers-js"></script>
    <script src="{{ asset('modules/publish/js/underscore.min.js?ver=1.13.7') }}" id="underscore-js"></script>
    <script id="wp-util-js-extra">
        var _wpUtilSettings = {
            "ajax": {
                "url": "\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php"
            }
        };
    </script>
    <script src="{{ asset('modules/publish/js/wp-util.min.js?ver=6.7.2') }}" id="wp-util-js"></script>
    <script src="{{ asset('modules/publish/js/custom.js?ver=1.1.0') }}" id="couchly-layout-js-js"></script>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <meta name="generator"
        content="Elementor 3.27.6; features: additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <style>
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }

        @media screen and (max-height: 1024px) {

            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }

        @media screen and (max-height: 640px) {

            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }
    </style>
    <meta name="generator"
        content="Powered by Slider Revolution 6.7.29 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
    <style class='wp-fonts-local'>
        @font-face {
            font-family: Inter;
            font-style: normal;
            font-weight: 300 900;
            font-display: fallback;
            src: url('https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/woocommerce/assets/fonts/Inter-VariableFont_slnt,wght.woff2') format('woff2');
            font-stretch: normal;
        }

        @font-face {
            font-family: Cardo;
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: url('https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/wp-content/plugins/woocommerce/assets/fonts/cardo_normal_400.woff2') format('woff2');
        }
    </style>
    <link rel='stylesheet' id='base-fonts-css'
        href='https://fonts.googleapis.com/css?family=Lora:400,700&#038;display=swap' media='all' />
    <script>
        function setREVStartSize(e) {
            //window.requestAnimationFrame(function() {
            window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
            window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
            try {
                var pw = document.getElementById(e.c).parentNode.offsetWidth,
                    newh;
                pw = pw === 0 || isNaN(pw) || (e.l == "fullwidth" || e.layout == "fullwidth") ? window.RSIW : pw;
                e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
                e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
                e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
                e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
                e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
                e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
                e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
                if (e.layout === "fullscreen" || e.l === "fullscreen")
                    newh = Math.max(e.mh, window.RSIH);
                else {
                    e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                    for (var i in e.rl)
                        if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                    e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                    e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                    for (var i in e.rl)
                        if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                    var nl = new Array(e.rl.length),
                        ix = 0,
                        sl;
                    e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                    e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                    e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                    e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                    for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                    sl = nl[0];
                    for (var i in nl)
                        if (sl > nl[i] && nl[i] > 0) {
                            sl = nl[i];
                            ix = i;
                        }
                    var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                    newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
                }
                var el = document.getElementById(e.c);
                if (el !== null && el) el.style.height = newh + "px";
                el = document.getElementById(e.c + "_wrapper");
                if (el !== null && el) {
                    el.style.height = newh + "px";
                    el.style.display = "block";
                }
            } catch (e) {
                console.log("Failure at Presize of Slider:" + e)
            }
            //});
        };
    </script>
    <style>
        .alert-dismissible {
            position: relative;
            padding-right: 2.5rem;
            border: 1px solid transparent;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border-color: #badbcc;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-color: #f5c2c7;
        }

        .custom-alert-close {
            position: absolute;
            top: 0.5rem;
            right: 0.75rem;
            background: none;
            border: none;
            font-size: 1.25rem;
            line-height: 1;
            color: inherit;
            cursor: pointer;
        }
    </style>
</head>

<body
    class="archive tax-product_cat term-beds term-43 wp-embed-responsive theme-avanam woocommerce woocommerce-page woocommerce-no-js color-switch-light has-dark-logo woocommerce-active product-style-1 products-no-gutter hfeed footer-on-bottom hide-focus-outline link-style-no-underline has-sidebar has-left-sidebar content-title-style-above content-width-normal content-style-unboxed content-vertical-padding-show non-transparent-header mobile-non-transparent-header base-elementor-colors tax-woo-product elementor-default elementor-kit-54">
    <div id="wrapper" class="site wp-site-blocks">
        <a class="skip-link screen-reader-text scroll-ignore" href="#main">Skip to content</a>
        @include('publish::partials.header')
        @yield('content')
        @include('publish::partials.footer')
    </div><!-- #wrapper -->
    <div id="filter-drawer" class="popup-drawer popup-drawer-layout-sidepanel popup-drawer-side-left"
        data-drawer-target-string="#filter-drawer">
        <div class="drawer-overlay" data-drawer-target-string="#filter-drawer"></div>

        <div class="drawer-inner">
            <div class="drawer-header">
                <button class="filter-toggle-close drawer-toggle" aria-label="Close panel"
                    data-toggle-target="#filter-drawer" data-toggle-body-class="showing-filter-drawer"
                    aria-expanded="false" data-set-focus=".filter-toggle-open">
                    <span class="base-svg-iconset"><svg class="base-svg-icon base-close-svg" fill="currentColor"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <title>Toggle Menu Close</title>
                            <path
                                d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                            </path>
                        </svg></span> </button>
            </div>
            <div class="drawer-content">
                <div class="widget-area product-filter-widgets inner-link-style-plain">
                    <section id="tmcore-wp-widget-product-categories-layered-nav-4"
                        class=" widget-scrollable widget tmcore-wp-widget-product-categories-layered-nav tmcore-wp-widget-filter">
                        <input type="hidden" class="widget-instance"
                            data-name="TemplateMelaCore_WP_Widget_Product_Categories_Layered_Nav"
                            data-instance="{&quot;title&quot;:&quot;Shop By Categories&quot;,&quot;orderby&quot;:&quot;name&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;checkbox&quot;,&quot;items_count&quot;:&quot;on&quot;,&quot;show_hierarchy&quot;:0,&quot;enable_scrollable&quot;:1,&quot;enable_collapsed&quot;:0}" />
                        <h2 class="widget-title">Shop By Categories</h2>
                        <div class="widget-content">
                            <div class="widget-content-inner">
                                <ul class="show-display-list show-items-count-on list-style-checkbox">
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/wooden-table-lamp/"
                                            class="item-link">Wooden Table Lamp</a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/baroque/"
                                            class="item-link">Baroque</a></li>
                                    <li class="wc-layered-nav-term chosen"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/"
                                            class="item-link">Beds</a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/dining-room/"
                                            class="item-link">Dining Room</a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/finished-wood-tables/"
                                            class="item-link">Finished Wood Tables</a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/sofas/"
                                            class="item-link">Sofas</a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/special-offer/"
                                            class="item-link">special offer</a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/storage/"
                                            class="item-link">Storage</a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section id="tmcore-wp-widget-product-highlight-filter-4"
                        class="widget tmcore-wp-widget-product-highlight-filter tmcore-wp-widget-filter"><input
                            type="hidden" class="widget-instance"
                            data-name="TemplateMelaCore_WP_Widget_Product_Highlight_Filter"
                            data-instance="{&quot;title&quot;:&quot;Highlight&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;normal&quot;,&quot;enable_collapsed&quot;:0}" />
                        <h2 class="widget-title">Highlight</h2>
                        <div class="widget-content">
                            <div class="widget-content-inner">
                                <ul
                                    class="tmcore-product-highlight-filter show-display-list list-style-normal single-choice">
                                    <li class="filter-item chosen">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/"
                                            class="filter-link">All Products </a>
                                    </li>
                                    <li class="filter-item">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?highlight_filter=best_selling"
                                            class="filter-link">Best Seller </a>
                                    </li>
                                    <li class="filter-item">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?highlight_filter=new_arrivals"
                                            class="filter-link">New Arrivals </a>
                                    </li>
                                    <li class="filter-item">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?highlight_filter=on_sale"
                                            class="filter-link">Sale </a>
                                    </li>
                                    <li class="filter-item">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?highlight_filter=featured"
                                            class="filter-link">Hot Items </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section id="tmcore-wp-widget-product-layered-nav-7"
                        class="widget tmcore-wp-widget-product-layered-nav tmcore-wp-widget-filter"><input
                            type="hidden" class="widget-instance"
                            data-name="TemplateMelaCore_WP_Widget_Product_Layered_Nav"
                            data-instance="{&quot;title&quot;:&quot;Filter By Color&quot;,&quot;attribute&quot;:&quot;color&quot;,&quot;selection_mode&quot;:&quot;multi&quot;,&quot;query_type&quot;:&quot;and&quot;,&quot;display_type&quot;:&quot;inline&quot;,&quot;list_style&quot;:&quot;swatches&quot;,&quot;labels&quot;:&quot;off&quot;,&quot;items_count&quot;:&quot;off&quot;,&quot;enable_scrollable&quot;:0,&quot;enable_collapsed&quot;:0}" />
                        <h2 class="widget-title">Filter By Color</h2>
                        <div class="widget-content">
                            <div class="widget-content-inner">
                                <ul
                                    class="show-labels-off show-display-inline show-items-count-off pa_color list-style-color list-style-image">
                                    <li class="wc-layered-nav-term "><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_color=black"
                                            class="filter-link term-link hint--bounce hint--top" aria-label="Black">
                                            <div class="term-shape"><span style="background: #000000"
                                                    class="term-shape-bg"></span><span
                                                    class="term-shape-border"></span></div><span
                                                class="term-name">Black</span>
                                        </a></li>
                                    <li class="wc-layered-nav-term "><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_color=green"
                                            class="filter-link term-link hint--bounce hint--top" aria-label="Green">
                                            <div class="term-shape"><span style="background: #228b22"
                                                    class="term-shape-bg"></span><span
                                                    class="term-shape-border"></span></div><span
                                                class="term-name">Green</span>
                                        </a></li>
                                    <li class="wc-layered-nav-term "><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_color=latte"
                                            class="filter-link term-link hint--bounce hint--top" aria-label="Latte">
                                            <div class="term-shape"><span style="background: #c2ab98"
                                                    class="term-shape-bg"></span><span
                                                    class="term-shape-border"></span></div><span
                                                class="term-name">Latte</span>
                                        </a></li>
                                    <li class="wc-layered-nav-term "><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_color=silver"
                                            class="filter-link term-link hint--bounce hint--top" aria-label="Silver">
                                            <div class="term-shape"><span style="background: #cccccc"
                                                    class="term-shape-bg"></span><span
                                                    class="term-shape-border"></span></div><span
                                                class="term-name">Silver</span>
                                        </a></li>
                                    <li class="wc-layered-nav-term "><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_color=white"
                                            class="filter-link term-link hint--bounce hint--top" aria-label="White">
                                            <div class="term-shape"><span style="background: #ffffff"
                                                    class="term-shape-bg"></span><span
                                                    class="term-shape-border"></span></div><span
                                                class="term-name">White</span>
                                        </a></li>
                                    <li class="wc-layered-nav-term "><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_color=yellow"
                                            class="filter-link term-link hint--bounce hint--top" aria-label="Yellow">
                                            <div class="term-shape"><span style="background: #ffff00"
                                                    class="term-shape-bg"></span><span
                                                    class="term-shape-border"></span></div><span
                                                class="term-name">Yellow</span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section id="tmcore-wp-widget-product-brand-nav-2"
                        class="widget tmcore-wp-widget-product-brand-nav tmcore-wp-widget-filter"><input
                            type="hidden" class="widget-instance"
                            data-name="TemplateMelaCore_WP_Widget_Product_Brand_Nav"
                            data-instance="{&quot;title&quot;:&quot;Brands&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;checkbox&quot;,&quot;items_count&quot;:&quot;on&quot;,&quot;show_hierarchy&quot;:0,&quot;enable_scrollable&quot;:0,&quot;enable_collapsed&quot;:0}" />
                        <h2 class="widget-title">Brands</h2>
                        <div class="widget-content">
                            <div class="widget-content-inner">
                                <ul class="show-display-list show-items-count-on list-style-checkbox">
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_product_brands=98"
                                            class="filter-link">EcoShop <span class="count">(1)</span></a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_product_brands=95"
                                            class="filter-link">QuickCart <span class="count">(2)</span></a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_product_brands=96"
                                            class="filter-link">SmartShop <span class="count">(1)</span></a></li>
                                    <li class="wc-layered-nav-term"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?filtering=1&#038;filter_product_brands=94"
                                            class="filter-link">TrendMart <span class="count">(2)</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section id="tmcore-wp-widget-product-price-filter-4"
                        class="widget tmcore-wp-widget-product-price-filter tmcore-wp-widget-filter"><input
                            type="hidden" class="widget-instance"
                            data-name="TemplateMelaCore_WP_Widget_Product_Price_Filter"
                            data-instance="{&quot;title&quot;:&quot;Price Filter&quot;,&quot;display_type&quot;:&quot;list&quot;,&quot;list_style&quot;:&quot;normal&quot;,&quot;enable_collapsed&quot;:0}" />
                        <h2 class="widget-title">Price Filter</h2>
                        <div class="widget-content">
                            <div class="widget-content-inner">
                                <ul
                                    class="tmcore-product-price-filter show-display-list list-style-normal single-choice">
                                    <li class="chosen">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/"
                                            class="filter-link">All </a>
                                    </li>
                                    <li class="">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?min_price=0&#038;max_price=150&#038;filtering=1"
                                            class="filter-link"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>0</bdi></span>
                                            &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>150</bdi></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?min_price=150&#038;max_price=300&#038;filtering=1"
                                            class="filter-link"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>150</bdi></span>
                                            &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>300</bdi></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?min_price=300&#038;max_price=450&#038;filtering=1"
                                            class="filter-link"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>300</bdi></span>
                                            &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>450</bdi></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?min_price=450&#038;max_price=600&#038;filtering=1"
                                            class="filter-link"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>450</bdi></span>
                                            &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>600</bdi></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?min_price=600&#038;max_price=750&#038;filtering=1"
                                            class="filter-link"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>600</bdi></span>
                                            &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>750</bdi></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section id="tmcore-wp-widget-product-rating-filter-4"
                        class="widget tmcore-wp-widget-product-rating-filter tmcore-wp-widget-filter"><input
                            type="hidden" class="widget-instance"
                            data-name="TemplateMelaCore_WP_Widget_Product_Rating_Filter"
                            data-instance="{&quot;title&quot;:&quot;Average Rating&quot;,&quot;enable_collapsed&quot;:0}" />
                        <h2 class="widget-title">Average Rating</h2>
                        <div class="widget-content">
                            <div class="widget-content-inner">
                                <ul class="show-display-list list-style-normal">
                                    <li class="wc-layered-nav-rating"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?rating_filter=5&#038;filtering=1"
                                            class="js-product-filter-link">
                                            <div class="tm-star-rating style-02"><svg
                                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg></div> <span class="count">(4)</span>
                                        </a></li>
                                    <li class="wc-layered-nav-rating"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?rating_filter=4&#038;filtering=1"
                                            class="js-product-filter-link">
                                            <div class="tm-star-rating style-02"><svg
                                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg></div> <span class="count">(3)</span>
                                        </a></li>
                                    <li class="wc-layered-nav-rating"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?rating_filter=3&#038;filtering=1"
                                            class="js-product-filter-link disabled">
                                            <div class="tm-star-rating style-02"><svg
                                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg></div> <span class="count">(0)</span>
                                        </a></li>
                                    <li class="wc-layered-nav-rating"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?rating_filter=2&#038;filtering=1"
                                            class="js-product-filter-link disabled">
                                            <div class="tm-star-rating style-02"><svg
                                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg></div> <span class="count">(0)</span>
                                        </a></li>
                                    <li class="wc-layered-nav-rating"><a
                                            href="https://demos.codezeel.com/wordpress/WCM08/WCM080193/default/product-category/beds/?rating_filter=1&#038;filtering=1"
                                            class="js-product-filter-link disabled">
                                            <div class="tm-star-rating style-02"><svg
                                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-full">
                                                    <path fill="#000000"
                                                        d="M512,197.816L325.961 185.585 255.898 9.569 185.835 185.585 0 197.816 142.534 318.842 95.762 502.431 255.898 401.21 416.035 502.431 369.263 318.842z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve" class="tm-star-empty">
                                                    <path fill="#000000 "
                                                        d="M512,197.819l-185.933-12.228L256,9.571l-70.067,176.021L0,197.82l142.658,120.93L95.856,502.429L256,401.214 l160.144,101.215l-46.8-183.671L512,197.819z M256,365.724l-112.464,71.08l32.827-128.831L75.829,222.888l130.971-8.603 L256,90.687l49.2,123.599l131.124,8.602l-100.689,85.077l32.829,128.839L256,365.724z">
                                                    </path>
                                                </svg></div> <span class="count">(0)</span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <style id='base_mega_menu_inline-inline-css'>
        #menu-item-384.base-menu-mega-enabled>.sub-menu{width:730px;}.header-navigation[class*="header-navigation-dropdown-animation-fade"] #menu-item-384.base-menu-mega-enabled>.sub-menu {
            margin-left: -365px;
        }

        #menu-item-384.base-menu-mega-enabled>.sub-menu {
            padding-top: 20px;
            padding-right: 30px;
            padding-bottom: 20px;
            padding-left: 30px;
        }

        #menu-item-385.base-menu-mega-enabled>.sub-menu{width:730px;}.header-navigation[class*="header-navigation-dropdown-animation-fade"] #menu-item-385.base-menu-mega-enabled>.sub-menu {
            margin-left: -365px;
        }

        #menu-item-386.base-menu-mega-enabled>.sub-menu{width:290px;}.header-navigation[class*="header-navigation-dropdown-animation-fade"] #menu-item-386.base-menu-mega-enabled>.sub-menu {
            margin-left: -145px;
        }

        #menu-item-386.base-menu-mega-enabled>.sub-menu {
            padding-top: 30px;
            padding-right: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
        }

        #menu-item-64.base-menu-mega-enabled>.sub-menu {
            padding-top: 30px;
            padding-right: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
        }

        #menu-item-69.base-menu-mega-enabled>.sub-menu {
            padding-top: 20px;
            padding-bottom: 16px;
            padding-left: 30px;
        }

        #menu-item-72.base-menu-mega-enabled>.sub-menu {
            background-color: var(--global-palette9);
        }

        #menu-item-72.base-menu-mega-enabled>.sub-menu {
            padding-top: 30px;
            padding-right: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
        }

        #menu-item-74.base-menu-mega-enabled>.sub-menu {
            padding-top: 30px;
            padding-left: 30px;
        }

        #menu-item-76.base-menu-mega-enabled>.sub-menu{width:290px;}.header-navigation[class*="header-navigation-dropdown-animation-fade"] #menu-item-76.base-menu-mega-enabled>.sub-menu {
            margin-left: -145px;
        }

        #menu-item-76.base-menu-mega-enabled>.sub-menu {
            padding-top: 30px;
            padding-right: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
        }
    </style>

    <script>
        window.RS_MODULES = window.RS_MODULES || {};
        window.RS_MODULES.modules = window.RS_MODULES.modules || {};
        window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
        window.RS_MODULES.defered = true;
        window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
        window.RS_MODULES.type = 'compiled';
    </script>
    <script>
        document.documentElement.style.setProperty('--scrollbar-offset', window.innerWidth - document.documentElement
            .clientWidth + 'px');
    </script>



    <div id="cart-drawer"
        class="popup-drawer popup-drawer-layout-sidepanel popup-drawer-side-right popup-mobile-drawer-side-right"
        data-drawer-target-string="#cart-drawer">
        <div class="drawer-overlay" data-drawer-target-string="#cart-drawer"></div>
        <div class="drawer-inner">
            <div class="drawer-header">
                <h2 class="side-cart-header">Giỏ hàng</h2>
                <button class="cart-toggle-close drawer-toggle" aria-label="Close Cart"
                    data-toggle-target="#cart-drawer" data-toggle-body-class="showing-popup-drawer-from-right"
                    aria-expanded="false" data-set-focus=".header-cart-button">
                    <span class="base-svg-iconset"><svg class="base-svg-icon base-close-svg" fill="currentColor"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <title>Toggle Menu Close</title>
                            <path
                                d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z">
                            </path>
                        </svg></span> </button>
            </div>
            <div class="drawer-content woocommerce widget_shopping_cart">
                <div class="mini-cart-container">
                    <div class="base-mini-cart-refresh">


                        <div class="woocommerce-mini-cart__empty-message">
                            <h4>Giỏ hàng trống</h4>
                            <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                            <a class="button" href="#">Bắt đầu mua hàng</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function() {
            function maybePrefixUrlField() {
                const value = this.value.trim()
                if (value !== '' && value.indexOf('http') !== 0) {
                    this.value = 'http://' + value
                }
            }

            const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
            for (let j = 0; j < urlFields.length; j++) {
                urlFields[j].addEventListener('blur', maybePrefixUrlField)
            }
        })();
    </script>
    <div class="woosc-popup woosc-search">
        <div class="woosc-popup-inner">
            <div class="woosc-popup-content">
                <div class="woosc-popup-content-inner">
                    <div class="woosc-popup-close"></div>
                    <div class="woosc-search-input">
                        <label for="woosc_search_input"></label><input type="search" id="woosc_search_input"
                            placeholder="Type any keyword to search..." />
                    </div>
                    <div class="woosc-search-result"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="woosc-popup woosc-settings">
        <div class="woosc-popup-inner">
            <div class="woosc-popup-content">
                <div class="woosc-popup-content-inner">
                    <div class="woosc-popup-close"></div>
                    <ul class="woosc-settings-tools">
                        <li>
                            <label><input type="checkbox" class="woosc-settings-tool" value="hide_similarities"
                                    id="woosc_hide_similarities" /> Hide similarities </label>
                        </li>
                        <li>
                            <label><input type="checkbox" class="woosc-settings-tool" value="highlight_differences"
                                    id="woosc_highlight_differences" /> Highlight differences </label>
                        </li>
                    </ul>
                    Select the fields to be shown. Others will be hidden. Drag and drop to rearrange the order. <ul
                        class="woosc-settings-fields">
                        <li class="woosc-settings-field-li"><input type="checkbox" class="woosc-settings-field"
                                value="88izex" checked /><span class="move">Image</span></li>
                        <li class="woosc-settings-field-li"><input type="checkbox" class="woosc-settings-field"
                                value="u0cjjd" checked /><span class="move">Rating</span></li>
                        <li class="woosc-settings-field-li"><input type="checkbox" class="woosc-settings-field"
                                value="fmfd" checked /><span class="move">Price</span></li>
                        <li class="woosc-settings-field-li"><input type="checkbox" class="woosc-settings-field"
                                value="79or" checked /><span class="move">Add to cart</span></li>
                        <li class="woosc-settings-field-li"><input type="checkbox" class="woosc-settings-field"
                                value="4bqu" checked /><span class="move">Availability</span></li>
                        <li class="woosc-settings-field-li"><input type="checkbox" class="woosc-settings-field"
                                value="a3c4" checked /><span class="move">Additional information</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="woosc-popup woosc-share">
        <div class="woosc-popup-inner">
            <div class="woosc-popup-content">
                <div class="woosc-popup-content-inner">
                    <div class="woosc-popup-close"></div>
                    <div class="woosc-share-content"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="woosc-area"
        class="woosc-area woosc-bar-bottom woosc-bar-right woosc-bar-click-outside-yes woosc-hide-checkout"
        data-bg-color="#292a30" data-btn-color="#00a0d2">
        <div class="woosc-inner">
            <div class="woosc-table">
                <div class="woosc-table-inner">
                    <a href="#close" id="woosc-table-close" class="woosc-table-close hint--left"
                        aria-label="Close"><span class="woosc-table-close-icon"></span></a>
                    <div class="woosc-table-items"></div>
                </div>
            </div>

            <div class="woosc-bar">
                <div class="woosc-bar-notice">
                    Click outside to hide the comparison bar </div>
                <a href="#print" class="woosc-bar-print hint--top" aria-label="Print"></a>
                <a href="#share" class="woosc-bar-share hint--top" aria-label="Share"></a>
                <a href="#search" class="woosc-bar-search hint--top" aria-label="Add product"></a>
                <div class="woosc-bar-items"></div>
                <div class="woosc-bar-btn woosc-bar-btn-text">
                    <div class="woosc-bar-btn-icon-wrapper">
                        <div class="woosc-bar-btn-icon-inner"><span></span><span></span><span></span>
                        </div>
                    </div>
                    Compare
                </div>
            </div>

        </div>
    </div>
    <div id="woosw_wishlist" class="woosw-popup woosw-popup-center"></div><a id="bt-scroll-up" tabindex="-1"
        aria-hidden="true" aria-label="Scroll to top" href="#wrapper"
        class="base-scroll-to-top scroll-up-wrap scroll-ignore scroll-up-side-right scroll-up-style-filled vs-lg-true vs-md-true vs-sm-true"><span
            class="base-svg-iconset"><svg aria-hidden="true" class="base-svg-icon base-arrow-up-svg"
                fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24">
                <title>Scroll to top</title>
                <path
                    d="M5.707 12.707l5.293-5.293v11.586c0 0.552 0.448 1 1 1s1-0.448 1-1v-11.586l5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-7-7c-0.092-0.092-0.202-0.166-0.324-0.217s-0.253-0.076-0.383-0.076c-0.256 0-0.512 0.098-0.707 0.293l-7 7c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0z">
                </path>
            </svg></span></a><button id="bt-scroll-up-reader" href="#wrapper" aria-label="Scroll to top"
        class="base-scroll-to-top scroll-up-wrap scroll-ignore scroll-up-side-right scroll-up-style-filled vs-lg-true vs-md-true vs-sm-true"><span
            class="base-svg-iconset"><svg aria-hidden="true" class="base-svg-icon base-arrow-up-svg"
                fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24">
                <title>Scroll to top</title>
                <path
                    d="M5.707 12.707l5.293-5.293v11.586c0 0.552 0.448 1 1 1s1-0.448 1-1v-11.586l5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-7-7c-0.092-0.092-0.202-0.166-0.324-0.217s-0.253-0.076-0.383-0.076c-0.256 0-0.512 0.098-0.707 0.293l-7 7c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0z">
                </path>
            </svg></span></button>

    <script>
        const lazyloadRunObserver = () => {
            const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
            const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        let lazyloadBackground = entry.target;
                        if (lazyloadBackground) {
                            lazyloadBackground.classList.add('e-lazyloaded');
                        }
                        lazyloadBackgroundObserver.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '200px 0px 200px 0px'
            });
            lazyloadBackgrounds.forEach((lazyloadBackground) => {
                lazyloadBackgroundObserver.observe(lazyloadBackground);
            });
        };
        const events = [
            'DOMContentLoaded',
            'elementor/lazyload/observe',
        ];
        events.forEach((event) => {
            document.addEventListener(event, lazyloadRunObserver);
        });
    </script>
    <script>
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>

    <link rel='stylesheet' id='elementor-post-102-css'
        href='{{ asset('modules/publish/css/post-102.css?ver=1740568330') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-399-css'
        href='{{ asset('modules/publish/css/post-399.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='widget-heading-css'
        href='{{ asset('modules/publish/css/widget-heading.min.css?ver=3.27.6') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-101-css'
        href='{{ asset('modules/publish/css/post-101.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='widget-image-css'
        href='{{ asset('modules/publish/css/widget-image.min.css?ver=3.27.6') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-246-css'
        href='{{ asset('modules/publish/css/post-246.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-96-css'
        href='{{ asset('modules/publish/css/post-96.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-97-css'
        href='{{ asset('modules/publish/css/post-97.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-247-css'
        href='{{ asset('modules/publish/css/post-247.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-1003-css'
        href='{{ asset('modules/publish/css/post-1003.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-1004-css'
        href='{{ asset('modules/publish/css/post-1004.css?ver=1740568331') }}' media='all' />
    <link rel='stylesheet' id='elementor-icons-css'
        href='{{ asset('modules/publish/css/elementor-icons.min.css?ver=5.35.0') }}' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css' href='{{ asset('modules/publish/css/rs6.css?ver=6.7.29') }}'
        media='all' />
    <style id='rs-plugin-settings-inline-css'>
        #rs-demo-id {}
    </style>
    <script src="{{ asset('modules/publish/js/hooks.min.js?ver=4d63a3d491d11ffd8ac6') }}" id="wp-hooks-js"></script>
    <script src="{{ asset('modules/publish/js/i18n.min.js?ver=5e580eb46a90c2b997e6') }}" id="wp-i18n-js"></script>
    <script id="wp-i18n-js-after">
        wp.i18n.setLocaleData({
            'text direction\u0004ltr': ['ltr']
        });
    </script>
    <script src="{{ asset('modules/publish/js/index.js?ver=6.0.4') }}" id="swv-js"></script>
    <script id="contact-form-7-js-before">
        var wpcf7 = {
            "api": {
                "root": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            }
        };
    </script>
    <script src="{{ asset('modules/publish/js/index.js?ver=6.0.4') }}" id="contact-form-7-js"></script>
    <script src="{{ asset('modules/publish/js/rbtools.min.js?ver=6.7.29') }}" defer async id="tp-tools-js"></script>
    <script src="{{ asset('modules/publish/js/rs6.min.js?ver=6.7.29') }}" defer async id="revmin-js"></script>
    <script src="{{ asset('modules/publish/js/perfect-scrollbar.min.js?ver=3.4.0') }}" id="perfect-scrollbar-js"></script>
    <script src="{{ asset('modules/publish/js/countdown.min.js?ver=3.4.0') }}" id="tmcore-countdown-js"></script>
    <script src="{{ asset('modules/publish/js/frontend.min.js?ver=3.4.0') }}" id="tmcore-frontend-js-js"></script>
    <script src="{{ asset('modules/publish/js/jQuery.print.js?ver=6.4.4') }}" id="print-js"></script>
    <script src="{{ asset('modules/publish/js/table-head-fixer.js?ver=6.4.4') }}" id="table-head-fixer-js"></script>
    <script src="{{ asset('modules/publish/js/core.min.js?ver=1.13.3') }}" id="jquery-ui-core-js"></script>
    <script src="{{ asset('modules/publish/js/mouse.min.js?ver=1.13.3') }}" id="jquery-ui-mouse-js"></script>
    <script src="{{ asset('modules/publish/js/sortable.min.js?ver=1.13.3') }}" id="jquery-ui-sortable-js"></script>
    <script id="woosc-frontend-js-extra">
        var woosc_vars = {
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "nonce": "f90ac441cb",
            "hash": "pa5t",
            "user_id": "0cdb64fab32a05bd393b20c8c351de9f",
            "page_url": "#",
            "open_button": "",
            "hide_empty_row": "yes",
            "reload_count": "no",
            "variations": "yes",
            "open_button_action": "open_popup",
            "menu_action": "open_popup",
            "button_action": "show_table",
            "sidebar_position": "right",
            "message_position": "right-top",
            "message_added": "{name} has been added to Compare list.",
            "message_removed": "{name} has been removed from the Compare list.",
            "message_exists": "{name} is already in the Compare list.",
            "open_bar": "no",
            "bar_filter": "no",
            "bar_bubble": "no",
            "adding": "prepend",
            "click_again": "no",
            "hide_empty": "no",
            "click_outside": "yes",
            "freeze_column": "yes",
            "freeze_row": "yes",
            "scrollbar": "yes",
            "limit": "100",
            "remove_all": "Do you want to remove all products from the compare?",
            "limit_notice": "You can add a maximum of {limit} products to the comparison table.",
            "copied_text": "Share link %s was copied to clipboard!",
            "button_text": "Compare",
            "button_text_added": "Compare",
            "button_normal_icon": "woosc-icon-1",
            "button_added_icon": "woosc-icon-74",
            "quick_table_fixed": "{\"pc\":2,\"ta\":1,\"mo\":0}"
        };
    </script>
    <script src="{{ asset('modules/publish/js/frontend.js?ver=6.4.4') }}" id="woosc-frontend-js"></script>
    <script id="wc-add-to-cart-variation-js-extra">
        var wc_add_to_cart_variation_params = {
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "i18n_no_matching_variations_text": "Sorry, no products matched your selection. Please choose a different combination.",
            "i18n_make_a_selection_text": "Please select some product options before adding this product to your cart.",
            "i18n_unavailable_text": "Sorry, this product is unavailable. Please choose a different combination.",
            "i18n_reset_alert_text": "Your selection has been reset. Please select some product options before adding this product to your cart."
        };
    </script>
    <script src="{{ asset('modules/publish/js/add-to-cart-variation.min.js?ver=9.7.0') }}" id="wc-add-to-cart-variation-js"
        data-wp-strategy="defer"></script>
    <script src="{{ asset('modules/publish/js/slick.min.js?ver=4.1.6') }}" id="slick-js"></script>
    <script src="{{ asset('modules/publish/js/jquery.magnific-popup.min.js?ver=4.1.6') }}" id="magnific-popup-js"></script>
    <script id="woosq-frontend-js-extra">
        var woosq_vars = {
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "nonce": "449a93ba36",
            "view": "popup",
            "effect": "mfp-3d-unfold",
            "scrollbar": "yes",
            "auto_close": "yes",
            "hashchange": "no",
            "cart_redirect": "no",
            "cart_url": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/cart\/",
            "close": "Close (Esc)",
            "next_prev": "yes",
            "next": "Next (Right arrow key)",
            "prev": "Previous (Left arrow key)",
            "thumbnails_effect": "no",
            "related_slick_params": "{\"slidesToShow\":2,\"slidesToScroll\":2,\"dots\":true,\"arrows\":false,\"adaptiveHeight\":true,\"rtl\":false}",
            "thumbnails_slick_params": "{\"slidesToShow\":1,\"slidesToScroll\":1,\"dots\":true,\"arrows\":true,\"adaptiveHeight\":false,\"rtl\":false}",
            "thumbnails_zoom_params": "{\"duration\":120,\"magnify\":1}",
            "quick_view": "0"
        };
    </script>
    <script src="{{ asset('modules/publish/js/frontend.js?ver=4.1.6') }}" id="woosq-frontend-js"></script>
    <script id="woosw-frontend-js-extra">
        var woosw_vars = {
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "nonce": "0b5be1eca7",
            "added_to_cart": "no",
            "auto_remove": "no",
            "page_myaccount": "yes",
            "menu_action": "open_page",
            "reload_count": "no",
            "perfect_scrollbar": "yes",
            "wishlist_url": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wishlist\/",
            "button_action": "list",
            "message_position": "right-top",
            "button_action_added": "popup",
            "empty_confirm": "This action cannot be undone. Are you sure?",
            "delete_confirm": "This action cannot be undone. Are you sure?",
            "copied_text": "Copied the wishlist link:",
            "menu_text": "Wishlist",
            "button_text": "Add to wishlist",
            "button_text_added": "Browse wishlist",
            "button_normal_icon": "woosw-icon-5",
            "button_added_icon": "woosw-icon-8",
            "button_loading_icon": "woosw-icon-4"
        };
    </script>
    <script src="{{ asset('modules/publish/js/frontend.js?ver=4.9.8') }}" id="woosw-frontend-js"></script>
    <script id="base-navigation-js-extra">
        var baseConfig = {
            "screenReader": {
                "expand": "Child menu",
                "expandOf": "Child menu of",
                "collapse": "Child menu",
                "collapseOf": "Child menu of"
            },
            "breakPoints": {
                "desktop": "1024",
                "tablet": 768
            },
            "scrollOffset": "0"
        };
    </script>
    <script src="{{ asset('modules/publish/js/navigation.min.js?ver=1.5.3') }}" id="base-navigation-js"></script>
    <script src="{{ asset('modules/publish/js/shop-spinner.min.js?ver=1.5.3') }}" id="base-shop-spinner-js"></script>
    <script src="{{ asset('modules/publish/js/sourcebuster.min.js?ver=9.7.0') }}" id="sourcebuster-js-js"></script>
    <script id="wc-order-attribution-js-extra">
        var wc_order_attribution = {
            "params": {
                "lifetime": 1.0e-5,
                "session": 30,
                "base64": false,
                "ajaxurl": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php",
                "prefix": "wc_order_attribution_",
                "allowTracking": true
            },
            "fields": {
                "source_type": "current.typ",
                "referrer": "current_add.rf",
                "utm_campaign": "current.cmp",
                "utm_source": "current.src",
                "utm_medium": "current.mdm",
                "utm_content": "current.cnt",
                "utm_id": "current.id",
                "utm_term": "current.trm",
                "utm_source_platform": "current.plt",
                "utm_creative_format": "current.fmt",
                "utm_marketing_tactic": "current.tct",
                "session_entry": "current_add.ep",
                "session_start_time": "current_add.fd",
                "session_pages": "session.pgs",
                "session_count": "udata.vst",
                "user_agent": "udata.uag"
            }
        };
    </script>
    <script src="{{ asset('modules/publish/js/order-attribution.min.js?ver=9.7.0') }}" id="wc-order-attribution-js">
    </script>
    <script src="{{ asset('modules/publish/js/splide.min.js?ver=3.4.0') }}" id="base-splide-js"></script>
    <script src="{{ asset('modules/publish/js/splide-extension-grid.min.js?ver=3.4.0') }}" id="base-splide-grid-js">
    </script>
    <script src="{{ asset('modules/publish/js/bt_variation_swatches.js?ver=3.4.0') }}" id="base_variation_swatches-js">
    </script>
    <script id="base-snackbar-notice-js-extra">
        var base_wsb = {
            "close": "Dismiss Notice"
        };
    </script>
    <script src="{{ asset('modules/publish/js/base-snackbar-notice.min.js?ver=3.4.0') }}" id="base-snackbar-notice-js">
    </script>
    <script src="{{ asset('modules/publish/js/main.min.js?ver=3.4.0') }}" id="tmcore-woocommerce-main-js"></script>
    <script id="tmcore-common-archive-js-extra">
        var tmCoreShop = {
            "total": "8",
            "per_page": "20",
            "current": "1",
            "pagination_type": "load-more",
            "is_collapsable": "1"
        };
    </script>
    <script src="{{ asset('modules/publish/js/common-archive.min.js?ver=3.4.0') }}" id="tmcore-common-archive-js">
    </script>
    <script id="tmc-notifications-js-before">
        var tmcore_notification_count = 2;
        var tmcore_notification = [{
            "product_image": "<img width=\"100\" height=\"100\" src=\"https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-100x100.jpg\" class=\"attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail\" alt=\"\" decoding=\"async\" srcset=\"https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-100x100.jpg 100w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-300x300.jpg 300w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-150x150.jpg 150w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-768x768.jpg 768w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-600x600.jpg 600w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-96x96.jpg 96w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-460x460.jpg 460w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-120x120.jpg 120w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-60x60.jpg 60w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-236x236.jpg 236w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-118x118.jpg 118w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-296x296.jpg 296w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1-148x148.jpg 148w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/14-1.jpg 1000w\" sizes=\"(max-width: 100px) 100vw, 100px\" \/>",
            "product_info": "Alejandro (Paris) purchased",
            "product_url": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/product\/ferm-living-catena-sofa-corner-cotton-linen\/",
            "product_name": "Ferm Living Catena Sofa Corner Cotton Linen",
            "time_purchase": "23 hours ago",
            "product_data": "205"
        }, {
            "product_image": "<img width=\"100\" height=\"100\" src=\"https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-100x100.jpg\" class=\"attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail\" alt=\"\" decoding=\"async\" srcset=\"https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-100x100.jpg 100w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-300x300.jpg 300w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-150x150.jpg 150w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-768x768.jpg 768w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-600x600.jpg 600w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-96x96.jpg 96w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-460x460.jpg 460w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-236x236.jpg 236w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-118x118.jpg 118w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-296x296.jpg 296w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1-148x148.jpg 148w, https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads\/2023\/12\/13-1.jpg 1000w\" sizes=\"(max-width: 100px) 100vw, 100px\" \/>",
            "product_info": "Henry (NewYork) purchased ",
            "product_url": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/product\/ferm-living-isola-comfortable-storage-table\/",
            "product_name": "Ferm Living Isola Comfortable Storage Table",
            "time_purchase": "16 hours ago",
            "product_data": "214"
        }]
    </script>
    <script src="{{ asset('modules/publish/js/notifications.min.js?ver=3.4.0') }}" id="tmc-notifications-js"></script>
    <script id="wc-cart-fragments-js-extra">
        var wc_cart_fragments_params = {
            "ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/wordpress\/WCM08\/WCM080193\/default\/?wc-ajax=%%endpoint%%",
            "cart_hash_key": "wc_cart_hash_5a2a0492cdcfc71401bd0cc02066e83a",
            "fragment_name": "wc_fragments_5a2a0492cdcfc71401bd0cc02066e83a",
            "request_timeout": "5000"
        };
    </script>
    <script src="{{ asset('modules/publish/js/cart-fragments.min.js?ver=9.7.0') }}" id="wc-cart-fragments-js" defer
        data-wp-strategy="defer"></script>
    <script src="{{ asset('modules/publish/js/vertical-navigation.min.js?ver=3.4.0') }}" id="vertical-navigation-js">
    </script>
    <script src="{{ asset('modules/publish/js/base-mega-menu.min.js?ver=3.4.0') }}" id="base-mega-menu-js"></script>
    <script src="{{ asset('modules/publish/js/webpack.runtime.min.js?ver=3.27.6') }}" id="elementor-webpack-runtime-js">
    </script>
    <script src="{{ asset('modules/publish/js/frontend-modules.min.js?ver=3.27.6') }}" id="elementor-frontend-modules-js">
    </script>
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false,
                "isScriptDebug": false
            },
            "i18n": {
                "shareOnFacebook": "Share on Facebook",
                "shareOnTwitter": "Share on Twitter",
                "pinIt": "Pin it",
                "download": "Download",
                "downloadImage": "Download image",
                "fullscreen": "Fullscreen",
                "zoom": "Zoom",
                "share": "Share",
                "playVideo": "Play Video",
                "previous": "Previous",
                "next": "Next",
                "close": "Close",
                "a11yCarouselPrevSlideMessage": "Previous slide",
                "a11yCarouselNextSlideMessage": "Next slide",
                "a11yCarouselFirstSlideMessage": "This is the first slide",
                "a11yCarouselLastSlideMessage": "This is the last slide",
                "a11yCarouselPaginationBulletMessage": "Go to slide"
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile Portrait",
                        "value": 767,
                        "default_value": 767,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "mobile_extra": {
                        "label": "Mobile Landscape",
                        "value": 880,
                        "default_value": 880,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "tablet": {
                        "label": "Tablet Portrait",
                        "value": 1024,
                        "default_value": 1024,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "tablet_extra": {
                        "label": "Tablet Landscape",
                        "value": 1200,
                        "default_value": 1200,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "laptop": {
                        "label": "Laptop",
                        "value": 1366,
                        "default_value": 1366,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "widescreen": {
                        "label": "Widescreen",
                        "value": 2400,
                        "default_value": 2400,
                        "direction": "min",
                        "is_enabled": false
                    }
                },
                "hasCustomBreakpoints": true
            },
            "version": "3.27.6",
            "is_static": false,
            "experimentalFeatures": {
                "additional_custom_breakpoints": true,
                "e_swiper_latest": true,
                "e_onboarding": true,
                "home_screen": true,
                "landing-pages": true,
                "editor_v2": true,
                "link-in-bio": true,
                "floating-buttons": true
            },
            "urls": {
                "assets": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/plugins\/elementor\/assets\/",
                "ajaxurl": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php",
                "uploadUrl": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-content\/uploads"
            },
            "nonces": {
                "floatingButtonsClickTracking": "fd057bb363"
            },
            "swiperClass": "swiper",
            "settings": {
                "editorPreferences": []
            },
            "kit": {
                "active_breakpoints": ["viewport_mobile", "viewport_tablet", "viewport_laptop"],
                "global_image_lightbox": "yes",
                "lightbox_enable_counter": "yes",
                "lightbox_enable_fullscreen": "yes",
                "lightbox_enable_zoom": "yes",
                "lightbox_enable_share": "yes",
                "lightbox_title_src": "title",
                "lightbox_description_src": "description"
            },
            "post": {
                "id": 0,
                "title": "Beds - Couchly Demo",
                "excerpt": ""
            }
        };
    </script>
    <script src="{{ asset('modules/publish/js/frontend.min2.js?ver=3.27.6') }}" id="elementor-frontend-js"></script>
    <script src="{{ asset('modules/publish/js/products.min.js?ver=3.4.0') }}" id="tmcore-elementor-products-js"></script>
    <script src="{{ asset('modules/publish/js/product-tab.min.js?ver=3.4.0') }}" id="tmcore-elementor-product-tab-js">
    </script>
    <script id="base-shop-toggle-js-extra">
        var baseShopConfig = {
            "siteSlug": "couchly-demo"
        };
    </script>
    <script src="{{ asset('modules/publish/js/shop-toggle.min.js?ver=1.5.3') }}" id="base-shop-toggle-js"></script>
    <script defer src="{{ asset('modules/publish/js/forms.js?ver=4.10.1') }}" id="mc4wp-forms-api-js"></script>
    <script id="base-pro-woocommerce-js-extra">
        var baseProWooConfig = {
            "openCart": ""
        };
    </script>
    <script src="{{ asset('modules/publish/js/pro-woocommerce.min.js?ver=3.4.0') }}" id="base-pro-woocommerce-js">
    </script>
    <script id="search-advanced-js-extra">
        var searchAdvancedConfig = {
            "ajaxURL": "https:\/\/demos.codezeel.com\/wordpress\/WCM08\/WCM080193\/default\/wp-admin\/admin-ajax.php"
        };
    </script>
    <script src="{{ asset('modules/publish/js/search-advanced.min.js?ver=3.4.0') }}" id="search-advanced-js"></script>
    <script src="{{ asset('modules/publish/js/elementor-frontend.min.js?ver=3.4.0') }}" id="tmcore-elementor-frontend-js">
    </script>
   
    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.querySelectorAll('.alert-dismissible').forEach(function(el) {
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500);
                });
            }, 3000);
        });
    </script>

</body>

</html>
