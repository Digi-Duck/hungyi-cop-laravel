@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="./css/02-news/02-02-tender.css">
@endsection
@section('main')
    <div class="page_header">
        <div class="sub_banner"></div>
        <div class="container">
            <h1>得標資訊</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">首頁</a></li>
                    <li class="breadcrumb-item"><a>動態消息</a></li>
                    <li class="breadcrumb-item active" aria-current="page">得標資訊</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="tender_card">
            <div class="card_img_top" style="background-image:url('./img/02-news/TenderDemo.png');">
                <div class="hover_mask">
                    <div class="hover_icon"></div>
                    <div class="hover_text">MORE</div>
                </div>
            </div>
            <div class="content">
                <div class="title">基隆河員山子分洪工程隧道全線貫通典禮</div>
                <div class="date">2020-08-18</div>
                <div class="text"></div>
                <div class="readmore">閱讀更多</div>
            </div>
        </div>
        <div class="tender_card">
            <div class="card_img_top" style="background-image:url('./img/02-news/TenderDemo.png');">
                <div class="hover_mask">
                    <div class="hover_icon"></div>
                    <div class="hover_text">MORE</div>
                </div>
            </div>
            <div class="content">
                <div class="title">基隆河員山子分洪工程隧道全線貫通典禮</div>
                <div class="date">2020-08-18</div>
                <div class="text">
                    沙特阿拉伯於2011年宣布了“2024年國家長期戰略”，並雄心勃勃地追求能源開發項目，例如核電站，礦產，石油和天然氣。該工程是由現代E＆C訂購的核電站，礦產，石油和天然氣。該工程是由現沙特阿拉伯於2011年宣布了“2024年國家長期戰略”，並雄心勃勃地追求能源開發項目，例如核電站，礦產，石油和天然氣。該工程是由現代E＆C訂購的核電站，礦產，石油和天然氣。

                </div>
                <div class="readmore">閱讀更多</div>
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
