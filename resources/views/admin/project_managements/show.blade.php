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
                    專案管理-查看
                </h4>
                <div class="card-body">
                    <form>
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="name" class="col-12 col-md-2">專案名稱</label>
                            <div class="col-12 col-md-10">
                                {{ $list->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="target" class="col-12 col-md-2">標</label>
                            <div class="col-12 col-md-10">
                                {{ $list->target }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="approved_date" class="col-12 col-md-2">核定日期</label>
                            <div class="col-12 col-md-10">
                                {{ date('Y/m/d', strtotime($list->approved_date)) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-12 col-md-2">開工日期</label>
                            <div class="col-12 col-md-10">
                                {{ date('Y/m/d', strtotime($list->start_date)) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="finished_date" class="col-12 col-md-2">完工日期</label>
                            <div class="col-12 col-md-10">
                                {{ date('Y/m/d', strtotime($list->finished_date)) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="director" class="col-12 col-md-2">工地主任</label>
                            <div class="col-12 col-md-10">
                                {{ $list->director }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remark" class="col-12 col-md-2">備註</label>
                            <div class="col-12 col-md-10">
                                {{ $list->remark }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="creator" class="col-12 col-md-2">創建者</label>
                            <div class="col-12 col-md-10">
                                {{ $list->creator }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="creator" class="col-12 col-md-2">工地照片</label>
                            <div class="col-12 col-md-10">
                                <img class="w-50 w-md-100" src="{{ $list->img }}" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12"><strong>指派人員 </strong></label><br>
                            @foreach ($names as $index=>$item)
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}"
                                        name="assign_names[]" disabled
                                        @if (str_contains($list->assign_names??'', $item->name))
                                            checked="checked"
                                        @endif id="assign_names{{ $index }}">
                                    <label class="form-check-label" for="assign_names{{ $index }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                        <button id="form_submit" type="submit" class="btn btn-primary d-block mx-auto" onClick="history.go(-1); return false;">返回</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
