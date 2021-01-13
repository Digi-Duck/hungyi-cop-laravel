@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('./css/05-performance/05-performance_insider.css') }}">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>{{ $list->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>工程實績</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('performance/'.$list->type_id) }}">{{ $type_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $list->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="title">
            {{ $list->title }}
        </div>
        <div class="date_viewer">
            <?php
            $dt = \Carbon\Carbon::parse($list->created_at);
            $data = $dt->toDateString();
            ?>
            {{ $data }}
            <img src="{{ asset('./img/02-news/viewerEyes.svg') }}" alt="">
            {{ $list->view_times }}
        </div>
        <hr>
        <div class="pics">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($imgs as $item)
                        <div class="swiper-slide">
                            <img src="{{ $item->img }}" alt="">
                        </div>
                    @endforeach
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
                <span class="text">{{ $list->performances_date }}</span>
            </div>
            <div class="doubleTitle">
                <span class="listTitle">分類</span>
                <span class="text">{{ $type_name }}</span>
                <span class="listTitle">地點</span>
                <span class="text">{{ $list->location }}</span>
                <span class="listTitle">經費</span>
                <span class="text">{{ $list->funds }}</span>
            </div>
            <div class="singleTitle">
                <span class="listTitle">簡介</span>
                <span class="text">
                    {{ $list->content }}
                </span>
            </div>
        </div>
        <a href="{{ asset('performance/'.$list->type_id) }}">
            <div class="back">回上一頁</div>
        </a>
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
