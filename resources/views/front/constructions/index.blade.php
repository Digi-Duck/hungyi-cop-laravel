@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/06-consturctions/06-consturctions.css') }}">
@endsection

@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset($sub_banner->img) }})"></div>
        <div class="container">
            <h1>{{ $type_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/') }}">首頁</a></li>
                    <li class="breadcrumb-item"><a>在建工程</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $type_name }}</li>
                </ol>
                <ol class="tab">
                    <li class="tab_btn @if ($id == 1) active @endif"><a href="{{ asset('constructions/1') }}">土木工程</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn @if ($id == 3) active @endif"><a href="{{ asset('constructions/3') }}">建築工程</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn @if ($id == 2) active @endif"><a href="{{ asset('constructions/2') }}">環保工程</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn @if ($id == 4) active @endif"><a href="{{ asset('constructions/4') }}">其他</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($lists as $item)
            <div class="col-lg-6 card_content">
                <a href="{{ asset('constructions_detail/'.$item->id) }}">
                    <div class="card" data-toggle="modal" data-target="#award_storis_modal">
                        <div class="card_img_top" style="background-image: url('{{ $item->imgs }}')">
                            <div class="card_create_date">{{ $item->category }}</div>
                            <div class="hover_mask">
                                <div class="hover_icon"></div>
                                <div class="hover_text">MORE</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <div class="card_info">
                                <div class="date">
                                    <span class="sub_info">預定完工日</span>
                                    <span>{{ $item->complete_date }}</span>
                                </div>
                                <div class="budget">
                                    <span class="sub_info">承攬金額</span>
                                    <span>{{ $item->price }}</span>
                                </div>
                                <div class="intro">
                                    <span class="sub_info">簡介</span>
                                    <span>{{ $item->content }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        {{ $lists->links() }}
    </div>
@endsection

@section('name')

@endsection
