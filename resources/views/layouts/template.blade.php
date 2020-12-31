<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- link會全部show在此HTML全部秀出 分為全站用外部套件都有用到及部分分頁用到 以利盡可能達到優化作用  p.s.若後續有新增將會附註更新-->

    <!-- 全站用 start -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- 全站用 end -->

    <!-- 部分分頁選用  start-->
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- 部分分頁選用  end-->

    <!-- layout -->
    <link rel="stylesheet" href="{{ asset('./css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/menu.css') }}">
    <!-- page css  -->
    @yield('css')

</head>

<body>
    <nav id="mainNav">
        <div class="container">
            <div class="row">
                <div class="hamburg">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul>
                    <li>
                        <div class="drop_down_menu">
                            <a href="#">願景理念</a>
                            <a href="{{ asset('history') }}">公司沿革</a>
                            <a href="{{ asset('security_policy') }}">職安品質政策</a>
                        </div>
                        <a style="cursor: default;">關於我們</a>
                    </li>
                    <li>
                        <div class="drop_down_menu">
                            <a href="{{ asset('job_opportunities') }}">職缺公告</a>
                            <a href="{{ asset('tender') }}">得標資訊</a>
                        </div>
                        <a style="cursor: default;">動態消息</a>
                    </li>
                    <li>
                        <a href="{{ asset('serve') }}">服務項目</a>
                    </li>
                    <li>
                        <div class="drop_down_menu">
                            <a href="{{ asset('award_stories') }}">得獎事蹟</a>
                            <a href="{{ asset('certification_trophy') }}">認證及獎盃</a>
                        </div>
                        <a style="cursor: default;">得獎及認證</a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('./img/logo.svg') }}" alt="宏義工程"></a>
                    </li>
                    <li>
                        <div class="drop_down_menu">
                            <a href="#">土木工程</a>
                            <a href="#">環保工程</a>
                            <a href="#">建築工程</a>
                            <a href="#">其他</a>
                        </div>
                        <a style="cursor: default;">工程實績</a>
                    </li>
                    <li>
                        <div class="drop_down_menu">
                            <a href="#">土木工程</a>
                            <a href="#">環保工程</a>
                            <a href="#">建築工程</a>
                            <a href="#">其他</a>
                        </div>
                        <a style="cursor: default;">在建工程</a>
                    </li>
                    <li>
                        <a href="#">技術專區</a>
                    </li>
                    <li>
                        <a href="/occupational_safety">職安資訊</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="hamburgLink">
        <div class="btnGroup">
            <div class="hamburg">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="phoneStyleIcon">
                <img src="./img/logo.svg" alt="">
            </div>
            <!-- 選單 -->
            <div id="menu-btn-content">
                <div class="title-level-wrapper drop-down">
                    <a>關於我們</a>
                    <div class="sub-level-wrapper">
                        <a>願景理念</a>
                        <a>公司沿革</a>
                        <a>職安品質政策</a>
                    </div>
                </div>
                <div class="title-level-wrapper drop-down">
                    <a>動態消息</a>
                    <div class="sub-level-wrapper">
                        <a>職缺公告</a>
                        <a>得標資訊</a>
                    </div>
                </div>
                <div class="title-level-wrapper">
                    <a>服務項目</a>
                </div>
                <div class="title-level-wrapper drop-down">
                    <a>得獎及認證</a>
                    <div class="sub-level-wrapper">
                        <a>得獎事蹟</a>
                        <a>認證及獎盃</a>
                    </div>
                </div>
                <div class="title-level-wrapper drop-down">
                    <a>工程實績</a>
                    <div class="sub-level-wrapper">
                        <a>土木工程</a>
                        <a>環保工程</a>
                        <a>建築工程</a>
                        <a>其他</a>
                    </div>
                </div>
                <div class="title-level-wrapper drop-down">
                    <a>在建工程</a>
                    <div class="sub-level-wrapper">
                        <a>土木工程</a>
                        <a>環保工程</a>
                        <a>建築工程</a>
                        <a>其他</a>
                    </div>
                </div>
                <div class="title-level-wrapper">
                    <a>技術專區</a>
                </div>
                <div class="title-level-wrapper">
                    <a>職安資訊</a>
                </div>
            </div>
            <!-- 選單 -->

        </div>
        <div class="hamburgMask"></div>
    </div>
    <!-- 內頁起點 -->
    <main>
        @yield('main')
    </main>
    <!-- 內頁結束 -->
    <!-- 聯絡我們開始 -->
    <a href="{{ asset('contact_us') }}" id="contactus">
        <div class="btn_box">
            聯絡我們
        </div>
    </a>
    <!-- 聯絡我們結束 -->
    <!-- mail 按鈕開始 -->
    <a id="email" class="fixed_icon" href="#">
        <div class="icon_box">
            <i class="far fa-envelope"></i>
        </div>
    </a>
    <!-- mail 按鈕結束 -->
    <!-- gototop 按鈕開始 -->
    <a id="goTop" class="fixed_icon" href="#">
        <div class="icon_box">
            <i class="fa fa-chevron-up" aria-hidden="true"></i>
        </div>
    </a>
    <!-- gototop 按鈕結束 -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footerLogo">
                    <img src="{{ asset('./img/footerLogo.svg') }}" alt="頁尾LOGO">
                </div>
                <div class="contactInformation">
                    <ul>
                        <li>TEL 04-26869581</li>
                        <li>FAX 04-26869580</li>
                        <li>0930-000000</li>
                        <li>hy.m37f@gmail.com</li>
                        <li>43762台中市大甲區開元路37-2號</li>
                    </ul>
                </div>
                <div class="copyRight">
                    <!-- 下拉選單 -->
                    <!-- HTML預設無法改option樣式用此方式改變CSS 會將值取出放置input -->
                    <!-- <div class="languageSelectArea">
                        <a class="selectStyle btn" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">繁體中文</a>
                        <input id="inputValue" type="hidden" value="">
                        <div class="optionStyle collapse" id="collapseExample">
                            <div class="card card-body">繁體中文</div>
                        </div>
                        <div class="optionStyle collapse" id="collapseExample">
                            <div class="card card-body">English</div>
                        </div>
                    </div> -->
                    <div class="copyRightText">© 2020 宏義工程股份有限公司 版權所有</div>
                </div>
            </div>
        </div>
    </footer>

    <!-- js 外部CDN的會全部show在此HTML全部秀出 分為全站都有用到及部分分頁用到 以利盡可能達到優化作用  p.s.若後續有新增將會附註更新-->

    <!-- 全站用 start -->
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <!-- 全站用 end -->

    <!-- 部分分頁選用 start-->
    <!-- swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- parallax -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/parallax/2.1.3/jquery.parallax.min.js"></script>
    <!-- 部分分頁選用 end-->

    <!-- //layout -->
    <script src="./js/template.js"></script>
    <!-- page -->
    @yield('js')
</body>

</html>
