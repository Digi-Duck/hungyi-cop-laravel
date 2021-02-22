@extends('layouts.app')

@section('css')
<style>
    .imgs_area {
        position: relative;
    }

    .imgs_area img {
        border: 1px solid #000;
    }

    .del_btn {
        position: absolute;
        top: 0;
        right: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        transform: translate(50%, -50%);
        font-size: 25px;
        line-height: 30px;
        text-align: center;
        z-index: 20;
        cursor: pointer;
    }

    .fa-file {
        font-size: 48px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    CCTV管理-查看
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/cctvs/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-2">工程名稱</label>
                            <div class="col-12 col-md-10">
                                {{ $list->title }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cctv_title" class="col-12 col-md-2">CCTV名稱</label>
                            <div class="col-12 col-md-10">
                                {{ $list->cctv_title }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-12 col-md-2">網址</label>
                            <div class="col-12 col-md-10">
                                <a href="{{ $list->url }}" target="_block">{{ $list->url }}</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="account" class="col-12 col-md-2">帳號</label>
                            <div class="col-12 col-md-10">
                                {{ $list->account }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-12 col-md-2">密碼</label>
                            <div class="col-12 col-md-10">
                                {{ $list->password }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12"><strong>指派人員 </strong></label><br>
                            @foreach ($names as $index=>$item)
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}"
                                        name="assign_names[]" disabled @if (str_contains($list->assign_names,
                                    $item->name)) checked="checked" @endif id="assign_names{{ $index }}">
                                    <label class="form-check-label" for="assign_names{{ $index }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection