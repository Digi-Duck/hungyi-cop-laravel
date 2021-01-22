@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/04-award/04-02-certification_trophy.css">

@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset($sub_banner->img) }})"></div>
        <div class="container">
            <h1>認證及獎盃</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>得獎認證</a></li>
                    <li class="breadcrumb-item active" aria-current="page">認證及獎盃</li>
                </ol>
                <ol class="tab">
                    <li class="tab_btn"><a href="/award_stories">得獎事蹟</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn active"><a>認證及獎盃</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($lists as $index => $item)
            <div class="col-lg-6 card_content">
                <div class="card" data-toggle="modal" data-target="#award_storis_modal{{ $index }}">
                    <div class="card_img_top" style="background-image: url({{ $item->img }})">
                        <div class="card_create_date">{{ $item->award_date }}</div>
                        <div class="hover_mask">
                            <div class="hover_icon"></div>
                            <div class="hover_text">MORE</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->content }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- 得獎事蹟 modal -->
    @foreach ($lists as $index => $item)
    <div class="modal fade award_storis_modal" id="award_storis_modal{{ $index }}" tabindex="-1" role="dialog"
        aria-labelledby="award_storis_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_img_top" style="background-image: url({{ $item->img }})">
                        <div class="modal_create_date">{{ $item->award_date }}</div>
                    </div>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ $item->title }}</h5>
                    <p class="modal-text">{{ $item->content }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('js')

@endsection
