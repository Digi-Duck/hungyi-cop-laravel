@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/05-preformance/05-preformance.css">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>土木工程</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>工程實績</a></li>
                    <li class="breadcrumb-item active" aria-current="page">土木工程</li>
                </ol>
                <ol class="tab">
                    <li class="tab_btn active"><a href="#">土木工程</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn"><a href="#">環保工程</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn"><a href="#">建築工程</a></li>
                    <li class="mark"></li>
                    <li class="tab_btn"><a href="#">其他</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 card_content">
                <div class="card">
                    <div class="card_img_top">
                        <div class="card_create_date">區段1-1</div>
                        <div class="hover_mask">
                            <div class="hover_icon"></div>
                            <div class="hover_text">MORE</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">標題標題標題標題標題標題標題標題標題標題標題標題</h5>
                        <div class="card_info">
                            <div class="date">
                                <span class="sub_info">工期</span>
                                <span>2017/11 ~ 2020/02</span>
                            </div>
                            <div class="budget">
                                <span class="sub_info">經費</span>
                                <span>12,015,580</span>
                            </div>
                            <div class="intro">
                                <span class="sub_info">簡介</span>
                                <span>內容內容內容內容內容內容內容內容內容內容內容內容</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div aria-label="Page navigation" class="pages">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('js')

@endsection

