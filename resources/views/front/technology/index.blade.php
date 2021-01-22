@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('css/07-technology/07-technology.css') }}">
@endsection

@section('main')
<div class="page_header">
    <div style="background-image: url({{ asset($sub_banner->img) }})" class="sub_banner"></div>
    <div class="container">
        <h1>{{ $zone->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('/') }}">首頁</a></li>
                <li class="breadcrumb-item"><a>技術專區</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $zone->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="special_title">{{ $zone->subtitle }}</div>
    <p class="special_text">
        {{ $zone->content }}
    </p>
</div>
<!-- Swiper left begin -->
@foreach ($zone->blocks as $item)
@if ($item->style == 1)
<div class="swiper-left-begin swiper{{ $item->id }}">
    <div class="swiper-wrapper">
        @foreach ($item->details as $detail)
        <div class="swiper-slide">
            <div class="swiper_descript" style="background-color: {{ $item->block_color }}">
                <div class="title" style="color: {{ $item->text_color }}">{{ $detail->title }}</div>
                <div class="text" style="color: {{ $item->text_color }}">
                    <p>{{ $detail->content }}</p>
                </div>
            </div>
            <div class="swiper_img">
                <img src="{{ asset($detail->imgs) }}" alt="">
                <div class="pagination_block">
                    <!-- Add Pagination -->
                    <!-- Add Arrows -->
                    <div class="swiper-button-prev-left{{ $item->id }} swiper-button-prev swiper-button"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next-left{{ $item->id }} swiper-button-next swiper-button"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@elseif($item->style == 2)
<!-- Swiper right begin -->
<div class="swiper-right-begin swiper{{ $item->id }}">
    <div class="swiper-wrapper">
        @foreach ($item->details as $detail)
        <div class="swiper-slide">
            <div class="swiper_descript" style="background-color: {{ $item->block_color }}">
                <div class="title" style="color: {{ $item->text_color }}">{{ $detail->title }}</div>
                <div class="text" style="color: {{ $item->text_color }}">
                    <p>{{ $detail->content }}</p>
                </div>
            </div>
            <div class="swiper_img">
                <img src="{{ asset($detail->imgs) }}" alt="">
                <div class="pagination_block">
                    <!-- Add Pagination -->
                    <!-- Add Arrows -->
                    <div class="swiper-button-prev{{ $item->id }} swiper-button-prev-right swiper-button"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next{{ $item->id }} swiper-button-next-right swiper-button"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@elseif ($item->style == 3)
<!-- Swiper center begin -->
<div class="swiper-center-begin swiper{{ $item->id }}">
    <div class="swiper-wrapper">
        @foreach ($item->details as $detail)
        <div class="swiper-slide">
            <img src="{{ $detail->imgs }}" alt="">
            <div class="title">{{ $detail->title }}</div>
            <p class="text">{{ $detail->content }}</p>
        </div>
        @endforeach
    </div>
    <!-- Add Pagination -->
    <!-- Add Arrows -->
    <div class="swiper_arrow_block">
        <div class="swiper-button-next swiper-button-next-center{{ $item->id }}"></div>
        <div class="swiper-button-prev swiper-button-prev-center{{ $item->id }}"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
@endif
@endforeach
@endsection

@section('js')
@foreach ($zone->blocks as $item)
@if ($item->style == 1)
<script>
    var swiper<?php echo $item->id;?> = new Swiper('.swiper<?php echo $item->id;?>', {
        loop: true,
        centeredSlides: true,
        effect: 'fade',
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-left<?php echo $item->id;?>',
            prevEl: '.swiper-button-prev-left<?php echo $item->id;?>',
        },
    });
</script>
@elseif ($item->style == 2)
<script>
    var swiper<?php echo $item->id;?> = new Swiper('.swiper<?php echo $item->id;?>', {
        slidesPerView: 'auto',
        loop: true,
        centeredSlides: true,
        effect: 'fade',
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-right<?php echo $item->id;?>',
            prevEl: '.swiper-button-prev-right<?php echo $item->id;?>',
        },
    });
</script>
@elseif ($item->style == 3)
<script>
    var swiper<?php echo $item->id;?> = new Swiper('.swiper<?php echo $item->id;?>', {
        slidesPerView: 'auto',
        spaceBetween: 145,
        centeredSlides: true,
        loop: true,
        //设置断点宽度
        breakpoints: {
            1024: {
                spaceBetween: 145,
            },
            768: {
                spaceBetween: 45,
            },
            320: {
                spaceBetween: 10,
            },
            //窗口缩放时设置width
            on: {
                resize: function () {
                    this.params.width = window.innerWidth;
                    this.update();
                },
            }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-center<?php echo $item->id;?>',
            prevEl: '.swiper-button-prev-center<?php echo $item->id;?>',
        },
    });
</script>
@endif
@endforeach
@endsection
