@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('css/06-consturctions/06-constructions_insider.css') }}">
@endsection

@section('main')
<div class="page_header">
    <div class="sub_banner" style="background-image: url({{ asset($sub_banner->img) }})"></div>
    <div class="container">
        <h1>{{ $list->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">首頁</a></li>
                <li class="breadcrumb-item"><a>在建工程</a></li>
                <li class="breadcrumb-item"><a href="{{ asset('constructions/'.$list->type_id) }}">{{ $type_name }}</a>
                </li>
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
            <div class="block">
                <span class="listTitle">業主</span>
                <span class="text">{{ $list->owner }}</span>
            </div>
        </div>
        <div class="singleTitle">
            <div class="block">
                <span class="listTitle">契約工期</span>
                <span class="text">{{ $list->duration }}</span>
            </div>
        </div>
        <div class="doubleTitle">
            <div class="block">
                <span class="listTitle">決標日</span>
                <span class="text">{{ $list->award_date }}</span>
            </div>
            <div class="block">
                <span class="listTitle">開工日</span>
                <span class="text">{{ $list->start_date }}</span>
            </div>
            <div class="block">
                <span class="listTitle">預定完工日</span>
                <span class="text">{{ $list->complete_date }}</span>
            </div>
        </div>
        <div class="singleTitle">
            <div class="block">
                <span class="listTitle">承攬金額</span>
                <span class="text">{{ $list->price }}</span>
            </div>
        </div>
        <div class="progressBlock">
            <div class="expected progressBox">
                <div class="progressNumber">
                    {{ $list->scheduled_progress }}<span>%</span>
                </div>
                <div class="progressText">
                    預定進度
                </div>
            </div>
            <div class="actual progressBox">
                <div class="progressNumber">
                    {{ $list->actual_progress }}<span>%</span>
                </div>
                <div class="progressText">
                    實際進度
                </div>
            </div>
        </div>
        <div class="singleTitle">
            <div class="block">
                <span class="listTitle">簡介</span>
                <span class="text">
                    {{ $list->content }}
                </span>
            </div>
        </div>

        @isset($list->youtube)
        @php
        function convertYoutube($string) {
            return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                $string
            );
        }
        @endphp
        <div class="embed-responsive embed-responsive-16by9">
            <!-- enablejsapi：必為1-->
            <!-- origin：防止惡意的第三方JS，入侵並控制youtube播放器-->
            {{-- <iframe id="player"
                    src=""></iframe> --}}
            {!! convertYoutube($list->youtube) !!}
        </div>
        @endisset
    </div>
    <a href="">
        <div onclick="window.history.go(-1); return false;" class="back">回上一頁</div>
    </a>
</div>
@endsection

@section('js')
<script async src="//www.youtube.com/iframe_api"></script>
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
