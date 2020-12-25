@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/05-preformance/05-preformance_insider.css">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>大地工程</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">首頁</a></li>
                    <li class="breadcrumb-item"><a>工程實績</a></li>
                    <li class="breadcrumb-item"><a href="#">大地工程</a></li>
                    <li class="breadcrumb-item active" aria-current="page">大地工程</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="title">
            本公司於92.11.27取得東西向快速公路八里新店線第一優先後續路段第2-3Z標及管線工程Z標及管線工程(標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題)</div>
        <div class="date_viewer">
            2020-02-20
            <img src="./img/02-news/viewerEyes.svg" alt="">
            21,999
        </div>
        <hr>
        <div class="pics">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./img/02-news/TenderDemo.png" alt="">
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="content">
            <div class="singleTitle">
                <span class="listTitle">工期</span>
                <span class="text">2017/11～2020/02；825 日曆天</span>
            </div>
            <div class="doubleTitle">
                <span class="listTitle">分類</span>
                <span class="text">大地工程</span>
                <span class="listTitle">地點</span>
                <span class="text">區段1-1</span>
                <span class="listTitle">經費</span>
                <span class="text">790,880仟元</span>
            </div>
            <div class="singleTitle">
                <span class="listTitle">簡介</span>
                <span class="text">高速公路為國內南北交通大動脈，擔負城際運輸與經濟發展之關鍵因素；從
                    921地震經驗，高速公路更扮演著臺灣地區生命救災道路之重要角色。隨著國家橋梁耐震規範標準之提升，為達成全面提升國道橋梁耐震能力，減少地震災損，並建構高效率的地震救災緊急道路系統的目標。本工程範圍包含國道3號竹崎交流道連絡道穿越橋南側至台20線穿越橋（288k＋500
                    ∼ 348k＋600）所有橋梁，計 38 座。</span>
            </div>
        </div>
        <div class="back">回上一頁</div>
    </div>
@endsection

@section('js')
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
