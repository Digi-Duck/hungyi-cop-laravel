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
                        <a href="./file/occupational_safety/109年第一次職業安全委員會會議紀錄.pdf" class="swiper-slide"
                            target="_black">109年第一次職業安全委員會會議紀錄</a>
                        <a href="./file/occupational_safety/109年第二次職業安全委員會會議紀錄.pdf" class="swiper-slide"
                            target="_black">109年第二次職業安全委員會會議紀錄</a>
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
                        <a href="./file/occupational_safety/109.03.05宏中安字第1090004號-訂109年03月24日(星期二)上午9辦理「台灣職安卡」教育訓練如說.pdf"
                            class="swiper-slide" target="_black">第二次「台灣職安卡」教育訓練</a>
                        <a href="./file/occupational_safety/16 109.03.30宏中安字第109003301號-訂109年04月24日(星期五)上午9時辦理『台灣職安卡』教育訓練.pdf"
                            class="swiper-slide" target="_black">第三次「台灣職安卡」教育訓練</a>
                        <a href="./file/occupational_safety/109.05.20宏中安字第1090005201號-訂109年06月20日(星期六)上午09時辦理台灣職安卡教育訓練如說.pdf"
                            class="swiper-slide" target="_black">第四次「台灣職安卡」教育訓練</a>
                        <a href="./file/occupational_safety/19 109.05.04宏中安字第1090005041號-訂109年05月15日(星期五)上午09時辦理台灣職安卡教育訓練如.pdf"
                            class="swiper-slide" target="_black">第五次「台灣職安卡」教育訓練</a>
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
                        <a href="./file/occupational_safety/1勞動基準法.pdf" target="_black"
                            class="swiper-slide">勞動基準法</a>
                        <a href="./file/occupational_safety/1營造安全衛生設施標準.pdf" target="_black"
                            class="swiper-slide">營造安全衛生設施標準</a>
                        <a href="./file/occupational_safety/1職業安全衛生法.pdf" target="_black"
                            class="swiper-slide">職業安全衛生法</a>
                        <a href="./file/occupational_safety/1職業安全衛生設施規則.pdf" target="_black"
                            class="swiper-slide">職業安全衛生設施規則</a>
                        <a href="./file/occupational_safety/營造安全衛生設施標準圖解.pdf" target="_black"
                            class="swiper-slide">營造安全衛生設施標準圖解</a>
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
                        <a href="./file/occupational_safety/case/104年度營造業重大職災實例摘要.pdf" target="_black"
                            class="swiper-slide">104年度營造業重大職災實例摘要</a>
                        <a href="./file/occupational_safety/case/105年全部案例彙編.pdf" target="_black"
                            class="swiper-slide">105年全部案例彙編</a>
                        <a href="./file/occupational_safety/case/106年度年度重大職業災害實例彙編.pdf" target="_black"
                            class="swiper-slide">106年度年度重大職業災害實例彙編</a>
                        <a href="./file/occupational_safety/case/107全部案例彙編.pdf" target="_black"
                            class="swiper-slide">107全部案例彙編</a>
                        <a href="./file/occupational_safety/case/使用移動式起重機搭乘設備從事作業重大職災案例.pdf" target="_black"
                            class="swiper-slide">使用移動式起重機搭乘設備從事作業重大職災案例</a>
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
                        <a href="https://www.mol.gov.tw/" target="_block" class="swiper-slide">勞動部</a>
                        <a href="https://www.osha.gov.tw/" target="_block" class="swiper-slide">勞動部職業安全衛生署</a>
                        <a href="https://www.ilosh.gov.tw/" target="_block" class="swiper-slide">勞動部勞動及職業安全衛生研究所</a>
                        <a href="https://laws.mol.gov.tw/FLAW/index-1.aspx" target="_block"
                            class="swiper-slide">勞動部法令查詢系統</a>
                        <a href="https://pacs.osha.gov.tw/17453" target="_block"
                            class="swiper-slide">職安衛卓越網/重大職災公開網</a>
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

    <section id="news">
        <div class="container">
            <div class="news_block row">
                <h1>疫情專區</h1>
                <a href="https://www.mol.gov.tw/topic/44761/45003/" target="_black" class="more_news_btn">
                    <div class="left">更多消息</div>
                    <div class="right">
                        <span class="triangle"></span>
                    </div>
                </a>
                <div class="news_lists">
                    <ul>
                        <a href="https://www.mol.gov.tw/topic/44761/45003/45004/44765/44785/" target="_black">
                            <li>
                                <span class="triangle"></span>
                                <span class="title">基於防疫的必要措施，中小學配合指揮中心延後開學之決策，勞工權益可以請什麼假？</span>
                            </li>
                        </a>
                        <a href="https://www.mol.gov.tw/topic/44761/45003/45004/44767/44787/" target="_black">
                            <li>
                                <span class="triangle"></span>
                                <span class="title">雇主強迫勞工赴第三級地區(如中國大陸)工作，勞工如欲主動終止契約而與雇主發生勞資爭議時，應如何請求協助？</span>
                            </li>
                        </a>
                        <a href="https://www.mol.gov.tw/topic/44761/45003/45004/44769/44807/" target="_black">
                            <li>
                                <span class="triangle"></span>
                                <span
                                    class="title">有關中央流行疫情指揮中心宣布特定地區返臺之民眾須接受檢疫（或隔離）後，雇主仍指派勞工前往特定地區工作者，勞工返臺後檢疫（或隔離）期間，無法出勤之工資給付規定為何？</span>
                            </li>
                        </a>
                        <a href="https://www.mol.gov.tw/topic/44761/45003/45004/45043/45045/" target="_black">
                            <li>
                                <span class="triangle"></span>
                                <span class="title">面對疫情未趨緩，事業單位召開勞資會議僅能以集會方式召開嗎？</span>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </section>
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
