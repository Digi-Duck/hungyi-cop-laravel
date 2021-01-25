@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/02-news/02-02-tender_insider.css') }}">
@endsection

@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset($sub_banner->img) }})"></div>
        <div class="container">
            <h1>得標資訊</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>動態消息</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('tender') }}">得標資訊</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $list->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="title">{{ $list->title }}</div>
        <div class="date_viewer">
            {{ $list->tender_date }}
            <img src="{{ asset('./img/02-news/viewerEyes.svg') }}" alt="">
            {{ $list->view_times }}
        </div>
        <hr>
        <div class="pics">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($imgs as $item)
                        @if ($item->tender_id == $id)
                        <div class="swiper-slide">
                            <img src="{{ asset($item->img) }}" alt="">
                        </div>
                        @endif
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
            {!! $list->content !!}
        </div>
        <a href="{{ asset('tender/') }}">
            <div onclick="window.history.go(-1); return false;" class="back">回上一頁</div>
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

