<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootnavbar.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"  id="main_navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/seo">SEO設定</a>
                        </li>
                        {{-- 首頁 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                關於我們
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/histories">公司沿革</a></li>
                                <li><a class="dropdown-item" href="/admin/security_polities">職安品質政策</a></li>
                            </ul>
                        </li>
                        {{-- 動態消息 --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    動態消息
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            職缺公告
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                            <li><a class="dropdown-item" href="/admin/job_opportunities_units">職缺單位</a></li>
                                            <li><a class="dropdown-item" href="/admin/job_opportunities">職缺名稱</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="/admin/tenders">得標資訊</a></li>
                                </ul>
                            </li>
                        {{-- 得獎及認證 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                得獎及認證
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/award_stories">得獎事蹟</a></li>
                                <li><a class="dropdown-item" href="/admin/certification_trophys">認證及獎盃</a></li>
                            </ul>
                        </li>
                        {{-- 工程實績 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                工程實績
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/performances/1">土木工程</a></li>
                                <li><a class="dropdown-item" href="/admin/performances/2">環保工程</a></li>
                                <li><a class="dropdown-item" href="/admin/performances/3">建築工程</a></li>
                                <li><a class="dropdown-item" href="/admin/performances/4">其他</a></li>
                            </ul>
                        </li>
                        {{-- 在建工程 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                在建工程
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/arounds">土木工程</a></li>
                                <li><a class="dropdown-item" href="/admin/friendships">環保工程</a></li>
                                <li><a class="dropdown-item" href="/admin/friendships">建築工程</a></li>
                                <li><a class="dropdown-item" href="/admin/friendships">其他</a></li>
                            </ul>
                        </li>
                        {{-- 技術專區 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/seo">技術專區</a>
                        </li>
                        {{-- 職安資訊 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                職安資訊
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/safety_minutes">職安衛生委員會議紀錄</a></li>
                                <li><a class="dropdown-item" href="/admin/safety_plans">職安衛生教育訓練計畫</a></li>
                                <li><a class="dropdown-item" href="/admin/safety_decrees">法令規章</a></li>
                                <li><a class="dropdown-item" href="/admin/safety_cases">案例宣導</a></li>
                                <li><a class="dropdown-item" href="/admin/safety_links">相關連結</a></li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        特殊專區
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <li><a class="dropdown-item" href="/admin/safety_zones_setings">專區設定</a></li>
                                        <li><a class="dropdown-item" href="/admin/safety_zones">專區連結</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        {{-- 聯絡我們 --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/contactus">聯絡我們</a>
                        </li>
                        {{-- 帳號管理 --}}
                        @if(Auth::user()->role == 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    帳號管理
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/admin/members">帳號列表</a></li>
                                </ul>
                            </li>
                        @endif
                        @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(Session::has('message'))
                <div class="container">
                    <?php
                        $message = Session::get('message');
                    ?>
                    <div onclick="$(this).hide();">
                        @if (mb_strlen($message) > 15)
                            <p class="alert alert-danger">{{ $message }}</p>
                        @else
                            <p class="alert alert-info">{{ $message }}</p>
                        @endif

                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>


     <script src="{{ asset('js/bootnavbar.js') }}"></script>
     <script>
        $(function () {
             $('#main_navbar').bootnavbar({
                 //option
                 animation: false
             });
         })
         $(document).ready(function () {
             if($('.error_message').length){

                 Swal.fire({
                     title: '請確認檔案格式!',
                     text: $('.error_message').text(),
                     icon: 'warning',
                     showCancelButton: true,
                     showConfirmButton: false,
                     cancelButtonColor: '#d33',
                 })
             }
         });
         @if(Session::has('message'))
             <?php
                 $message = Session::get('message');
             ?>
             @if (mb_strlen($message) > 15)
                 Swal.fire({
                     title: '操作失敗',
                     text: '{{$message}}',
                     icon: 'warning',
                     showCancelButton: true,
                     showConfirmButton: false,
                     cancelButtonText: 'OK',
                     cancelButtonColor: '#d33',
                 })
             @else
                 Swal.fire({
                     title: '操作成功',
                     text: '{{$message}}',
                     icon: 'success',
                     showConfirmButton: true,
                 })
             @endif
         @endif
     </script>
     @yield('js')
 </body>
 </html>
