@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/10-contact_us/contact_us.css">
@endsection
@section('main')
    <div class="container">
        <div class="infomation">
            <div>聯絡資訊</div>
            <span>電話：<br>04-26869581</span>
            <span>傳真：<br>02-27755896</span>
            <span>營業時間：<br>周一至周日 08:00-17:30</span>
        </div>
        <form action="">
            <div class="name">
                <label for="name">姓名</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="phone">
                <label for="phone">電話</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="email">
                <label for="email">信箱</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="contain">
                <label for="contain">內容</label>
                <textarea name="contain" id="contain" cols="30" rows="10"></textarea>
            </div>
            <div class="varify">
                <label for="varify">驗證碼</label>
                <input type="text" name="varify" id="varify">
            </div>
            <div class="btns">
                <div class="varify_img"></div>
                <div class="varify_refresh"></div>
                <button type="submit">確認送出</button>
            </div>

        </form>
    </div>
@endsection

@section('js')

@endsection
