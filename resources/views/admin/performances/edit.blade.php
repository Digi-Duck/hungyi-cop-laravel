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
                    工程實績-{{ $type }}管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/performances/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <input type="text" name="this_type_id" value="{{ $list->type_id }}" hidden>
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">實績類型</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="sort" name="sort" value="{{ $type }}"
                                    disabled required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">權重</label>
                            <div class="col-10">
                                <input class="form-control" type="number" id="sort" name="sort"
                                    value="{{ $list->sort }}" required>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">權重等於排序，數字越小排序越前面。</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">工程標題</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" value="{{ $list->title }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="performances_date" class="col-2 col-form-label">工期</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="performances_date" name="performances_date"
                                    value="{{ $list->performances_date }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-2 col-form-label">地點</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $list->location }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="funds" class="col-2 col-form-label">經費</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="funds" name="funds"
                                    value="{{ $list->funds }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="imgs" class="col-2 col-form-label">封面圖片(目前圖片)</label>
                            <div class="col-10 row">
                                <div class="imgs_area mx-2 mb-2">
                                    <img src="{{$list->imgs}}" alt="" width="200">
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
                            <label for="img" class="col-2 col-form-label">封面圖片(更新圖片)</label>
                            <div class="col-10">
                                <input id="uploadImg" type="file" data-mywidth="960" data-myheight="540"
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                {{-- <input type="file" class="form-control" id="img" name="img[]" multiple> --}}
                                @error('img.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="img" class="col-2 col-form-label">內容圖片(目前圖片)</label>
                            <div class="col-10 row">
                                @foreach ($list->performancesImgs as $img)
                                <div class="imgs_area mx-2 mb-2">
                                    <div class="del_btn bg-danger text-white" data-type="img" data-id="{{$img->id}}">X
                                    </div>
                                    <img src="{{$img->img}}" alt="" width="200">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imgs" class="col-2 col-form-label">內容圖片(新增圖片)</label>
                            <div class="col-10">
                                <input type="file" class="form-control" id="imgs" name="imgs[]" multiple>
                                @error('imgs.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <p class="text-danger">支援多張圖片上傳 *建議圖片解析度(寬 * 高)：1110 x 540</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="content" class="col-2 col-form-label">實績內容</label>
                            <div class="col-10">
                                <textarea style="width: 100%;" name="content" id="content" cols="30"
                                    rows="10">{{$list->content}}</textarea>
                            </div>
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
<script>
    $('.del_btn').click(function () {
            var type = $(this).attr("data-type");
            if(type == "img")
                var yes = confirm('你確定刪除這張圖片嗎？');
            else
                var yes = confirm('你確定刪除這個附件嗎？');

            if (yes) {
                var id = $(this).attr("data-id");
                axios.post('/admin/performances/deleteFile', { id: id,type: type })
                .then((res) => {
                    alert('刪除成功');
                    $(this).parent().remove();
                })
                .catch((error) => {  alert('刪除失敗'); })
            } else {

            }
        });
        $('.clear_start').click(function () {
            $('#start').val('');
        });
        $('.clear_end').click(function () {
            $('#end').val('');
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
