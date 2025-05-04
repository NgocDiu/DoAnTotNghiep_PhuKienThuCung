@extends('admin::layouts.master')

@section('content')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->


        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Home</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Page Views</h6>
                        <h4 class="mb-3">4,42,236 <span class="badge bg-light-primary border border-primary"><i
                                    class="ti ti-trending-up"></i> 59.3%</span></h4>
                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this
                            year
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
                        <h4 class="mb-3">78,250 <span class="badge bg-light-success border border-success"><i
                                    class="ti ti-trending-up"></i> 70.5%</span></h4>
                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-success">8,900</span> this
                            year</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Order</h6>
                        <h4 class="mb-3">18,800 <span class="badge bg-light-warning border border-warning"><i
                                    class="ti ti-trending-down"></i> 27.4%</span></h4>
                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-warning">1,943</span> this
                            year</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Sales</h6>
                        <h4 class="mb-3">$35,078 <span class="badge bg-light-danger border border-danger"><i
                                    class="ti ti-trending-down"></i> 27.4%</span></h4>
                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-danger">$20,395</span> this
                            year
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Unique Visitor</h5>
                    <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="chart-tab-home-tab" data-bs-toggle="pill"
                                data-bs-target="#chart-tab-home" type="button" role="tab"
                                aria-controls="chart-tab-home" aria-selected="false" tabindex="-1">Month</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="chart-tab-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#chart-tab-profile" type="button" role="tab"
                                aria-controls="chart-tab-profile" aria-selected="true">Week</button>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="chart-tab-tabContent">
                            <div class="tab-pane" id="chart-tab-home" role="tabpanel" aria-labelledby="chart-tab-home-tab"
                                tabindex="0">
                                <div id="visitor-chart-1" style="min-height: 465px;">
                                    <div id="apexcharts2o3qbc5w" class="apexcharts-canvas apexcharts2o3qbc5w"
                                        style="width: 0px; height: 450px;"><svg id="SvgjsSvg1786" width="0"
                                            height="450" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <foreignObject x="0" y="0" width="0" height="450">
                                                <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div>
                                            </foreignObject>
                                            <g id="SvgjsG1788" class="apexcharts-inner apexcharts-graphical">
                                                <defs id="SvgjsDefs1787"></defs>
                                            </g>
                                        </svg></div>
                                </div>
                            </div>
                            <div class="tab-pane show active" id="chart-tab-profile" role="tabpanel"
                                aria-labelledby="chart-tab-profile-tab" tabindex="0">
                                <div id="visitor-chart" style="min-height: 465px;">
                                    <div id="apexchartsfdgtubew"
                                        class="apexcharts-canvas apexchartsfdgtubew apexcharts-theme-light"
                                        style="width: 729px; height: 450px;"><svg id="SvgjsSvg1690" width="729"
                                            height="450" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                            transform="translate(0, 0)" style="background: transparent;">
                                            <foreignObject x="0" y="0" width="729" height="450">
                                                <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                    style="inset: auto 0px 1px; position: absolute; max-height: 225px;">
                                                    <div class="apexcharts-legend-series" rel="1"
                                                        seriesname="PagexViews" data:collapsed="false"
                                                        style="margin: 2px 5px;"><span class="apexcharts-legend-marker"
                                                            rel="1" data:collapsed="false"
                                                            style="background: rgb(24, 144, 255) !important; color: rgb(24, 144, 255); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                            class="apexcharts-legend-text" rel="1" i="0"
                                                            data:default-text="Page%20Views" data:collapsed="false"
                                                            style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Page
                                                            Views</span></div>
                                                    <div class="apexcharts-legend-series" rel="2"
                                                        seriesname="Sessions" data:collapsed="false"
                                                        style="margin: 2px 5px;"><span class="apexcharts-legend-marker"
                                                            rel="2" data:collapsed="false"
                                                            style="background: rgb(19, 194, 194) !important; color: rgb(19, 194, 194); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                            class="apexcharts-legend-text" rel="2" i="1"
                                                            data:default-text="Sessions" data:collapsed="false"
                                                            style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Sessions</span>
                                                    </div>
                                                </div>
                                            @section('styles')
                                                <style type="text/css">
                                                    .apexcharts-legend {
                                                        display: flex;
                                                        overflow: auto;
                                                        padding: 0 10px;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                    .apexcharts-legend.apx-legend-position-top {
                                                        flex-wrap: wrap
                                                    }

                                                    .apexcharts-legend.apx-legend-position-right,
                                                    .apexcharts-legend.apx-legend-position-left {
                                                        flex-direction: column;
                                                        bottom: 0;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                    .apexcharts-legend.apx-legend-position-right,
                                                    .apexcharts-legend.apx-legend-position-left {
                                                        justify-content: flex-start;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                        justify-content: center;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                        justify-content: flex-end;
                                                    }

                                                    .apexcharts-legend-series {
                                                        cursor: pointer;
                                                        line-height: normal;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                    .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                        display: flex;
                                                        align-items: center;
                                                    }

                                                    .apexcharts-legend-text {
                                                        position: relative;
                                                        font-size: 14px;
                                                    }

                                                    .apexcharts-legend-text *,
                                                    .apexcharts-legend-marker * {
                                                        pointer-events: none;
                                                    }

                                                    .apexcharts-legend-marker {
                                                        position: relative;
                                                        display: inline-block;
                                                        cursor: pointer;
                                                        margin-right: 3px;
                                                        border-style: solid;
                                                    }

                                                    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                    .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                        display: inline-block;
                                                    }

                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                        cursor: auto;
                                                    }

                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                        display: none !important;
                                                    }

                                                    .apexcharts-inactive-legend {
                                                        opacity: 0.45;
                                                    }
                                                </style>
                                            @stop
                                        </foreignObject>
                                        <rect id="SvgjsRect1695" width="0" height="0" x="0" y="0"
                                            rx="0" ry="0" opacity="1" stroke-width="0"
                                            stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                        <g id="SvgjsG1762" class="apexcharts-yaxis" rel="0"
                                            transform="translate(15.635351181030273, 0)">
                                            <g id="SvgjsG1763" class="apexcharts-yaxis-texts-g"><text
                                                    id="SvgjsText1765" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="31.4" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1766">120</tspan>
                                                    <title>120</title>
                                                </text><text id="SvgjsText1768"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="122.64879984569549" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1769">90</tspan>
                                                    <title>90</title>
                                                </text><text id="SvgjsText1771"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="213.89759969139098" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1772">60</tspan>
                                                    <title>60</title>
                                                </text><text id="SvgjsText1774"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="305.14639953708644" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1775">30</tspan>
                                                    <title>30</title>
                                                </text><text id="SvgjsText1777"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="396.3951993827819" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1778">0</tspan>
                                                    <title>0</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG1692" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(45.63535118103027, 30)">
                                            <defs id="SvgjsDefs1691">
                                                <clipPath id="gridRectMaskfdgtubew">
                                                    <rect id="SvgjsRect1697" width="667.6833982467651"
                                                        height="376.99519938278195" x="-4" y="-6" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskfdgtubew"></clipPath>
                                                <clipPath id="nonForecastMaskfdgtubew"></clipPath>
                                                <clipPath id="gridRectMarkerMaskfdgtubew">
                                                    <rect id="SvgjsRect1698" width="665.6833982467651"
                                                        height="368.99519938278195" x="-2" y="-2" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient1703" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1704" stop-opacity="0.65"
                                                        stop-color="rgba(24,144,255,0.65)" offset="0"></stop>
                                                    <stop id="SvgjsStop1705" stop-opacity="0.5"
                                                        stop-color="rgba(140,200,255,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1706" stop-opacity="0.5"
                                                        stop-color="rgba(140,200,255,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient1712" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1713" stop-opacity="0.65"
                                                        stop-color="rgba(19,194,194,0.65)" offset="0"></stop>
                                                    <stop id="SvgjsStop1714" stop-opacity="0.5"
                                                        stop-color="rgba(137,225,225,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1715" stop-opacity="0.5"
                                                        stop-color="rgba(137,225,225,0.5)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine1696" x1="0" y1="0" x2="0"
                                                y2="364.99519938278195" stroke="#b6b6b6" stroke-dasharray="3"
                                                stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0"
                                                width="1" height="364.99519938278195" fill="#b1b9c4"
                                                filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                            <line id="SvgjsLine1722" x1="0" y1="365.99519938278195"
                                                x2="0" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1723" x1="110.28056637446086" y1="365.99519938278195"
                                                x2="110.28056637446086" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1724" x1="220.56113274892172" y1="365.99519938278195"
                                                x2="220.56113274892172" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1725" x1="330.84169912338257" y1="365.99519938278195"
                                                x2="330.84169912338257" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1726" x1="441.12226549784344" y1="365.99519938278195"
                                                x2="441.12226549784344" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1727" x1="551.4028318723043" y1="365.99519938278195"
                                                x2="551.4028318723043" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1728" x1="661.6833982467651" y1="365.99519938278195"
                                                x2="661.6833982467651" y2="371.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <g id="SvgjsG1718" class="apexcharts-grid">
                                                <g id="SvgjsG1719" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1730" x1="0" y1="91.24879984569549"
                                                        x2="661.6833982467651" y2="91.24879984569549"
                                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1731" x1="0" y1="182.49759969139097"
                                                        x2="661.6833982467651" y2="182.49759969139097"
                                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1732" x1="0" y1="273.74639953708646"
                                                        x2="661.6833982467651" y2="273.74639953708646"
                                                        stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1720" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine1735" x1="0" y1="364.99519938278195"
                                                    x2="661.6833982467651" y2="364.99519938278195"
                                                    stroke="transparent" stroke-dasharray="0" stroke-linecap="butt">
                                                </line>
                                                <line id="SvgjsLine1734" x1="0" y1="1"
                                                    x2="0" y2="364.99519938278195" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1721" class="apexcharts-grid-borders">
                                                <line id="SvgjsLine1729" x1="0" y1="0"
                                                    x2="661.6833982467651" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1733" x1="0" y1="364.99519938278195"
                                                    x2="661.6833982467651" y2="364.99519938278195" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1761" x1="0" y1="365.99519938278195"
                                                    x2="661.6833982467651" y2="365.99519938278195" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt">
                                                </line>
                                            </g>
                                            <g id="SvgjsG1699" class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG1700" class="apexcharts-series" zIndex="0"
                                                    seriesName="PagexViews" data:longestSeries="true" rel="1"
                                                    data:realIndex="0">
                                                    <path id="SvgjsPath1707"
                                                        d="M 0 364.99519938278195 L 0 270.70477287556326C17.313304662839993, 266.4071391479234, 73.58318795928432, 241.81191813208923, 110.28056637446086, 243.3301329218546S184.62781267503985, 285.28053703508857, 220.56113274892172, 279.8296528601328S295.1706007105598, 216.1051402602057, 330.84169912338257, 209.87223964509963S417.001713545856, 254.7075501770364, 441.12226549784344, 237.24687959880828S526.9909553702606, 50.820078468099894, 551.4028318723043, 33.45789327675499S644.157158994957, 56.964087865850416, 661.6833982467651, 60.83253323046364 L 661.6833982467651 364.99519938278195 L 0 364.99519938278195M 0 270.70477287556326z"
                                                        fill="url(#SvgjsLinearGradient1703)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskfdgtubew)"
                                                        pathTo="M 0 364.99519938278195 L 0 270.70477287556326C17.313304662839993, 266.4071391479234, 73.58318795928432, 241.81191813208923, 110.28056637446086, 243.3301329218546S184.62781267503985, 285.28053703508857, 220.56113274892172, 279.8296528601328S295.1706007105598, 216.1051402602057, 330.84169912338257, 209.87223964509963S417.001713545856, 254.7075501770364, 441.12226549784344, 237.24687959880828S526.9909553702606, 50.820078468099894, 551.4028318723043, 33.45789327675499S644.157158994957, 56.964087865850416, 661.6833982467651, 60.83253323046364 L 661.6833982467651 364.99519938278195 L 0 364.99519938278195M 0 270.70477287556326z"
                                                        pathFrom="M -1 364.99519938278195 L -1 364.99519938278195 L 110.28056637446086 364.99519938278195 L 220.56113274892172 364.99519938278195 L 330.84169912338257 364.99519938278195 L 441.12226549784344 364.99519938278195 L 551.4028318723043 364.99519938278195 L 661.6833982467651 364.99519938278195">
                                                    </path>
                                                    <path id="SvgjsPath1708"
                                                        d="M 0 270.70477287556326C17.313304662839993, 266.4071391479234, 73.58318795928432, 241.81191813208923, 110.28056637446086, 243.3301329218546S184.62781267503985, 285.28053703508857, 220.56113274892172, 279.8296528601328S295.1706007105598, 216.1051402602057, 330.84169912338257, 209.87223964509963S417.001713545856, 254.7075501770364, 441.12226549784344, 237.24687959880828S526.9909553702606, 50.820078468099894, 551.4028318723043, 33.45789327675499S644.157158994957, 56.964087865850416, 661.6833982467651, 60.83253323046364"
                                                        fill="none" fill-opacity="1" stroke="#1890ff"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskfdgtubew)"
                                                        pathTo="M 0 270.70477287556326C17.313304662839993, 266.4071391479234, 73.58318795928432, 241.81191813208923, 110.28056637446086, 243.3301329218546S184.62781267503985, 285.28053703508857, 220.56113274892172, 279.8296528601328S295.1706007105598, 216.1051402602057, 330.84169912338257, 209.87223964509963S417.001713545856, 254.7075501770364, 441.12226549784344, 237.24687959880828S526.9909553702606, 50.820078468099894, 551.4028318723043, 33.45789327675499S644.157158994957, 56.964087865850416, 661.6833982467651, 60.83253323046364"
                                                        pathFrom="M -1 364.99519938278195 L -1 364.99519938278195 L 110.28056637446086 364.99519938278195 L 220.56113274892172 364.99519938278195 L 330.84169912338257 364.99519938278195 L 441.12226549784344 364.99519938278195 L 551.4028318723043 364.99519938278195 L 661.6833982467651 364.99519938278195"
                                                        fill-rule="evenodd"></path>
                                                    <g id="SvgjsG1701"
                                                        class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                        data:realIndex="0">
                                                        <g class="apexcharts-series-markers">
                                                            <circle id="SvgjsCircle1782" r="0" cx="0"
                                                                cy="0"
                                                                class="apexcharts-marker w450obvr7k no-pointer-events"
                                                                stroke="#ffffff" fill="#1890ff" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1709" class="apexcharts-series" zIndex="1"
                                                    seriesName="Sessions" data:longestSeries="true" rel="2"
                                                    data:realIndex="1">
                                                    <path id="SvgjsPath1716"
                                                        d="M 0 364.99519938278195 L 0 331.53730610602696C13.763025612520224, 323.56580462147156, 80.1453740030189, 281.79274428256883, 110.28056637446086, 267.6631462140401S183.80094395743478, 228.12199961423872, 220.56113274892172, 228.12199961423872S294.3138312461275, 264.75004002644823, 330.84169912338257, 267.6631462140401S405.1190488700195, 266.8003749367049, 441.12226549784344, 261.57989289099373S514.9820333521816, 210.34641512434675, 551.4028318723043, 206.83061298357643S644.852500303748, 235.1821996313166, 661.6833982467651, 240.28850626033145 L 661.6833982467651 364.99519938278195 L 0 364.99519938278195M 0 331.53730610602696z"
                                                        fill="url(#SvgjsLinearGradient1712)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="1"
                                                        clip-path="url(#gridRectMaskfdgtubew)"
                                                        pathTo="M 0 364.99519938278195 L 0 331.53730610602696C13.763025612520224, 323.56580462147156, 80.1453740030189, 281.79274428256883, 110.28056637446086, 267.6631462140401S183.80094395743478, 228.12199961423872, 220.56113274892172, 228.12199961423872S294.3138312461275, 264.75004002644823, 330.84169912338257, 267.6631462140401S405.1190488700195, 266.8003749367049, 441.12226549784344, 261.57989289099373S514.9820333521816, 210.34641512434675, 551.4028318723043, 206.83061298357643S644.852500303748, 235.1821996313166, 661.6833982467651, 240.28850626033145 L 661.6833982467651 364.99519938278195 L 0 364.99519938278195M 0 331.53730610602696z"
                                                        pathFrom="M -1 364.99519938278195 L -1 364.99519938278195 L 110.28056637446086 364.99519938278195 L 220.56113274892172 364.99519938278195 L 330.84169912338257 364.99519938278195 L 441.12226549784344 364.99519938278195 L 551.4028318723043 364.99519938278195 L 661.6833982467651 364.99519938278195">
                                                    </path>
                                                    <path id="SvgjsPath1717"
                                                        d="M 0 331.53730610602696C13.763025612520224, 323.56580462147156, 80.1453740030189, 281.79274428256883, 110.28056637446086, 267.6631462140401S183.80094395743478, 228.12199961423872, 220.56113274892172, 228.12199961423872S294.3138312461275, 264.75004002644823, 330.84169912338257, 267.6631462140401S405.1190488700195, 266.8003749367049, 441.12226549784344, 261.57989289099373S514.9820333521816, 210.34641512434675, 551.4028318723043, 206.83061298357643S644.852500303748, 235.1821996313166, 661.6833982467651, 240.28850626033145"
                                                        fill="none" fill-opacity="1" stroke="#13c2c2"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                        stroke-dasharray="0" class="apexcharts-area" index="1"
                                                        clip-path="url(#gridRectMaskfdgtubew)"
                                                        pathTo="M 0 331.53730610602696C13.763025612520224, 323.56580462147156, 80.1453740030189, 281.79274428256883, 110.28056637446086, 267.6631462140401S183.80094395743478, 228.12199961423872, 220.56113274892172, 228.12199961423872S294.3138312461275, 264.75004002644823, 330.84169912338257, 267.6631462140401S405.1190488700195, 266.8003749367049, 441.12226549784344, 261.57989289099373S514.9820333521816, 210.34641512434675, 551.4028318723043, 206.83061298357643S644.852500303748, 235.1821996313166, 661.6833982467651, 240.28850626033145"
                                                        pathFrom="M -1 364.99519938278195 L -1 364.99519938278195 L 110.28056637446086 364.99519938278195 L 220.56113274892172 364.99519938278195 L 330.84169912338257 364.99519938278195 L 441.12226549784344 364.99519938278195 L 551.4028318723043 364.99519938278195 L 661.6833982467651 364.99519938278195"
                                                        fill-rule="evenodd"></path>
                                                    <g id="SvgjsG1710"
                                                        class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                        data:realIndex="1">
                                                        <g class="apexcharts-series-markers">
                                                            <circle id="SvgjsCircle1783" r="0" cx="0"
                                                                cy="0"
                                                                class="apexcharts-marker w080ah58e no-pointer-events"
                                                                stroke="#ffffff" fill="#13c2c2" fill-opacity="1"
                                                                stroke-width="2" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1702" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                                <g id="SvgjsG1711" class="apexcharts-datalabels" data:realIndex="1">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1736" x1="0" y1="0"
                                                x2="661.6833982467651" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1737" x1="0" y1="0"
                                                x2="661.6833982467651" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1738" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1739" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"><text id="SvgjsText1741"
                                                        font-family="Helvetica, Arial, sans-serif" x="0"
                                                        y="393.99519938278195" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1742">Mon</tspan>
                                                        <title>Mon</title>
                                                    </text><text id="SvgjsText1744"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="110.28056637446085" y="393.99519938278195"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1745">Tue</tspan>
                                                        <title>Tue</title>
                                                    </text><text id="SvgjsText1747"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="220.56113274892172" y="393.99519938278195"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1748">Wed</tspan>
                                                        <title>Wed</title>
                                                    </text><text id="SvgjsText1750"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="330.8416991233826" y="393.99519938278195"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1751">Thu</tspan>
                                                        <title>Thu</title>
                                                    </text><text id="SvgjsText1753"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="441.1222654978435" y="393.99519938278195"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1754">Fri</tspan>
                                                        <title>Fri</title>
                                                    </text><text id="SvgjsText1756"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="551.4028318723043" y="393.99519938278195"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1757">Sat</tspan>
                                                        <title>Sat</title>
                                                    </text><text id="SvgjsText1759"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="661.6833982467651" y="393.99519938278195"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1760">Sun</tspan>
                                                        <title>Sun</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1779" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1780" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1781" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect1784" width="0" height="0" x="0" y="0"
                                                rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-zoom-rect"></rect>
                                            <rect id="SvgjsRect1785" width="0" height="0" x="0" y="0"
                                                rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-selection-rect"></rect>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(24, 144, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(19, 194, 194);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                        <div class="apexcharts-xaxistooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <h5 class="mb-3">Income Overview</h5>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
                    <h3 class="mb-3">$7,650</h3>
                    <div id="income-overview-chart" style="min-height: 380px;">
                        <div id="apexchartseygta166"
                            class="apexcharts-canvas apexchartseygta166 apexcharts-theme-light"
                            style="width: 327px; height: 365px;"><svg id="SvgjsSvg1789" width="327"
                                height="365" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <foreignObject x="0" y="0" width="327" height="365">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                        style="max-height: 182.5px;"></div>
                                </foreignObject>
                                <g id="SvgjsG1856" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG1791" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(12, 30)">
                                    <defs id="SvgjsDefs1790">
                                        <linearGradient id="SvgjsLinearGradient1793" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop1794" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop1795" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop1796" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaskeygta166">
                                            <rect id="SvgjsRect1798" width="311" height="309.99519938278195"
                                                x="-4" y="-6" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskeygta166"></clipPath>
                                        <clipPath id="nonForecastMaskeygta166"></clipPath>
                                        <clipPath id="gridRectMarkerMaskeygta166">
                                            <rect id="SvgjsRect1799" width="309" height="301.99519938278195"
                                                x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect1797" width="19.607142857142854" height="297.99519938278195"
                                        x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke-dasharray="3" fill="url(#SvgjsLinearGradient1793)"
                                        class="apexcharts-xcrosshairs" y2="297.99519938278195" filter="none"
                                        fill-opacity="0.9"></rect>
                                    <g id="SvgjsG1819" class="apexcharts-grid">
                                        <g id="SvgjsG1820" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine1823" x1="0" y1="0" x2="305"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1824" x1="0" y1="59.59903987655639"
                                                x2="305" y2="59.59903987655639" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1825" x1="0" y1="119.19807975311278"
                                                x2="305" y2="119.19807975311278" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1826" x1="0" y1="178.79711962966917"
                                                x2="305" y2="178.79711962966917" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1827" x1="0" y1="238.39615950622556"
                                                x2="305" y2="238.39615950622556" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1828" x1="0" y1="297.99519938278195"
                                                x2="305" y2="297.99519938278195" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1821" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine1830" x1="0" y1="297.99519938278195"
                                            x2="305" y2="297.99519938278195" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1829" x1="0" y1="1" x2="0"
                                            y2="297.99519938278195" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1822" class="apexcharts-grid-borders" style="display: none;"></g>
                                    <g id="SvgjsG1800" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1801" class="apexcharts-series" rel="1"
                                            seriesName="series-1" data:realIndex="0">
                                            <path id="SvgjsPath1806"
                                                d="M 11.982142857142858 293.9961993827819 L 11.982142857142858 63.60003987655639 C 11.982142857142858 61.60003987655639 13.982142857142858 59.60003987655639 15.982142857142858 59.60003987655639 L 25.58928571428571 59.60003987655639 C 27.58928571428571 59.60003987655639 29.58928571428571 61.60003987655639 29.58928571428571 63.60003987655639 L 29.58928571428571 293.9961993827819 C 29.58928571428571 295.9961993827819 27.58928571428571 297.9961993827819 25.58928571428571 297.9961993827819 L 15.982142857142858 297.9961993827819 C 13.982142857142858 297.9961993827819 11.982142857142858 295.9961993827819 11.982142857142858 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 11.982142857142858 293.9961993827819 L 11.982142857142858 63.60003987655639 C 11.982142857142858 61.60003987655639 13.982142857142858 59.60003987655639 15.982142857142858 59.60003987655639 L 25.58928571428571 59.60003987655639 C 27.58928571428571 59.60003987655639 29.58928571428571 61.60003987655639 29.58928571428571 63.60003987655639 L 29.58928571428571 293.9961993827819 C 29.58928571428571 295.9961993827819 27.58928571428571 297.9961993827819 25.58928571428571 297.9961993827819 L 15.982142857142858 297.9961993827819 C 13.982142857142858 297.9961993827819 11.982142857142858 295.9961993827819 11.982142857142858 293.9961993827819 Z "
                                                pathFrom="M 11.982142857142858 297.9961993827819 L 11.982142857142858 297.9961993827819 L 29.58928571428571 297.9961993827819 L 29.58928571428571 297.9961993827819 L 29.58928571428571 297.9961993827819 L 29.58928571428571 297.9961993827819 L 29.58928571428571 297.9961993827819 L 11.982142857142858 297.9961993827819 Z"
                                                cy="59.59903987655639" cx="54.55357142857143" j="0" val="80"
                                                barHeight="238.39615950622556" barWidth="19.607142857142854"></path>
                                            <path id="SvgjsPath1808"
                                                d="M 55.55357142857143 293.9961993827819 L 55.55357142857143 18.900759969139095 C 55.55357142857143 16.900759969139095 57.55357142857143 14.900759969139097 59.55357142857143 14.900759969139097 L 69.16071428571428 14.900759969139097 C 71.16071428571428 14.900759969139097 73.16071428571428 16.900759969139095 73.16071428571428 18.900759969139095 L 73.16071428571428 293.9961993827819 C 73.16071428571428 295.9961993827819 71.16071428571428 297.9961993827819 69.16071428571428 297.9961993827819 L 59.55357142857143 297.9961993827819 C 57.55357142857143 297.9961993827819 55.55357142857143 295.9961993827819 55.55357142857143 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 55.55357142857143 293.9961993827819 L 55.55357142857143 18.900759969139095 C 55.55357142857143 16.900759969139095 57.55357142857143 14.900759969139097 59.55357142857143 14.900759969139097 L 69.16071428571428 14.900759969139097 C 71.16071428571428 14.900759969139097 73.16071428571428 16.900759969139095 73.16071428571428 18.900759969139095 L 73.16071428571428 293.9961993827819 C 73.16071428571428 295.9961993827819 71.16071428571428 297.9961993827819 69.16071428571428 297.9961993827819 L 59.55357142857143 297.9961993827819 C 57.55357142857143 297.9961993827819 55.55357142857143 295.9961993827819 55.55357142857143 293.9961993827819 Z "
                                                pathFrom="M 55.55357142857143 297.9961993827819 L 55.55357142857143 297.9961993827819 L 73.16071428571428 297.9961993827819 L 73.16071428571428 297.9961993827819 L 73.16071428571428 297.9961993827819 L 73.16071428571428 297.9961993827819 L 73.16071428571428 297.9961993827819 L 55.55357142857143 297.9961993827819 Z"
                                                cy="14.899759969139097" cx="98.125" j="1" val="95"
                                                barHeight="283.09543941364285" barWidth="19.607142857142854"></path>
                                            <path id="SvgjsPath1810"
                                                d="M 99.125 293.9961993827819 L 99.125 93.39955981483459 C 99.125 91.39955981483459 101.125 89.39955981483459 103.125 89.39955981483459 L 112.73214285714286 89.39955981483459 C 114.73214285714286 89.39955981483459 116.73214285714286 91.39955981483459 116.73214285714286 93.39955981483459 L 116.73214285714286 293.9961993827819 C 116.73214285714286 295.9961993827819 114.73214285714286 297.9961993827819 112.73214285714286 297.9961993827819 L 103.125 297.9961993827819 C 101.125 297.9961993827819 99.125 295.9961993827819 99.125 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 99.125 293.9961993827819 L 99.125 93.39955981483459 C 99.125 91.39955981483459 101.125 89.39955981483459 103.125 89.39955981483459 L 112.73214285714286 89.39955981483459 C 114.73214285714286 89.39955981483459 116.73214285714286 91.39955981483459 116.73214285714286 93.39955981483459 L 116.73214285714286 293.9961993827819 C 116.73214285714286 295.9961993827819 114.73214285714286 297.9961993827819 112.73214285714286 297.9961993827819 L 103.125 297.9961993827819 C 101.125 297.9961993827819 99.125 295.9961993827819 99.125 293.9961993827819 Z "
                                                pathFrom="M 99.125 297.9961993827819 L 99.125 297.9961993827819 L 116.73214285714286 297.9961993827819 L 116.73214285714286 297.9961993827819 L 116.73214285714286 297.9961993827819 L 116.73214285714286 297.9961993827819 L 116.73214285714286 297.9961993827819 L 99.125 297.9961993827819 Z"
                                                cy="89.39855981483458" cx="141.69642857142856" j="2" val="70"
                                                barHeight="208.59663956794736" barWidth="19.607142857142854"></path>
                                            <path id="SvgjsPath1812"
                                                d="M 142.69642857142856 293.9961993827819 L 142.69642857142856 176.83821564201352 C 142.69642857142856 174.83821564201352 144.69642857142856 172.83821564201352 146.69642857142856 172.83821564201352 L 156.30357142857142 172.83821564201352 C 158.30357142857142 172.83821564201352 160.30357142857142 174.83821564201352 160.30357142857142 176.83821564201352 L 160.30357142857142 293.9961993827819 C 160.30357142857142 295.9961993827819 158.30357142857142 297.9961993827819 156.30357142857142 297.9961993827819 L 146.69642857142856 297.9961993827819 C 144.69642857142856 297.9961993827819 142.69642857142856 295.9961993827819 142.69642857142856 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 142.69642857142856 293.9961993827819 L 142.69642857142856 176.83821564201352 C 142.69642857142856 174.83821564201352 144.69642857142856 172.83821564201352 146.69642857142856 172.83821564201352 L 156.30357142857142 172.83821564201352 C 158.30357142857142 172.83821564201352 160.30357142857142 174.83821564201352 160.30357142857142 176.83821564201352 L 160.30357142857142 293.9961993827819 C 160.30357142857142 295.9961993827819 158.30357142857142 297.9961993827819 156.30357142857142 297.9961993827819 L 146.69642857142856 297.9961993827819 C 144.69642857142856 297.9961993827819 142.69642857142856 295.9961993827819 142.69642857142856 293.9961993827819 Z "
                                                pathFrom="M 142.69642857142856 297.9961993827819 L 142.69642857142856 297.9961993827819 L 160.30357142857142 297.9961993827819 L 160.30357142857142 297.9961993827819 L 160.30357142857142 297.9961993827819 L 160.30357142857142 297.9961993827819 L 160.30357142857142 297.9961993827819 L 142.69642857142856 297.9961993827819 Z"
                                                cy="172.83721564201352" cx="185.2678571428571" j="3" val="42"
                                                barHeight="125.15798374076842" barWidth="19.607142857142854"></path>
                                            <path id="SvgjsPath1814"
                                                d="M 186.2678571428571 293.9961993827819 L 186.2678571428571 108.29931978397369 C 186.2678571428571 106.29931978397369 188.2678571428571 104.29931978397369 190.2678571428571 104.29931978397369 L 199.87499999999997 104.29931978397369 C 201.87499999999997 104.29931978397369 203.87499999999997 106.29931978397369 203.87499999999997 108.29931978397369 L 203.87499999999997 293.9961993827819 C 203.87499999999997 295.9961993827819 201.87499999999997 297.9961993827819 199.87499999999997 297.9961993827819 L 190.2678571428571 297.9961993827819 C 188.2678571428571 297.9961993827819 186.2678571428571 295.9961993827819 186.2678571428571 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 186.2678571428571 293.9961993827819 L 186.2678571428571 108.29931978397369 C 186.2678571428571 106.29931978397369 188.2678571428571 104.29931978397369 190.2678571428571 104.29931978397369 L 199.87499999999997 104.29931978397369 C 201.87499999999997 104.29931978397369 203.87499999999997 106.29931978397369 203.87499999999997 108.29931978397369 L 203.87499999999997 293.9961993827819 C 203.87499999999997 295.9961993827819 201.87499999999997 297.9961993827819 199.87499999999997 297.9961993827819 L 190.2678571428571 297.9961993827819 C 188.2678571428571 297.9961993827819 186.2678571428571 295.9961993827819 186.2678571428571 293.9961993827819 Z "
                                                pathFrom="M 186.2678571428571 297.9961993827819 L 186.2678571428571 297.9961993827819 L 203.87499999999997 297.9961993827819 L 203.87499999999997 297.9961993827819 L 203.87499999999997 297.9961993827819 L 203.87499999999997 297.9961993827819 L 203.87499999999997 297.9961993827819 L 186.2678571428571 297.9961993827819 Z"
                                                cy="104.29831978397368" cx="228.83928571428567" j="4" val="65"
                                                barHeight="193.69687959880827" barWidth="19.607142857142854"></path>
                                            <path id="SvgjsPath1816"
                                                d="M 229.83928571428567 293.9961993827819 L 229.83928571428567 138.09883972225188 C 229.83928571428567 136.09883972225188 231.83928571428567 134.09883972225188 233.83928571428567 134.09883972225188 L 243.44642857142853 134.09883972225188 C 245.44642857142853 134.09883972225188 247.44642857142853 136.09883972225188 247.44642857142853 138.09883972225188 L 247.44642857142853 293.9961993827819 C 247.44642857142853 295.9961993827819 245.44642857142853 297.9961993827819 243.44642857142853 297.9961993827819 L 233.83928571428567 297.9961993827819 C 231.83928571428567 297.9961993827819 229.83928571428567 295.9961993827819 229.83928571428567 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 229.83928571428567 293.9961993827819 L 229.83928571428567 138.09883972225188 C 229.83928571428567 136.09883972225188 231.83928571428567 134.09883972225188 233.83928571428567 134.09883972225188 L 243.44642857142853 134.09883972225188 C 245.44642857142853 134.09883972225188 247.44642857142853 136.09883972225188 247.44642857142853 138.09883972225188 L 247.44642857142853 293.9961993827819 C 247.44642857142853 295.9961993827819 245.44642857142853 297.9961993827819 243.44642857142853 297.9961993827819 L 233.83928571428567 297.9961993827819 C 231.83928571428567 297.9961993827819 229.83928571428567 295.9961993827819 229.83928571428567 293.9961993827819 Z "
                                                pathFrom="M 229.83928571428567 297.9961993827819 L 229.83928571428567 297.9961993827819 L 247.44642857142853 297.9961993827819 L 247.44642857142853 297.9961993827819 L 247.44642857142853 297.9961993827819 L 247.44642857142853 297.9961993827819 L 247.44642857142853 297.9961993827819 L 229.83928571428567 297.9961993827819 Z"
                                                cy="134.09783972225188" cx="272.4107142857142" j="5" val="55"
                                                barHeight="163.89735966053007" barWidth="19.607142857142854"></path>
                                            <path id="SvgjsPath1818"
                                                d="M 273.4107142857142 293.9961993827819 L 273.4107142857142 69.55994386421204 C 273.4107142857142 67.55994386421204 275.4107142857142 65.55994386421204 277.4107142857142 65.55994386421204 L 287.01785714285705 65.55994386421204 C 289.01785714285705 65.55994386421204 291.01785714285705 67.55994386421204 291.01785714285705 69.55994386421204 L 291.01785714285705 293.9961993827819 C 291.01785714285705 295.9961993827819 289.01785714285705 297.9961993827819 287.01785714285705 297.9961993827819 L 277.4107142857142 297.9961993827819 C 275.4107142857142 297.9961993827819 273.4107142857142 295.9961993827819 273.4107142857142 293.9961993827819 Z "
                                                fill="rgba(19,194,194,0.85)" fill-opacity="1" stroke="#13c2c2"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskeygta166)"
                                                pathTo="M 273.4107142857142 293.9961993827819 L 273.4107142857142 69.55994386421204 C 273.4107142857142 67.55994386421204 275.4107142857142 65.55994386421204 277.4107142857142 65.55994386421204 L 287.01785714285705 65.55994386421204 C 289.01785714285705 65.55994386421204 291.01785714285705 67.55994386421204 291.01785714285705 69.55994386421204 L 291.01785714285705 293.9961993827819 C 291.01785714285705 295.9961993827819 289.01785714285705 297.9961993827819 287.01785714285705 297.9961993827819 L 277.4107142857142 297.9961993827819 C 275.4107142857142 297.9961993827819 273.4107142857142 295.9961993827819 273.4107142857142 293.9961993827819 Z "
                                                pathFrom="M 273.4107142857142 297.9961993827819 L 273.4107142857142 297.9961993827819 L 291.01785714285705 297.9961993827819 L 291.01785714285705 297.9961993827819 L 291.01785714285705 297.9961993827819 L 291.01785714285705 297.9961993827819 L 291.01785714285705 297.9961993827819 L 273.4107142857142 297.9961993827819 Z"
                                                cy="65.55894386421204" cx="315.9821428571428" j="6" val="78"
                                                barHeight="232.4362555185699" barWidth="19.607142857142854"></path>
                                            <g id="SvgjsG1803" class="apexcharts-bar-goals-markers">
                                                <g id="SvgjsG1805" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                                <g id="SvgjsG1807" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                                <g id="SvgjsG1809" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                                <g id="SvgjsG1811" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                                <g id="SvgjsG1813" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                                <g id="SvgjsG1815" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                                <g id="SvgjsG1817" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskeygta166)"></g>
                                            </g>
                                            <g id="SvgjsG1804"
                                                class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                        </g>
                                        <g id="SvgjsG1802"
                                            class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                            data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1831" x1="0" y1="0" x2="305"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1832" x1="0" y1="0" x2="305"
                                        y2="0" stroke-dasharray="0" stroke-width="0"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1833" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1834" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"><text id="SvgjsText1836"
                                                font-family="Helvetica, Arial, sans-serif" x="21.785714285714285"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1837">Mo</tspan>
                                                <title>Mo</title>
                                            </text><text id="SvgjsText1839"
                                                font-family="Helvetica, Arial, sans-serif" x="65.35714285714286"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1840">Tu</tspan>
                                                <title>Tu</title>
                                            </text><text id="SvgjsText1842"
                                                font-family="Helvetica, Arial, sans-serif" x="108.92857142857144"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1843">We</tspan>
                                                <title>We</title>
                                            </text><text id="SvgjsText1845"
                                                font-family="Helvetica, Arial, sans-serif" x="152.5"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1846">Th</tspan>
                                                <title>Th</title>
                                            </text><text id="SvgjsText1848"
                                                font-family="Helvetica, Arial, sans-serif" x="196.07142857142856"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1849">Fr</tspan>
                                                <title>Fr</title>
                                            </text><text id="SvgjsText1851"
                                                font-family="Helvetica, Arial, sans-serif" x="239.6428571428571"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1852">Sa</tspan>
                                                <title>Sa</title>
                                            </text><text id="SvgjsText1854"
                                                font-family="Helvetica, Arial, sans-serif" x="283.21428571428567"
                                                y="326.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1855">Su</tspan>
                                                <title>Su</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1857" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1858" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1859" class="apexcharts-point-annotations"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(19, 194, 194);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-8">
            <h5 class="mb-3">Recent Orders</h5>
            <div class="card tbl-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>TRACKING NO.</th>
                                    <th>PRODUCT NAME</th>
                                    <th>TOTAL ORDER</th>
                                    <th>STATUS</th>
                                    <th class="text-end">TOTAL AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Camera Lens</td>
                                    <td>40</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                                    </td>
                                    <td class="text-end">$40,570</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Laptop</td>
                                    <td>300</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Camera Lens</td>
                                    <td>40</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                                    </td>
                                    <td class="text-end">$40,570</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Laptop</td>
                                    <td>300</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Camera Lens</td>
                                    <td>40</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                                    </td>
                                    <td class="text-end">$40,570</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Laptop</td>
                                    <td>300</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <h5 class="mb-3">Analytics Report</h5>
            <div class="card">
                <div class="list-group list-group-flush">
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Company
                        Finance Growth<span class="h5 mb-0">+45.14%</span></a>
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Company
                        Expenses Ratio<span class="h5 mb-0">0.58%</span></a>
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Business
                        Risk Cases<span class="h5 mb-0">Low</span></a>
                </div>
                <div class="card-body px-2">
                    <div id="analytics-report-chart" style="min-height: 355px;">
                        <div id="apexchartsdxmvdga9"
                            class="apexcharts-canvas apexchartsdxmvdga9 apexcharts-theme-light"
                            style="width: 361px; height: 340px;"><svg id="SvgjsSvg1861" width="361"
                                height="340" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="361" height="340">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                        style="max-height: 170px;"></div>
                                </foreignObject>
                                <rect id="SvgjsRect1866" width="0" height="0" x="0" y="0"
                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                    stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                <g id="SvgjsG1916" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG1863" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(12, 30)">
                                    <defs id="SvgjsDefs1862">
                                        <clipPath id="gridRectMaskdxmvdga9">
                                            <rect id="SvgjsRect1870" width="344.5" height="288.6799995422363"
                                                x="-3.5" y="-5" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskdxmvdga9"></clipPath>
                                        <clipPath id="nonForecastMaskdxmvdga9"></clipPath>
                                        <clipPath id="gridRectMarkerMaskdxmvdga9">
                                            <rect id="SvgjsRect1871" width="343" height="282.6799995422363"
                                                x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <line id="SvgjsLine1867" x1="338.5" y1="0" x2="338.5"
                                        y2="278.6799995422363" stroke="#b6b6b6" stroke-dasharray="3"
                                        stroke-linecap="butt" class="apexcharts-xcrosshairs" x="338.5" y="0"
                                        width="1" height="278.6799995422363" fill="#b1b9c4" filter="none"
                                        fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG1877" class="apexcharts-grid">
                                        <g id="SvgjsG1878" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1882" x1="0" y1="69.66999988555908"
                                                x2="339" y2="69.66999988555908" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1883" x1="0" y1="139.33999977111816"
                                                x2="339" y2="139.33999977111816" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1884" x1="0" y1="209.00999965667722"
                                                x2="339" y2="209.00999965667722" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1879" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1887" x1="0" y1="278.6799995422363"
                                            x2="339" y2="278.6799995422363" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1886" x1="0" y1="1" x2="0"
                                            y2="278.6799995422363" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1880" class="apexcharts-grid-borders">
                                        <line id="SvgjsLine1881" x1="0" y1="0" x2="339"
                                            y2="0" stroke="#e0e0e0" stroke-dasharray="4"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1885" x1="0" y1="278.6799995422363"
                                            x2="339" y2="278.6799995422363" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG1872" class="apexcharts-line-series apexcharts-plot-series">
                                        <g id="SvgjsG1873" class="apexcharts-series" zIndex="0"
                                            seriesName="series-1" data:longestSeries="true" rel="1"
                                            data:realIndex="0">
                                            <path id="SvgjsPath1876"
                                                d="M 0 146.30699975967406C1.3257446595591955, 143.2938040149872, 38.91622488366532, 27.057319747437237, 49.045405930967426, 34.83499994277952S81.89406208051436, 211.44045573451993, 96.60758385999027, 215.97699964523315S136.5535407226578, 67.34582463994133, 145.71891103548856, 59.219499902725204S179.81453086057445, 124.84192169081481, 194.83023821098686, 128.8894997882843S234.13405480530744, 79.03595857433623, 242.35945551774427, 87.08749985694885S280.5151396087018, 218.91525827957227, 291.4707826932426, 226.427499628067S336.48416662621577, 160.44529686595672, 339, 156.75749974250792"
                                                fill="none" fill-opacity="1" stroke="rgba(250,173,20,0.85)"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="1.5"
                                                stroke-dasharray="0" class="apexcharts-line" index="0"
                                                clip-path="url(#gridRectMaskdxmvdga9)"
                                                pathTo="M 0 146.30699975967406C1.3257446595591955, 143.2938040149872, 38.91622488366532, 27.057319747437237, 49.045405930967426, 34.83499994277952S81.89406208051436, 211.44045573451993, 96.60758385999027, 215.97699964523315S136.5535407226578, 67.34582463994133, 145.71891103548856, 59.219499902725204S179.81453086057445, 124.84192169081481, 194.83023821098686, 128.8894997882843S234.13405480530744, 79.03595857433623, 242.35945551774427, 87.08749985694885S280.5151396087018, 218.91525827957227, 291.4707826932426, 226.427499628067S336.48416662621577, 160.44529686595672, 339, 156.75749974250792"
                                                pathFrom="M -1 348.3499994277954 L -1 348.3499994277954 L 49.045405930967426 348.3499994277954 L 96.60758385999027 348.3499994277954 L 145.71891103548856 348.3499994277954 L 194.83023821098686 348.3499994277954 L 242.35945551774427 348.3499994277954 L 291.4707826932426 348.3499994277954 L 339 348.3499994277954"
                                                fill-rule="evenodd"></path>
                                            <g id="SvgjsG1874"
                                                class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1920" r="0" cx="339"
                                                        cy="156.75749974250792"
                                                        class="apexcharts-marker wlv824gwc no-pointer-events"
                                                        stroke="#ffffff" fill="#faad14" fill-opacity="1"
                                                        stroke-width="2" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1875" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1888" x1="0" y1="0" x2="339"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1889" x1="0" y1="0" x2="339"
                                        y2="0" stroke-dasharray="0" stroke-width="0"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1890" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1891" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"><text id="SvgjsText1893"
                                                font-family="Helvetica, Arial, sans-serif" x="20.5674282936315"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1894">Jun</tspan>
                                                <title>Jun</title>
                                            </text><text id="SvgjsText1896"
                                                font-family="Helvetica, Arial, sans-serif" x="68.03072435585804"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1897">Jul</tspan>
                                                <title>Jul</title>
                                            </text><text id="SvgjsText1899"
                                                font-family="Helvetica, Arial, sans-serif" x="117.07613028682547"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1900">Aug</tspan>
                                                <title>Aug</title>
                                            </text><text id="SvgjsText1902"
                                                font-family="Helvetica, Arial, sans-serif" x="166.1215362177929"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1903">Sep</tspan>
                                                <title>Sep</title>
                                            </text><text id="SvgjsText1905"
                                                font-family="Helvetica, Arial, sans-serif" x="213.58483228001944"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1906">Oct</tspan>
                                                <title>Oct</title>
                                            </text><text id="SvgjsText1908"
                                                font-family="Helvetica, Arial, sans-serif" x="262.6302382109869"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1909">Nov</tspan>
                                                <title>Nov</title>
                                            </text><text id="SvgjsText1911"
                                                font-family="Helvetica, Arial, sans-serif" x="310.09353427321344"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1912">Dec</tspan>
                                                <title>Dec</title>
                                            </text><text id="SvgjsText1914"
                                                font-family="Helvetica, Arial, sans-serif" x="359.13894020418087"
                                                y="307.6799995422363" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="600" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1915"></tspan>
                                                <title></title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1917" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1918" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1919" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1921" width="0" height="0" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke="none" stroke-dasharray="0" fill="#fefefe"
                                        class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1922" width="0" height="0" x="0" y="0"
                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke="none" stroke-dasharray="0" fill="#fefefe"
                                        class="apexcharts-selection-rect"></rect>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light"
                                style="left: 239.7px; top: 159.757px;">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">19 Dec</div>
                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                    style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(250, 173, 20);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label">series-1: </span><span
                                                class="apexcharts-tooltip-text-y-value">55</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                style="left: 320.688px; top: 310.68px;">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 35.753px;">
                                    19 Dec</div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-8">
            <h5 class="mb-3">Sales Report</h5>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
                    <h3 class="mb-0">$7,650</h3>
                    <div id="sales-report-chart" style="min-height: 445px;">
                        <div id="apexchartsntlmxnkd"
                            class="apexcharts-canvas apexchartsntlmxnkd apexcharts-theme-light"
                            style="width: 729px; height: 430px;"><svg id="SvgjsSvg1923" width="729"
                                height="430" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <foreignObject x="0" y="0" width="729" height="430">
                                    <div class="apexcharts-legend apexcharts-align-right apx-legend-position-top"
                                        xmlns="http://www.w3.org/1999/xhtml"
                                        style="right: 0px; position: absolute; left: 30px; top: 10px; max-height: 215px;">
                                        <div class="apexcharts-legend-series" rel="1"
                                            seriesname="NetxProfit" data:collapsed="false"
                                            style="margin: 5px 15px;"><span class="apexcharts-legend-marker"
                                                rel="1" data:collapsed="false"
                                                style="background: rgb(250, 173, 20) !important; color: rgb(250, 173, 20); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 50px;"></span><span
                                                class="apexcharts-legend-text" rel="1" i="0"
                                                data:default-text="Net%20Profit" data:collapsed="false"
                                                style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: &quot;Public Sans&quot;, sans-serif;">Net
                                                Profit</span></div>
                                        <div class="apexcharts-legend-series" rel="2" seriesname="Revenue"
                                            data:collapsed="false" style="margin: 5px 15px;"><span
                                                class="apexcharts-legend-marker" rel="2"
                                                data:collapsed="false"
                                                style="background: rgb(24, 144, 255) !important; color: rgb(24, 144, 255); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 50px;"></span><span
                                                class="apexcharts-legend-text" rel="2" i="1"
                                                data:default-text="Revenue" data:collapsed="false"
                                                style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: &quot;Public Sans&quot;, sans-serif;">Revenue</span>
                                        </div>
                                    </div>
                                    @section('styles')
                                        <style type="text/css">
                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom,
                                            .apexcharts-legend.apx-legend-position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                justify-content: flex-start;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                justify-content: center;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                justify-content: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                                line-height: normal;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                            .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *,
                                            .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: inline-block;
                                                cursor: pointer;
                                                margin-right: 3px;
                                                border-style: solid;
                                            }

                                            .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                            .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                display: inline-block;
                                            }

                                            .apexcharts-legend-series.apexcharts-no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .apexcharts-inactive-legend {
                                                opacity: 0.45;
                                            }
                                        </style>
                                    @stop
                                </foreignObject>
                                <g id="SvgjsG2009" class="apexcharts-yaxis" rel="0"
                                    transform="translate(15.635351181030273, 0)">
                                    <g id="SvgjsG2010" class="apexcharts-yaxis-texts-g"><text id="SvgjsText2012"
                                            font-family="Helvetica, Arial, sans-serif" x="20" y="58.4"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan2013">200</tspan>
                                            <title>200</title>
                                        </text><text id="SvgjsText2015" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="142.3987998456955" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan2016">150</tspan>
                                            <title>150</title>
                                        </text><text id="SvgjsText2018" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="226.39759969139098" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan2019">100</tspan>
                                            <title>100</title>
                                        </text><text id="SvgjsText2021" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="310.39639953708644" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan2022">50</tspan>
                                            <title>50</title>
                                        </text><text id="SvgjsText2024" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="394.3951993827819" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan2025">0</tspan>
                                            <title>0</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1925" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(45.63535118103027, 57)">
                                    <defs id="SvgjsDefs1924">
                                        <linearGradient id="SvgjsLinearGradient1928" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop1929" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop1930" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop1931" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaskntlmxnkd">
                                            <rect id="SvgjsRect1933" width="685.3646488189697"
                                                height="371.99519938278195" x="-10" y="-18" rx="0"
                                                ry="0" opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskntlmxnkd"></clipPath>
                                        <clipPath id="nonForecastMaskntlmxnkd"></clipPath>
                                        <clipPath id="gridRectMarkerMaskntlmxnkd">
                                            <rect id="SvgjsRect1934" width="677.3646488189697"
                                                height="339.99519938278195" x="-2" y="-2" rx="0"
                                                ry="0" opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect1932" width="16.834116220474243"
                                        height="335.99519938278195" x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient1928)" class="apexcharts-xcrosshairs"
                                        y2="335.99519938278195" filter="none" fill-opacity="0.9"></rect>
                                    <line id="SvgjsLine1972" x1="0" y1="336.99519938278195"
                                        x2="0" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <line id="SvgjsLine1973" x1="112.22744146982829" y1="336.99519938278195"
                                        x2="112.22744146982829" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <line id="SvgjsLine1974" x1="224.45488293965658" y1="336.99519938278195"
                                        x2="224.45488293965658" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <line id="SvgjsLine1975" x1="336.68232440948486" y1="336.99519938278195"
                                        x2="336.68232440948486" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <line id="SvgjsLine1976" x1="448.90976587931317" y1="336.99519938278195"
                                        x2="448.90976587931317" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <line id="SvgjsLine1977" x1="561.1372073491415" y1="336.99519938278195"
                                        x2="561.1372073491415" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <line id="SvgjsLine1978" x1="673.3646488189697" y1="336.99519938278195"
                                        x2="673.3646488189697" y2="342.99519938278195" stroke="#e0e0e0"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                    </line>
                                    <g id="SvgjsG1968" class="apexcharts-grid">
                                        <g id="SvgjsG1969" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1980" x1="0" y1="83.99879984569549"
                                                x2="673.3646488189697" y2="83.99879984569549" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1981" x1="0" y1="167.99759969139097"
                                                x2="673.3646488189697" y2="167.99759969139097" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1982" x1="0" y1="251.99639953708646"
                                                x2="673.3646488189697" y2="251.99639953708646" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1970" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1985" x1="0" y1="335.99519938278195"
                                            x2="673.3646488189697" y2="335.99519938278195" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1984" x1="0" y1="1" x2="0"
                                            y2="335.99519938278195" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1971" class="apexcharts-grid-borders">
                                        <line id="SvgjsLine1979" x1="0" y1="0"
                                            x2="673.3646488189697" y2="0" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1983" x1="0" y1="335.99519938278195"
                                            x2="673.3646488189697" y2="335.99519938278195" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine2008" x1="0" y1="336.99519938278195"
                                            x2="673.3646488189697" y2="336.99519938278195" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1935" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1936" class="apexcharts-series" rel="1"
                                            seriesName="NetxProfit" data:realIndex="0">
                                            <path id="SvgjsPath1941"
                                                d="M 39.2796045144399 331.9961993827819 L 39.2796045144399 37.60051993827815 C 39.2796045144399 35.60051993827815 41.2796045144399 33.60051993827815 43.2796045144399 33.60051993827815 L 44.113720734914146 33.60051993827815 C 46.113720734914146 33.60051993827815 48.113720734914146 35.60051993827815 48.113720734914146 37.60051993827815 L 48.113720734914146 331.9961993827819 C 48.113720734914146 333.9961993827819 46.113720734914146 335.9961993827819 44.113720734914146 335.9961993827819 L 43.2796045144399 335.9961993827819 C 41.2796045144399 335.9961993827819 39.2796045144399 333.9961993827819 39.2796045144399 331.9961993827819 Z "
                                                fill="rgba(250,173,20,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 39.2796045144399 331.9961993827819 L 39.2796045144399 37.60051993827815 C 39.2796045144399 35.60051993827815 41.2796045144399 33.60051993827815 43.2796045144399 33.60051993827815 L 44.113720734914146 33.60051993827815 C 46.113720734914146 33.60051993827815 48.113720734914146 35.60051993827815 48.113720734914146 37.60051993827815 L 48.113720734914146 331.9961993827819 C 48.113720734914146 333.9961993827819 46.113720734914146 335.9961993827819 44.113720734914146 335.9961993827819 L 43.2796045144399 335.9961993827819 C 41.2796045144399 335.9961993827819 39.2796045144399 333.9961993827819 39.2796045144399 331.9961993827819 Z "
                                                pathFrom="M 39.2796045144399 335.9961993827819 L 39.2796045144399 335.9961993827819 L 48.113720734914146 335.9961993827819 L 48.113720734914146 335.9961993827819 L 48.113720734914146 335.9961993827819 L 48.113720734914146 335.9961993827819 L 48.113720734914146 335.9961993827819 L 39.2796045144399 335.9961993827819 Z"
                                                cy="33.59951993827815" cx="147.5070459842682" j="0" val="180"
                                                barHeight="302.3956794445038" barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1943"
                                                d="M 151.5070459842682 331.9961993827819 L 151.5070459842682 188.79835966053005 C 151.5070459842682 186.79835966053005 153.5070459842682 184.79835966053005 155.5070459842682 184.79835966053005 L 156.34116220474243 184.79835966053005 C 158.34116220474243 184.79835966053005 160.34116220474243 186.79835966053005 160.34116220474243 188.79835966053005 L 160.34116220474243 331.9961993827819 C 160.34116220474243 333.9961993827819 158.34116220474243 335.9961993827819 156.34116220474243 335.9961993827819 L 155.5070459842682 335.9961993827819 C 153.5070459842682 335.9961993827819 151.5070459842682 333.9961993827819 151.5070459842682 331.9961993827819 Z "
                                                fill="rgba(250,173,20,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 151.5070459842682 331.9961993827819 L 151.5070459842682 188.79835966053005 C 151.5070459842682 186.79835966053005 153.5070459842682 184.79835966053005 155.5070459842682 184.79835966053005 L 156.34116220474243 184.79835966053005 C 158.34116220474243 184.79835966053005 160.34116220474243 186.79835966053005 160.34116220474243 188.79835966053005 L 160.34116220474243 331.9961993827819 C 160.34116220474243 333.9961993827819 158.34116220474243 335.9961993827819 156.34116220474243 335.9961993827819 L 155.5070459842682 335.9961993827819 C 153.5070459842682 335.9961993827819 151.5070459842682 333.9961993827819 151.5070459842682 331.9961993827819 Z "
                                                pathFrom="M 151.5070459842682 335.9961993827819 L 151.5070459842682 335.9961993827819 L 160.34116220474243 335.9961993827819 L 160.34116220474243 335.9961993827819 L 160.34116220474243 335.9961993827819 L 160.34116220474243 335.9961993827819 L 160.34116220474243 335.9961993827819 L 151.5070459842682 335.9961993827819 Z"
                                                cy="184.79735966053005" cx="259.7344874540965" j="1"
                                                val="90" barHeight="151.1978397222519"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1945"
                                                d="M 263.7344874540965 331.9961993827819 L 263.7344874540965 113.19943979940413 C 263.7344874540965 111.19943979940413 265.7344874540965 109.19943979940413 267.7344874540965 109.19943979940413 L 268.56860367457074 109.19943979940413 C 270.56860367457074 109.19943979940413 272.56860367457074 111.19943979940413 272.56860367457074 113.19943979940413 L 272.56860367457074 331.9961993827819 C 272.56860367457074 333.9961993827819 270.56860367457074 335.9961993827819 268.56860367457074 335.9961993827819 L 267.7344874540965 335.9961993827819 C 265.7344874540965 335.9961993827819 263.7344874540965 333.9961993827819 263.7344874540965 331.9961993827819 Z "
                                                fill="rgba(250,173,20,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 263.7344874540965 331.9961993827819 L 263.7344874540965 113.19943979940413 C 263.7344874540965 111.19943979940413 265.7344874540965 109.19943979940413 267.7344874540965 109.19943979940413 L 268.56860367457074 109.19943979940413 C 270.56860367457074 109.19943979940413 272.56860367457074 111.19943979940413 272.56860367457074 113.19943979940413 L 272.56860367457074 331.9961993827819 C 272.56860367457074 333.9961993827819 270.56860367457074 335.9961993827819 268.56860367457074 335.9961993827819 L 267.7344874540965 335.9961993827819 C 265.7344874540965 335.9961993827819 263.7344874540965 333.9961993827819 263.7344874540965 331.9961993827819 Z "
                                                pathFrom="M 263.7344874540965 335.9961993827819 L 263.7344874540965 335.9961993827819 L 272.56860367457074 335.9961993827819 L 272.56860367457074 335.9961993827819 L 272.56860367457074 335.9961993827819 L 272.56860367457074 335.9961993827819 L 272.56860367457074 335.9961993827819 L 263.7344874540965 335.9961993827819 Z"
                                                cy="109.19843979940413" cx="371.9619289239248" j="2"
                                                val="135" barHeight="226.79675958337782"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1947"
                                                d="M 375.9619289239248 331.9961993827819 L 375.9619289239248 148.47893573459623 C 375.9619289239248 146.47893573459623 377.9619289239248 144.47893573459623 379.9619289239248 144.47893573459623 L 380.79604514439905 144.47893573459623 C 382.79604514439905 144.47893573459623 384.79604514439905 146.47893573459623 384.79604514439905 148.47893573459623 L 384.79604514439905 331.9961993827819 C 384.79604514439905 333.9961993827819 382.79604514439905 335.9961993827819 380.79604514439905 335.9961993827819 L 379.9619289239248 335.9961993827819 C 377.9619289239248 335.9961993827819 375.9619289239248 333.9961993827819 375.9619289239248 331.9961993827819 Z "
                                                fill="rgba(250,173,20,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 375.9619289239248 331.9961993827819 L 375.9619289239248 148.47893573459623 C 375.9619289239248 146.47893573459623 377.9619289239248 144.47893573459623 379.9619289239248 144.47893573459623 L 380.79604514439905 144.47893573459623 C 382.79604514439905 144.47893573459623 384.79604514439905 146.47893573459623 384.79604514439905 148.47893573459623 L 384.79604514439905 331.9961993827819 C 384.79604514439905 333.9961993827819 382.79604514439905 335.9961993827819 380.79604514439905 335.9961993827819 L 379.9619289239248 335.9961993827819 C 377.9619289239248 335.9961993827819 375.9619289239248 333.9961993827819 375.9619289239248 331.9961993827819 Z "
                                                pathFrom="M 375.9619289239248 335.9961993827819 L 375.9619289239248 335.9961993827819 L 384.79604514439905 335.9961993827819 L 384.79604514439905 335.9961993827819 L 384.79604514439905 335.9961993827819 L 384.79604514439905 335.9961993827819 L 384.79604514439905 335.9961993827819 L 375.9619289239248 335.9961993827819 Z"
                                                cy="144.47793573459623" cx="484.1893703937531" j="3"
                                                val="114" barHeight="191.51726364818572"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1949"
                                                d="M 488.1893703937531 331.9961993827819 L 488.1893703937531 138.39907975311277 C 488.1893703937531 136.39907975311277 490.1893703937531 134.39907975311277 492.1893703937531 134.39907975311277 L 493.02348661422735 134.39907975311277 C 495.02348661422735 134.39907975311277 497.02348661422735 136.39907975311277 497.02348661422735 138.39907975311277 L 497.02348661422735 331.9961993827819 C 497.02348661422735 333.9961993827819 495.02348661422735 335.9961993827819 493.02348661422735 335.9961993827819 L 492.1893703937531 335.9961993827819 C 490.1893703937531 335.9961993827819 488.1893703937531 333.9961993827819 488.1893703937531 331.9961993827819 Z "
                                                fill="rgba(250,173,20,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 488.1893703937531 331.9961993827819 L 488.1893703937531 138.39907975311277 C 488.1893703937531 136.39907975311277 490.1893703937531 134.39907975311277 492.1893703937531 134.39907975311277 L 493.02348661422735 134.39907975311277 C 495.02348661422735 134.39907975311277 497.02348661422735 136.39907975311277 497.02348661422735 138.39907975311277 L 497.02348661422735 331.9961993827819 C 497.02348661422735 333.9961993827819 495.02348661422735 335.9961993827819 493.02348661422735 335.9961993827819 L 492.1893703937531 335.9961993827819 C 490.1893703937531 335.9961993827819 488.1893703937531 333.9961993827819 488.1893703937531 331.9961993827819 Z "
                                                pathFrom="M 488.1893703937531 335.9961993827819 L 488.1893703937531 335.9961993827819 L 497.02348661422735 335.9961993827819 L 497.02348661422735 335.9961993827819 L 497.02348661422735 335.9961993827819 L 497.02348661422735 335.9961993827819 L 497.02348661422735 335.9961993827819 L 488.1893703937531 335.9961993827819 Z"
                                                cy="134.39807975311277" cx="596.4168118635814" j="4"
                                                val="120" barHeight="201.59711962966918"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1951"
                                                d="M 600.4168118635814 331.9961993827819 L 600.4168118635814 96.39967983026503 C 600.4168118635814 94.39967983026503 602.4168118635814 92.39967983026503 604.4168118635814 92.39967983026503 L 605.2509280840557 92.39967983026503 C 607.2509280840557 92.39967983026503 609.2509280840557 94.39967983026503 609.2509280840557 96.39967983026503 L 609.2509280840557 331.9961993827819 C 609.2509280840557 333.9961993827819 607.2509280840557 335.9961993827819 605.2509280840557 335.9961993827819 L 604.4168118635814 335.9961993827819 C 602.4168118635814 335.9961993827819 600.4168118635814 333.9961993827819 600.4168118635814 331.9961993827819 Z "
                                                fill="rgba(250,173,20,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 600.4168118635814 331.9961993827819 L 600.4168118635814 96.39967983026503 C 600.4168118635814 94.39967983026503 602.4168118635814 92.39967983026503 604.4168118635814 92.39967983026503 L 605.2509280840557 92.39967983026503 C 607.2509280840557 92.39967983026503 609.2509280840557 94.39967983026503 609.2509280840557 96.39967983026503 L 609.2509280840557 331.9961993827819 C 609.2509280840557 333.9961993827819 607.2509280840557 335.9961993827819 605.2509280840557 335.9961993827819 L 604.4168118635814 335.9961993827819 C 602.4168118635814 335.9961993827819 600.4168118635814 333.9961993827819 600.4168118635814 331.9961993827819 Z "
                                                pathFrom="M 600.4168118635814 335.9961993827819 L 600.4168118635814 335.9961993827819 L 609.2509280840557 335.9961993827819 L 609.2509280840557 335.9961993827819 L 609.2509280840557 335.9961993827819 L 609.2509280840557 335.9961993827819 L 609.2509280840557 335.9961993827819 L 600.4168118635814 335.9961993827819 Z"
                                                cy="92.39867983026502" cx="708.6442533334097" j="5" val="145"
                                                barHeight="243.59651955251692" barWidth="16.834116220474243"></path>
                                            <g id="SvgjsG1938" class="apexcharts-bar-goals-markers">
                                                <g id="SvgjsG1940" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1942" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1944" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1946" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1948" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1950" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                            </g>
                                            <g id="SvgjsG1939"
                                                class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                        </g>
                                        <g id="SvgjsG1952" class="apexcharts-series" rel="2"
                                            seriesName="Revenue" data:realIndex="1">
                                            <path id="SvgjsPath1957"
                                                d="M 56.113720734914146 331.9961993827819 L 56.113720734914146 138.39907975311277 C 56.113720734914146 136.39907975311277 58.113720734914146 134.39907975311277 60.113720734914146 134.39907975311277 L 60.9478369553884 134.39907975311277 C 62.9478369553884 134.39907975311277 64.9478369553884 136.39907975311277 64.9478369553884 138.39907975311277 L 64.9478369553884 331.9961993827819 C 64.9478369553884 333.9961993827819 62.9478369553884 335.9961993827819 60.9478369553884 335.9961993827819 L 60.113720734914146 335.9961993827819 C 58.113720734914146 335.9961993827819 56.113720734914146 333.9961993827819 56.113720734914146 331.9961993827819 Z "
                                                fill="rgba(24,144,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 56.113720734914146 331.9961993827819 L 56.113720734914146 138.39907975311277 C 56.113720734914146 136.39907975311277 58.113720734914146 134.39907975311277 60.113720734914146 134.39907975311277 L 60.9478369553884 134.39907975311277 C 62.9478369553884 134.39907975311277 64.9478369553884 136.39907975311277 64.9478369553884 138.39907975311277 L 64.9478369553884 331.9961993827819 C 64.9478369553884 333.9961993827819 62.9478369553884 335.9961993827819 60.9478369553884 335.9961993827819 L 60.113720734914146 335.9961993827819 C 58.113720734914146 335.9961993827819 56.113720734914146 333.9961993827819 56.113720734914146 331.9961993827819 Z "
                                                pathFrom="M 56.113720734914146 335.9961993827819 L 56.113720734914146 335.9961993827819 L 64.9478369553884 335.9961993827819 L 64.9478369553884 335.9961993827819 L 64.9478369553884 335.9961993827819 L 64.9478369553884 335.9961993827819 L 64.9478369553884 335.9961993827819 L 56.113720734914146 335.9961993827819 Z"
                                                cy="134.39807975311277" cx="164.34116220474243" j="0"
                                                val="120" barHeight="201.59711962966918"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1959"
                                                d="M 168.34116220474243 331.9961993827819 L 168.34116220474243 264.39727952165595 C 168.34116220474243 262.39727952165595 170.34116220474243 260.39727952165595 172.34116220474243 260.39727952165595 L 173.17527842521667 260.39727952165595 C 175.17527842521667 260.39727952165595 177.17527842521667 262.39727952165595 177.17527842521667 264.39727952165595 L 177.17527842521667 331.9961993827819 C 177.17527842521667 333.9961993827819 175.17527842521667 335.9961993827819 173.17527842521667 335.9961993827819 L 172.34116220474243 335.9961993827819 C 170.34116220474243 335.9961993827819 168.34116220474243 333.9961993827819 168.34116220474243 331.9961993827819 Z "
                                                fill="rgba(24,144,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 168.34116220474243 331.9961993827819 L 168.34116220474243 264.39727952165595 C 168.34116220474243 262.39727952165595 170.34116220474243 260.39727952165595 172.34116220474243 260.39727952165595 L 173.17527842521667 260.39727952165595 C 175.17527842521667 260.39727952165595 177.17527842521667 262.39727952165595 177.17527842521667 264.39727952165595 L 177.17527842521667 331.9961993827819 C 177.17527842521667 333.9961993827819 175.17527842521667 335.9961993827819 173.17527842521667 335.9961993827819 L 172.34116220474243 335.9961993827819 C 170.34116220474243 335.9961993827819 168.34116220474243 333.9961993827819 168.34116220474243 331.9961993827819 Z "
                                                pathFrom="M 168.34116220474243 335.9961993827819 L 168.34116220474243 335.9961993827819 L 177.17527842521667 335.9961993827819 L 177.17527842521667 335.9961993827819 L 177.17527842521667 335.9961993827819 L 177.17527842521667 335.9961993827819 L 177.17527842521667 335.9961993827819 L 168.34116220474243 335.9961993827819 Z"
                                                cy="260.39627952165597" cx="276.56860367457074" j="1"
                                                val="45" barHeight="75.59891986112595"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1961"
                                                d="M 280.56860367457074 331.9961993827819 L 280.56860367457074 208.95807162349698 C 280.56860367457074 206.95807162349698 282.56860367457074 204.95807162349698 284.56860367457074 204.95807162349698 L 285.402719895045 204.95807162349698 C 287.402719895045 204.95807162349698 289.402719895045 206.95807162349698 289.402719895045 208.95807162349698 L 289.402719895045 331.9961993827819 C 289.402719895045 333.9961993827819 287.402719895045 335.9961993827819 285.402719895045 335.9961993827819 L 284.56860367457074 335.9961993827819 C 282.56860367457074 335.9961993827819 280.56860367457074 333.9961993827819 280.56860367457074 331.9961993827819 Z "
                                                fill="rgba(24,144,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 280.56860367457074 331.9961993827819 L 280.56860367457074 208.95807162349698 C 280.56860367457074 206.95807162349698 282.56860367457074 204.95807162349698 284.56860367457074 204.95807162349698 L 285.402719895045 204.95807162349698 C 287.402719895045 204.95807162349698 289.402719895045 206.95807162349698 289.402719895045 208.95807162349698 L 289.402719895045 331.9961993827819 C 289.402719895045 333.9961993827819 287.402719895045 335.9961993827819 285.402719895045 335.9961993827819 L 284.56860367457074 335.9961993827819 C 282.56860367457074 335.9961993827819 280.56860367457074 333.9961993827819 280.56860367457074 331.9961993827819 Z "
                                                pathFrom="M 280.56860367457074 335.9961993827819 L 280.56860367457074 335.9961993827819 L 289.402719895045 335.9961993827819 L 289.402719895045 335.9961993827819 L 289.402719895045 335.9961993827819 L 289.402719895045 335.9961993827819 L 289.402719895045 335.9961993827819 L 280.56860367457074 335.9961993827819 Z"
                                                cy="204.95707162349697" cx="388.79604514439905" j="2"
                                                val="78" barHeight="131.03812775928498"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1963"
                                                d="M 392.79604514439905 331.9961993827819 L 392.79604514439905 87.99979984569546 C 392.79604514439905 85.99979984569546 394.79604514439905 83.99979984569546 396.79604514439905 83.99979984569546 L 397.6301613648733 83.99979984569546 C 399.6301613648733 83.99979984569546 401.6301613648733 85.99979984569546 401.6301613648733 87.99979984569546 L 401.6301613648733 331.9961993827819 C 401.6301613648733 333.9961993827819 399.6301613648733 335.9961993827819 397.6301613648733 335.9961993827819 L 396.79604514439905 335.9961993827819 C 394.79604514439905 335.9961993827819 392.79604514439905 333.9961993827819 392.79604514439905 331.9961993827819 Z "
                                                fill="rgba(24,144,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 392.79604514439905 331.9961993827819 L 392.79604514439905 87.99979984569546 C 392.79604514439905 85.99979984569546 394.79604514439905 83.99979984569546 396.79604514439905 83.99979984569546 L 397.6301613648733 83.99979984569546 C 399.6301613648733 83.99979984569546 401.6301613648733 85.99979984569546 401.6301613648733 87.99979984569546 L 401.6301613648733 331.9961993827819 C 401.6301613648733 333.9961993827819 399.6301613648733 335.9961993827819 397.6301613648733 335.9961993827819 L 396.79604514439905 335.9961993827819 C 394.79604514439905 335.9961993827819 392.79604514439905 333.9961993827819 392.79604514439905 331.9961993827819 Z "
                                                pathFrom="M 392.79604514439905 335.9961993827819 L 392.79604514439905 335.9961993827819 L 401.6301613648733 335.9961993827819 L 401.6301613648733 335.9961993827819 L 401.6301613648733 335.9961993827819 L 401.6301613648733 335.9961993827819 L 401.6301613648733 335.9961993827819 L 392.79604514439905 335.9961993827819 Z"
                                                cy="83.99879984569546" cx="501.02348661422735" j="3"
                                                val="150" barHeight="251.9963995370865"
                                                barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1965"
                                                d="M 505.02348661422735 331.9961993827819 L 505.02348661422735 57.76023190124507 C 505.02348661422735 55.76023190124507 507.02348661422735 53.76023190124507 509.02348661422735 53.76023190124507 L 509.85760283470154 53.76023190124507 C 511.85760283470154 53.76023190124507 513.8576028347015 55.76023190124507 513.8576028347015 57.76023190124507 L 513.8576028347015 331.9961993827819 C 513.8576028347015 333.9961993827819 511.85760283470154 335.9961993827819 509.85760283470154 335.9961993827819 L 509.02348661422735 335.9961993827819 C 507.02348661422735 335.9961993827819 505.02348661422735 333.9961993827819 505.02348661422735 331.9961993827819 Z "
                                                fill="rgba(24,144,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 505.02348661422735 331.9961993827819 L 505.02348661422735 57.76023190124507 C 505.02348661422735 55.76023190124507 507.02348661422735 53.76023190124507 509.02348661422735 53.76023190124507 L 509.85760283470154 53.76023190124507 C 511.85760283470154 53.76023190124507 513.8576028347015 55.76023190124507 513.8576028347015 57.76023190124507 L 513.8576028347015 331.9961993827819 C 513.8576028347015 333.9961993827819 511.85760283470154 335.9961993827819 509.85760283470154 335.9961993827819 L 509.02348661422735 335.9961993827819 C 507.02348661422735 335.9961993827819 505.02348661422735 333.9961993827819 505.02348661422735 331.9961993827819 Z "
                                                pathFrom="M 505.02348661422735 335.9961993827819 L 505.02348661422735 335.9961993827819 L 513.8576028347015 335.9961993827819 L 513.8576028347015 335.9961993827819 L 513.8576028347015 335.9961993827819 L 513.8576028347015 335.9961993827819 L 513.8576028347015 335.9961993827819 L 505.02348661422735 335.9961993827819 Z"
                                                cy="53.75923190124507" cx="613.2509280840557" j="4" val="168"
                                                barHeight="282.2359674815369" barWidth="16.834116220474243"></path>
                                            <path id="SvgjsPath1967"
                                                d="M 617.2509280840557 331.9961993827819 L 617.2509280840557 173.67857568830487 C 617.2509280840557 171.67857568830487 619.2509280840557 169.67857568830487 621.2509280840557 169.67857568830487 L 622.0850443045299 169.67857568830487 C 624.0850443045299 169.67857568830487 626.0850443045299 171.67857568830487 626.0850443045299 173.67857568830487 L 626.0850443045299 331.9961993827819 C 626.0850443045299 333.9961993827819 624.0850443045299 335.9961993827819 622.0850443045299 335.9961993827819 L 621.2509280840557 335.9961993827819 C 619.2509280840557 335.9961993827819 617.2509280840557 333.9961993827819 617.2509280840557 331.9961993827819 Z "
                                                fill="rgba(24,144,255,0.85)" fill-opacity="1" stroke="transparent"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="8"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                clip-path="url(#gridRectMaskntlmxnkd)"
                                                pathTo="M 617.2509280840557 331.9961993827819 L 617.2509280840557 173.67857568830487 C 617.2509280840557 171.67857568830487 619.2509280840557 169.67857568830487 621.2509280840557 169.67857568830487 L 622.0850443045299 169.67857568830487 C 624.0850443045299 169.67857568830487 626.0850443045299 171.67857568830487 626.0850443045299 173.67857568830487 L 626.0850443045299 331.9961993827819 C 626.0850443045299 333.9961993827819 624.0850443045299 335.9961993827819 622.0850443045299 335.9961993827819 L 621.2509280840557 335.9961993827819 C 619.2509280840557 335.9961993827819 617.2509280840557 333.9961993827819 617.2509280840557 331.9961993827819 Z "
                                                pathFrom="M 617.2509280840557 335.9961993827819 L 617.2509280840557 335.9961993827819 L 626.0850443045299 335.9961993827819 L 626.0850443045299 335.9961993827819 L 626.0850443045299 335.9961993827819 L 626.0850443045299 335.9961993827819 L 626.0850443045299 335.9961993827819 L 617.2509280840557 335.9961993827819 Z"
                                                cy="169.67757568830487" cx="725.4783695538839" j="5"
                                                val="99" barHeight="166.31762369447708"
                                                barWidth="16.834116220474243"></path>
                                            <g id="SvgjsG1954" class="apexcharts-bar-goals-markers">
                                                <g id="SvgjsG1956" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1958" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1960" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1962" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1964" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                                <g id="SvgjsG1966" className="apexcharts-bar-goals-groups"
                                                    class="apexcharts-hidden-element-shown"
                                                    clip-path="url(#gridRectMarkerMaskntlmxnkd)"></g>
                                            </g>
                                            <g id="SvgjsG1955"
                                                class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                        </g>
                                        <g id="SvgjsG1937"
                                            class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                            data:realIndex="0"></g>
                                        <g id="SvgjsG1953"
                                            class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                            data:realIndex="1"></g>
                                    </g>
                                    <line id="SvgjsLine1986" x1="0" y1="0"
                                        x2="673.3646488189697" y2="0" stroke="#b6b6b6"
                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1987" x1="0" y1="0"
                                        x2="673.3646488189697" y2="0" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1988" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1989" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"><text id="SvgjsText1991"
                                                font-family="Helvetica, Arial, sans-serif" x="56.113720734914146"
                                                y="364.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1992">Jan</tspan>
                                                <title>Jan</title>
                                            </text><text id="SvgjsText1994"
                                                font-family="Helvetica, Arial, sans-serif" x="168.34116220474243"
                                                y="364.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1995">Feb</tspan>
                                                <title>Feb</title>
                                            </text><text id="SvgjsText1997"
                                                font-family="Helvetica, Arial, sans-serif" x="280.56860367457074"
                                                y="364.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1998">Mar</tspan>
                                                <title>Mar</title>
                                            </text><text id="SvgjsText2000"
                                                font-family="Helvetica, Arial, sans-serif" x="392.79604514439905"
                                                y="364.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan2001">Apr</tspan>
                                                <title>Apr</title>
                                            </text><text id="SvgjsText2003"
                                                font-family="Helvetica, Arial, sans-serif" x="505.02348661422735"
                                                y="364.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan2004">May</tspan>
                                                <title>May</title>
                                            </text><text id="SvgjsText2006"
                                                font-family="Helvetica, Arial, sans-serif" x="617.2509280840555"
                                                y="364.99519938278195" text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan2007">Jun</tspan>
                                                <title>Jun</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG2026" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2027" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2028" class="apexcharts-point-annotations"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(250, 173, 20);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(24, 144, 255);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <h5 class="mb-3">Transaction History</h5>
            <div class="card">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="avtar avtar-s rounded-circle text-success bg-light-success">
                                    <i class="ti ti-gift f-18"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Order #002434</h6>
                                <p class="mb-0 text-muted">Today, 2:00 AM</p>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <h6 class="mb-1">+ $1,430</h6>
                                <p class="mb-0 text-muted">78%</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="avtar avtar-s rounded-circle text-primary bg-light-primary">
                                    <i class="ti ti-message-circle f-18"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Order #984947</h6>
                                <p class="mb-0 text-muted">5 August, 1:45 PM</p>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <h6 class="mb-1">- $302</h6>
                                <p class="mb-0 text-muted">8%</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="avtar avtar-s rounded-circle text-danger bg-light-danger">
                                    <i class="ti ti-settings f-18"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Order #988784</h6>
                                <p class="mb-0 text-muted">7 hours ago</p>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <h6 class="mb-1">- $682</h6>
                                <p class="mb-0 text-muted">16%</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
