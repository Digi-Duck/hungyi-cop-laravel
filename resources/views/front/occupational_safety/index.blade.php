@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/08-occupational_safety/occupational_safety.css">
@endsection
@section('main')
    <section id="info">
        <div class="container">
            <div class="row swiper_block">
                <h1>職安衛生委員會議紀錄</h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($minutes as $item)
                        <a href="{{ asset($item->file) }}" class="swiper-slide"
                            target="_black">{{ $item->name }}</a>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            </div>
            <div class="row swiper_block">
                <h1>職安衛生教育訓練計畫</h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($plans as $item)
                        <a href="{{ asset($item->file) }}"
                            class="swiper-slide" target="_black">{{ Str::limit($item->name, 20, '...') }}</a>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            </div>
            <div class="row swiper_block">
                <h1>法令規章</h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($decrees as $item)
                        <a href="{{ asset($item->file) }}" target="_black"
                            class="swiper-slide">{{ Str::limit($item->name, 20, '...') }}</a>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            </div>
            <div class="row swiper_block">
                <h1>案例宣導</h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($cases as $item)
                        <a href="{{ asset($item->file) }}" target="_black"
                            class="swiper-slide">{{ Str::limit($item->name, 20, '...') }}</a>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            </div>
            <div class="row swiper_block">
                <h1>相關連結</h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($links as $item)
                        <a href="{{ asset($item->url) }}" target="_block" class="swiper-slide">{{ $item->name }}</a>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            </div>
        </div>
    </section>

    @isset($zone_seting->switch)
    <section id="news">
        <div class="container">
            <div class="news_block row">
                <h1>{{ $zone_seting->title }}</h1>
                <a href="{{ $zone_seting->url }}" target="_black" class="more_news_btn">
                    <div class="left">更多消息</div>
                    <div class="right">
                        <span class="triangle"></span>
                    </div>
                </a>
                <div class="news_lists">
                    <ul>
                        @foreach ($zones as $item)
                        <a href="{{ $item->url }}" target="_black">
                            <li>
                                <span class="triangle"></span>
                                <span class="title">{{ $item->name }}</span>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endisset
@endsection

@section('js')
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            centeredSlides: true,
            spaceBetween: 18,
            grabCursor: true,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection
