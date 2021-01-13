@extends('layouts.app')

@section('css')
<style>
    .imgs_area{
        position: relative;
    }
    .imgs_area img{
        border: 1px solid #000;
    }
    .del_btn{
        position:absolute;
        top: 0;
        right:0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        transform: translate(50%,-50%);
        font-size: 25px;
        line-height: 30px;
        text-align: center;
        z-index: 20;
        cursor: pointer;
    }
    .fa-file{
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
                    CCTV管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/cctvs/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">工程名稱</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" value="{{ $list->title }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cctv_title" class="col-2 col-form-label">CCTV名稱</label>
                            <div class="col-10">
                                <input class="form-control" id="cctv_title" name="cctv_title" value="{{ $list->cctv_title }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-2 col-form-label">網址</label>
                            <div class="col-10">
                                <input class="form-control" id="url" name="url" value="{{ $list->url }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="account" class="col-2 col-form-label">帳號</label>
                            <div class="col-10">
                                <input class="form-control" id="account" name="account" value="{{ $list->account }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-2 col-form-label">密碼</label>
                            <div class="col-10">
                                <input class="form-control" id="password" name="password" value="{{ $list->password }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-form-label"><strong>指派人員 </strong></label><br>
                            @foreach ($names as $index=>$item)
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="assign_names[]"
                                    @if (str_contains($list->assign_names, $item->name)) checked="checked" @endif id="assign_names{{ $index }}">
                                    <label class="form-check-label" for="assign_names{{ $index }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary d-block mx-auto">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
