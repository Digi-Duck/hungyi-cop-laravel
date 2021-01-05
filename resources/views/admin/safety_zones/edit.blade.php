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
                    專區連結管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/safety_zones/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">權重</label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="{{ $list->sort }}" required>
                            </div>
                            <div class="col-12"><p class="text-danger">權重等於排序，數字越大排序越前面。</p></div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">連結名稱</label>
                            <div class="col-10">
                                <input class="form-control" id="name" name="name" value="{{ $list->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-2 col-form-label">網址</label>
                            <div class="col-10">
                                <input class="form-control" id="url" name="url" value="{{ $list->url }}" required>
                            </div>
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
