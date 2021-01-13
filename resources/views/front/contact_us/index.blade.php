@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/10-contact_us/contact_us.css">
    <style>
        .alert-success {
            background-color: #004663;
            color: #eee;
        }
    </style>
@endsection
@section('main')
        @if(session()->has('message'))
        <div class="container">
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        </div>
        @endif
    <div class="container">
        <div class="infomation">
            <div class="infoBlock">
                <div class="office">台北總公司</div>
                <span>電話：<br>04-2771-8965</span>
                <span>傳真：<br>02-2775-5896</span>
            </div>
            <div class="infoBlock">
                <div class="office">台中辦公室</div>
                <span>電話：<br>04-2386-1278</span>
                <span>傳真：<br>04-2386-8128</span>
            </div>
            <span><b>營業時間：</b>周一至周日 08:00-17:30</span>
        </div>
        <form method="POST" action="/admin/contactus" enctype="multipart/form-data">
            @csrf
            <div class="name">
                <label for="name">姓名</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="phone">
                <label for="phone">電話</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="email">
                <label for="email">信箱</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="contain">
                <label for="content">內容</label>
                <textarea name="content" id="content" cols="30" rows="10" required></textarea>
            </div>
            <div class="varify">
                <label for="checkword">驗證碼</label>
                <input type="text" name="checkword" id="checkword" maxlength="10" required>
            </div>
            <div class="btns">
                {{-- <div class="varify_img"></div> --}}
                <img class="varify_img" id="imgcode" src='{{ asset('/php/captcha.php') }}' />
                <div class="varify_refresh" onclick="refresh_code()">
                    <img style="height: 100%;" src="{{ asset('/img/index/refresh.svg') }}" alt="">
                </div>
                <button type="submit">確認送出</button>
            </div>

        </form>
    </div>
@endsection

@section('js')
    <script>
        function refresh_code(){
            document.getElementById("imgcode").src='{{ asset('/php/captcha.php') }}';
        }
    </script>
@endsection
