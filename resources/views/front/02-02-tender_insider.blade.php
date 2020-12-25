@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="./css/02-news/02-02-tender_insider.css">
@endsection

@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>得標資訊</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">首頁</a></li>
                    <li class="breadcrumb-item"><a>動態消息</a></li>
                    <li class="breadcrumb-item"><a href="">得標資訊</a></li>
                    <li class="breadcrumb-item active" aria-current="page">得標資訊</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="title">本公司於92.11.27取得東西向快速公路八里新店線第一優先後續路段第2-3Z標及管線工程Z標及管線工程(標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題)</div>
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
            <p>第九屆公共工程金質獎12/10公佈得獎名單，本公司承攬之「台北都會區環河快速道路台北縣側建設計畫-二重疏洪道口至華江橋段工程（第四標）」工程榮獲第九屆公共工程金質獎土木類特優獎項。</p>
            <p>「公共工程金質獎」是象徵國內工程界最高榮譽的獎項，本公司已多次獲獎，表示本公司之品質管理、施工技術、工地安全及環境衛　生，深獲肯定。</p>
            <p>依相關辦法規定：得獎廠商參與公共工程投標時，應繳納之押標金、履約保證金及保固保證金可享有減收百分之五十之優惠。</p>
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

