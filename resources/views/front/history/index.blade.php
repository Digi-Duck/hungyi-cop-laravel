@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/01-about/01-02-history.css">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset($sub_banner->img) }})"></div>
        <div class="container">
            <h1>公司沿革</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>關於我們</a></li>
                    <li class="breadcrumb-item active" aria-current="page">公司沿革</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="timeline_content">
            @foreach ($lists as $item)
            <div class="event_block">
                <div class="event_offset">
                    <div class="year">{{ $item->year }}</div>
                    <div class="event_intro">
                        <div class="event_title">{{ $item->event }}</div>
                        <div class="event_sub_title">
                            <div class="capital">{{ $item->capital }}</div>
                            <div class="address">{{ $item->address }}</div>
                            <div style="width: 100%" class="engineering">{{ $item->engineering }}</div>
                        </div>
                        @if (isset($item->img))
                        <div class="event_img">
                            <img style="width: 100%" src="{{ $item->img }}" alt="">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

@section('js')

@endsection
