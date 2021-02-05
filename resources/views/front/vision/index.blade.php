@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/01-about/01-01-vision.css') }}">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset('img/00-banner/01-about.png') }})"></div>
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
                    自創業以來，有太多的荊棘與困厄，為實現工作的理想，全體員工堅持最大的韌性與耐力，共同努力，得以有現在的成績。回顧以往，計畫未來，更深感責任之重大。深化『了解客戶需求，細膩處理訴求，滿足客戶需求』的基礎， 相信我們已經成功的邁出了第一步，對於未來，更是充滿了無比的信心。
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
                <h3>站穩腳步，企業永續</h3>
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
        <div class="row">
            <div class="vision">
                <h2>我們的願景</h2>
                <div class="col-md-10 col-12 offset-md-1 step">
                    <h4>短期</h4>
                    <p style="text-align: justify">
                        為因應國內各項國家建設工程景氣循環，擴大承攬國內各項重要建築、土木、橋梁等工程，本公司目前計已承包新北市府、高公局、台電公司、台塑企業等之各類工程，深獲業主與業界之肯定與好評。並為配合國家各機關之重要大型建設，且希望將營運目標拓展至工程能量更高之業績，現積極參與如國工局、高公局、營建署、公路總局、高鐵局、台電公司等之各公共工程標案，並拓展工程類別包括有大樓建築、新建學校、高速公路、廠房、橋梁道路、水保、廢棄物清理、污水管汰換及其他修繕整建等。
                    </p>
                </div>
                <div class="col-md-10 col-12 offset-md-1 step">
                    <h4>中期</h4>
                    <p style="text-align: justify">
                        對於正在承包之業主加強業務往來，另發展其它單位如各大專院校、公家機構、其他各縣市政府單位之各類土木建築、工程，並除了持續承攬公共工程外，更將積極參與都市更新建設、土木開發及綠建築等。
                    </p>
                </div>
                <div class="col-md-10 col-12 offset-md-1 step">
                    <h4>長期</h4>
                    <p style="text-align: justify">
                        時代巨輪不斷向前邁進，全球化與高科技化是當今新世紀的二大特徵。台灣加入WTO及海峽兩岸經濟合作架構協議(ECFA)後，國內營造業面臨國際競爭的挑戰。在這開放多變的大時代裡，除了要維護多年來奠定的良好基礎外，更懷有未來永續經營的長遠打算。公司未來將持續進行組織改造，採用更新更優良的工法，並將計劃進軍大陸及越南等經濟起飛國家承攬工程、開發建材等，相信未來的發展及高獲利目標必定可期。
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
