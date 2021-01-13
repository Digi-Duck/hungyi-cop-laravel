@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="./css/02-news/02-01-job_opportunity.css">
@endsection

@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset('img/00-banner/02-job.png') }})"></div>
        <div class="container">
            <h1>職缺公告</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>動態消息</a></li>
                    <li class="breadcrumb-item active" aria-current="page">職缺公告</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <h2>福利與待遇</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 welfare_content">
                <div class="top_img">
                    <img src="{{ asset('img/02-news/F1.jpg') }}" alt="">
                </div>
                <ol class="intro_text">
                    <li>員工聚餐</li>
                    <li>員工旅遊</li>
                    <li>各級主管健康檢查</li>
                    <li>一般員工之健康檢查</li>
                </ol>
            </div>
            <div class="col-lg-3 col-md-6 welfare_content">
                <div class="top_img">
                    <img src="{{ asset('img/02-news/F2.jpg') }}" alt="">
                </div>
                <ol class="intro_text">
                    <li>三節禮金 <br>
                        （端午、中秋、春節）</li>
                    <li>陪產假、特休假、女性生理假、育嬰假</li>
                    <li>勞保、健保、新制勞退提撥、團保意外及醫療險</li>
                </ol>
            </div>
            <div class="col-lg-3 col-md-6 welfare_content">
                <div class="top_img">
                    <img src="{{ asset('img/02-news/F3.jpg') }}" alt="">
                </div>
                <ol class="intro_text">
                    <li>激勵獎金</li>
                    <li>績效獎金</li>
                    <li>年終獎金</li>
                </ol>
            </div>
            <div class="col-lg-3 col-md-6 welfare_content">
                <div class="top_img">
                    <img src="{{ asset('img/02-news/F4.jpg') }}" alt="">
                </div>
                <ol class="intro_text">
                    <li>每年會舉辦關於勞工安全衛生的教育訓練，並定期做身體健康檢查，工作場所皆提供制服及安全設備給現場人員。</li>
                </ol>
            </div>
        </div>
        <h2>加入我們</h2>
        <div class="join_us">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($units as $unit)
                    <div class="swiper-slide">
                        <div class="silde_title">{{ $unit->unit }}</div>
                        <?php
                            $unit_id = $unit->id;
                        ?>
                        <ol>
                            @foreach ($lists as $item)
                                @if ($item->unit_id == $unit_id)
                                <li>{{ $item->position }}</li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <h2>職缺連結</h2>
        <div class="row justify-content-around">
            <div class="col-md-4 url_img">
                <a href="https://www.1111.com.tw/corp/536082/" target="_block">
                    <img src="./img/02-news/01.png" alt="">
                </a>
            </div>
            <div class="col-md-4 url_img">
                <a href="https://www.104.com.tw/company/178h5z0w" target="_block">
                    <img src="./img/02-news/02.png" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 10,
            // init: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                '@0.00': {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                '@0.75': {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                '@1.00': {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                '@1.50': {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            }
        });
    </script>
@endsection
