@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
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

    img#image {
        display: block;
        max-width: 100%;
    }

    .preview {
        display: none;
        overflow: hidden;
        width: 260px;
        height: 260px;
        margin-left: 10px;
        border: 1px solid red;
    }

    #cropbtn {
        margin-top: 10px;
        margin-left: 10px;
        display: none
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    專案管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/project_managements/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <input type="text" name="creator" id="" value="{{ Auth::user()->name }}" hidden>
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">工程名稱</label>
                            <div class="col-10">
                                <input class="form-control" id="name" name="name" value="{{ $list->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="target" class="col-2 col-form-label">標</label>
                            <div class="col-10">
                                <input class="form-control" id="target" name="target" value="{{ $list->target }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="approved_date" class="col-2 col-form-label">核定日期</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="approved_date" name="approved_date" value="{{ date('Y-m-d', strtotime($list->approved_date)) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-2 col-form-label">開工日期</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d', strtotime($list->start_date)) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="finished_date" class="col-2 col-form-label">完工日期</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="finished_date" name="finished_date" value="{{ date('Y-m-d', strtotime($list->finished_date)) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="director" class="col-2 col-form-label">工地主任</label>
                            <div class="col-10">
                                <input class="form-control" id="director" name="director" value="{{ $list->director }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remark" class="col-2 col-form-label">備註</label>
                            <div class="col-10">
                                <input class="form-control" id="remark" name="remark" value="{{ $list->remark }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imgs" class="col-2 col-form-label">工程照片(目前圖片)</label>
                            <div class="col-10 row">
                                <div class="imgs_area mx-2 mb-2">
                                    <img src="{{$list->img}}" alt="" width="200">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- 裁減圖片區塊 --}}
                            <div class="col-md-6 offset-md-2 mb-3">
                                <img id="image" src="">
                            </div>
                            <div class="col-md-4">
                                <div id="preview" class="preview"></div>
                            </div>
                            <label for="img" class="col-2 col-form-label">工程照片(更新圖片)</label>
                            <div class="col-10">
                                <input id="uploadImg" type="file" data-mywidth="1024" data-myheight="768"
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                {{-- <input type="file" class="form-control" id="img" name="img[]" multiple> --}}
                                @error('img.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-form-label"><strong>指派人員 </strong></label><br>
                            @foreach ($names as $index=>$item)
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="assign_names[]"
                                    @if (str_contains($list->assign_names??'', $item->name)) checked="checked" @endif id="assign_names{{ $index }}">
                                    <label class="form-check-label" for="assign_names{{ $index }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                        <button id="form_submit" type="submit" class="btn btn-primary d-block mx-auto">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
