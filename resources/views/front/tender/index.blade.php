@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/02-news/02-02-tender.css">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>得標資訊</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>動態消息</a></li>
                    <li class="breadcrumb-item active" aria-current="page">得標資訊</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        @foreach ($lists as $index => $item)
        <a href="/tender_detail/{{ $item->id }}">
            <div class="tender_card">
                <div class="card_img_top" style="background-image:url({{ $item->imgs }});">
                    <div class="hover_mask">
                        <div class="hover_icon"></div>
                        <div class="hover_text">MORE</div>
                    </div>
                </div>
                <div class="content">
                    <div class="title">{{ $item->title }}</div>
                    <div class="date">{{ $item->tender_date }}</div>
                    <div class="text"></div>
                    <div class="readmore">閱讀更多</div>
                </div>
            </div>
        </a>
        @endforeach
        {{ $lists->links() }}
    </div>
@endsection

@section('js')

@endsection
