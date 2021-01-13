
@extends('layouts.template')


@section('css')
    <link rel="stylesheet" href="./css/01-about/01-03-security_policy.css">
@endsection


@section('main')
    <div class="page_header">
        <div class="sub_banner" style="background-image: url({{ asset('img/00-banner/01-about.png') }})"></div>
        <div class="container">
            <h1>職安品質政策</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a>關於我們</a></li>
                    <li class="breadcrumb-item active" aria-current="page">職安品質政策</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="poilcy_content">
            <h2>職業安全衛生政策</h2>
            <div class="health_policy">
                <ol>
                    <li><span class="text_orange">「生命無價」</span></li>
                    <li><span class="text_orange">「關懷員工」</span></li>
                    <li><span class="text_orange">「重視公義」</span></li>
                    <li><span class="text_orange">「成長共榮」</span></li>
                </ol>
            </div>
            <h2>品質政策</h2>
            <div class="quality_policy">
                <ol>
                    <li><span class="text_orange">「品質保證」</span>闡明需求，有效管理</li>
                    <li><span class="text_orange">「確保進度」</span>掌握工期，適當施工</li>
                    <li><span class="text_orange">「積極創新」</span>技術更新，優化工材</li>
                    <li><span class="text_orange">「經驗傳承」</span>薪傳知識，永續經營</li>
                </ol>
            </div>
            <h2>職業安全衛生目標</h2>
            <div class="sanitation_goals">
                <ol>
                    <li>虛驚事故一年<span class="text_orange">低於 {{ $list->accidents_false }} 次</span></li>
                    <li>
                        <span class="text_orange">{{ $list->deaths }} </span>死亡、<span class="text_orange">{{ $list->accidents_times }} </span>重傷災害、<span
                            class="text_orange">{{ $list->hospitalized }} </span>住院治療
                    </li>
                    <li>
                        罰款一年<span class="text_orange">最多 {{ $list->fines_times }} 次</span>，<span class="text_orange">少於 {{ $list->fines_million }} 萬</span>
                    </li>
                    <li>
                        輕傷事故<span class="text_orange">低於 {{ $list->accidents_people }} 人</span>，一年<span class="text_orange">低於 {{ $list->injury }} 次</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
