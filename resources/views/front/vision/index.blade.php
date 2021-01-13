@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/01-about/01-01-vision.css') }}">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>理念願景</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/') }}">首頁</a></li>
                    <li class="breadcrumb-item"><a>關於我們</a></li>
                    <li class="breadcrumb-item active" aria-current="page">理念願景</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <img src="{{ asset('img/01-about/01-vision/logo.png') }}" alt="">
        <p>
            我們已先後完成許多工程，我們卻不以此自滿，因為在社會不斷的要求下，仍然需要大家的支持與指教。宏義工程股份有限公司至盼以『專業、誠信、永續』來和社會一起成長。它不僅是屬於每一位同仁，更是屬於社會的。
        </p>
        <div class="row icon_row">
            <div class="col-lg-10 col-12 offset-lg-1 icon_col">
                <img src="./img/index/pursueFirst1.svg" alt="">
                <img src="./img/index/pursueFirst2.svg" alt="">
                <img src="./img/index/pursueFirst3.svg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-2 col-2 offset-md-1 mb-md-4 mb-2">
                <div class="h3_line"></div>
            </div>
            <div class="col-lg-4 col-md-6 col-8 mb-md-4 mb-2">
                <h3>迎接挑戰，構築專業</h3>
            </div>
            <div class="col-lg-3 col-md-2 col-2 mb-md-4 mb-2">
                <div class="h3_line"></div>
            </div>
            <div class="col-md-10 col-12 offset-md-1 descript">
                <div class="des_img_block">
                    <img src="./img/01-about/01-vision/des1.png" alt="">
                </div>
                <p>
                    自創業以來，有太多的荊棘與困厄，為實現工作的理想，全體員工堅持最大的韌性與耐力，共同努力，得以有現在的成績。回顧以
                    往，計畫未來，更深感責任之重大。深化『了解客戶需求，細膩處理訴求，滿足客戶需求』的基礎， 相信我們已經成功的邁出了第一步，對於未來，更是充滿了無比的信心。
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-2 col-2 offset-md-1 mb-md-4 mb-2">
                <div class="h3_line"></div>
            </div>
            <div class="col-lg-4 col-md-6 col-8 mb-md-4 mb-2">
                <h3>追求品質，體現誠信</h3>
            </div>
            <div class="col-lg-3 col-md-2 col-2 mb-md-4 mb-2">
                <div class="h3_line"></div>
            </div>
            <div class="col-md-10 col-12 offset-md-1 descript">
                <div class="des_img_block">
                    <img src="./img/01-about/01-vision/des2.png" alt="">
                </div>
                <p>
                    針對每件工程，透過工地完善的查核制度，堅持一份責任與榮譽的敬業精神，致力於提升每一件工作品質，是我們自我要求的準則，也是全體同仁的智慧與努力所創造出來。 </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-2 col-2 offset-md-1 mb-md-4 mb-2">
                <div class="h3_line"></div>
            </div>
            <div class="col-lg-4 col-md-6 col-8 mb-md-4 mb-2">
                <h3>迎接挑戰，構築專業</h3>
            </div>
            <div class="col-lg-3 col-md-2 col-2 mb-md-4 mb-2">
                <div class="h3_line"></div>
            </div>
            <div class="col-md-10 col-12 offset-md-1 descript">
                <div class="des_img_block">
                    <img src="./img/01-about/01-vision/des3.png" alt="">
                </div>
                <p>
                    給予同仁一份肯定與一個安定的工作環境，是維繫我們持續成長的原動力。今天雖然比過去更好，卻不敢以此自滿。企業的永續經營，要有紮實的基礎與長遠的眼光。宏義工程股份有限公司創立至今努力的基礎已建立，未來將以此基礎上加強管理與發展，邁開大步迎向更具挑戰的明天，是全體同仁所要牢記於心並追求的方向。
                </p>
            </div>
        </div>
    </div>
@endsection
