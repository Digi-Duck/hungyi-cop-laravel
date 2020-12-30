@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/03-serve/03-01-serve.css">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>服務項目</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">服務項目</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 serve_block">
                <div class="serve_item offset_vertical" style="background-image: url(./img/03-serve/01.png);">
                    <div class="serve_icon">
                        <img src="./img/03-serve/icon01.png" alt="">
                    </div>
                    <div class="serve_info">
                        <p class="small_title">土木工程</p>
                        <p class="discript">
                            本公司參與了各項國家重大建設，包括橋梁、一般道路、快速道路、高速公路、整地、水保工程等。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 serve_block">
                <div class="serve_item offset_vertical" style="background-image: url(./img/03-serve/02.png);">
                    <div class="serve_icon">
                        <img src="./img/03-serve/icon02.png" alt="">
                    </div>
                    <div class="serve_info">
                        <p class="small_title">建築工程</p>
                        <p class="discript">
                            本公司提供包括高級住宅、商業辦公大樓、工業廠辦、軍營、發電廠以及大規模的社區開發等。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 serve_block">
                <div class="serve_item offset_vertical" style="background-image: url(./img/03-serve/03.png);">
                    <div class="serve_icon">
                        <img src="./img/03-serve/icon03.png" alt="">
                    </div>
                    <div class="serve_info">
                        <p class="small_title">環境工程</p>
                        <p class="discript">
                            廢棄物清理及污水管汰換等。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 serve_block">
                <div class="serve_item offset_vertical">
                    <div class="serve_icon">
                        <img src="./img/03-serve/icon04.png" alt="">
                    </div>
                    <div class="serve_info">
                        <p class="small_title">其他</p>
                        <p class="discript">
                            除了台灣以外，現也擴及海外地區，如：越南等。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
