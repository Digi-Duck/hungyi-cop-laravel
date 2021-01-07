@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/index.css">
@endsection
@section('main')
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="bannerTitle">
                    <div>腳踏實地</div>
                    <div>品質第一</div>
                </div>
                <div class="Introduction">
                    <div>
                        企業的永續經營，要有堅忍的毅力與長遠的眼光。今天雖然比過去更成長、茁壯，卻不敢以此自滿；堅持一份責任與榮譽的敬業精神，致力於提升每一件工作品質，是我們自我要求的準則，也是全體同仁的智慧與努力所創造出來。
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="swiper">
        <div class="background"></div>
        <div class="container">
            <div class="row">
                <div class="swiperTitle">工程實績</div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($performances as $item)
                        <?php
                            if ($item->type_id == 1)
                                $type_name = '土木工程';
                            elseif ($item->type_id == 2)
                                $type_name = '環保工程';
                            elseif ($item->type_id == 3)
                                $type_name = '建築工程';
                            elseif ($item->type_id == 4)
                                $type_name = '其他';
                        ?>
                        <div class="swiper-slide">
                            <div class="photo">
                                <img src="{{ asset($item->imgs) }}" alt="">
                            </div>
                            <div class="projectName">
                                {{-- <div class="date">109</div> --}}
                                <div class="name">{{ $item->title }}</div>
                            </div>
                            <div class="location">
                                <div>經費</div>
                                <div>{{ $item->funds }}</div>
                            </div>
                            <div class="category">
                                <div>類別</div>
                                <div>{{ $type_name }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiperArrows">
                    <!-- Add Arrows -->
                    <div class="swiper-button-prev">
                    </div>
                    <div class="swiper-button-next">
                    </div>
                </div>
                <a href="{{ asset('/performance/1') }}" class="more">更多實績</a>
            </div>
        </div>
    </section>
    <section id="serviceItems">
        <div class="background"></div>
        <div class="serviceItemsTitle">服務項目</div>
        <div class="itemsWrap">
            <a href="{{ asset('/performance/1') }}" class="item">
                <div class="itemsTitle">
                    <div>土木</div>
                    <div>工程</div>
                </div>
                <div class="hoverText">
                    <div>
                        本公司參與了各項國家重大建設，包括橋梁、一般道路、快速道路、高速公路、整地、水保工程等
                    </div>
                </div>
            </a>
            <a href="{{ asset('/performance/2') }}" class="item">
                <div class="itemsTitle">
                    <div>環保</div>
                    <div>工程</div>
                </div>
                <div class="hoverText">
                    <div>
                        廢棄物清理及污水管汰換等。
                    </div>
                </div>
            </a>
            <a href="{{ asset('/performance/3') }}" class="item">
                <div class="itemsTitle">
                    <div>建築</div>
                    <div>工程</div>
                </div>
                <div class="hoverText">
                    <div>
                        本公司提供包括高級住宅、商業辦公大樓、工業廠辦、軍營、發電廠以及大規模的社區開發等。
                    </div>
                </div>
            </a>
            <a href="{{ asset('/performance/4') }}" class="item">
                <div class="itemsTitle">
                    <div>其他</div>
                    <div>工程</div>
                </div>
                <div class="hoverText">
                    <div>
                        除了台灣以外，現也擴及海外地區，如：越南等。
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section id="pursueFirst">
        <div class="pursueFirstTitle">
            <div></div>
            <div>追求第一</div>
            <div></div>
        </div>
        <div class="companyPhoto">
            <img src="./img/index/company-01.svg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="pursueFirstPhoto">
                    <img src="./img/index/pursueFirst1.svg" alt="">
                </div>
                <div class="pursueFirstPhoto">
                    <img src="./img/index/pursueFirst2.svg" alt="">
                </div>
                <div class="pursueFirstPhoto">
                    <img src="./img/index/pursueFirst3.svg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="advantage">
        <div class="advantageTitle">關鍵優勢</div>
        <div class="content">
            <div class="advantageCard">
                <div class="cardTitle">經驗豐富、技術優越的專業人才</div>
                <div class="cardContent">
                    工程人員均為經驗豐富、技術優越的專業人才，當承攬工程標案時，能立即成立專案組織，包括縱向部分依技術專業別，由工務部及建築或土木部門經理督導。橫向部分則因應各工項需要，由該工程專案經理統指揮。此外尚有該案之採發部門負責統計各工料成本及預定進度。以堅強的團隊人力、經驗及技術，確實在安全環境下準確地控制工程的品質，進度與預算，讓各工程標案皆能順利如期如質完成。
                </div>
            </div>
            <div class="cardPhoto">
                <img src="./img/index/advantage1.jpg" alt="">
            </div>
        </div>
        <div class="content">
            <div class="cardPhoto">
                <img src="./img/index/advantage2.jpg" alt="">
            </div>
            <div class="advantageCard">
                <div class="cardTitle">穩健的財務為後盾</div>
                <div class="cardContent">
                    財務部門配合採發部門分析各工程現金流量需求，資金調度，以穩健的財務為後盾支援工程標案順利完成。
                </div>
            </div>
        </div>
    </section>

    <section id="news">
        <div class="container">
            <div class="news_block row">
                <h1>動態消息</h1>
                <a class="more_news_btn" href="{{ asset('/tender') }}">
                    <div class="left">更多動態</div>
                    <div class="right">
                        <span class="triangle"></span>
                    </div>
                </a>
                <div class="news_lists">
                    <ul>
                        @foreach ($tenders as $item)
                        <a href="{{ asset('tender_detail/'.$item->id) }}">
                            <li>
                                <span class="triangle"></span>
                                <span class="type">得標資訊</span>
                                <span class="data">{{ $item->tender_date }}</span>
                                <span class="title">{{ $item->title }}</span>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
var swiper = new Swiper('.swiper-container', {
    slidesPerView:1,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints:{
        1400: {
            slidesPerView: 3,
            spaceBetween: 0,
        },
        1000: {
            slidesPerView: 2,
            spaceBetween: 0,
        },
    }
});
</script>
@endsection
