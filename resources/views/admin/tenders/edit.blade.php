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
                    得標資訊管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/tenders/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
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
                            <label for="tender_date" class="col-2 col-form-label">得標日期</label>
                            <div class="col-10">
                                <input class="form-control" type="date" name="tender_date" id="tender_date"
                                    value="{{ $list->tender_date }}">
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
                                <input id="uploadImg" type="file" data-mywidth="415" data-myheight="310"
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                {{-- <input type="file" class="form-control" id="img" name="img[]"> --}}
                                @error('img.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="img" class="col-2 col-form-label">內容圖片(目前圖片)</label>
                            <div class="col-10 row">
                                @foreach ($list->tenderImgs as $img)
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
                                <p class="text-danger">支援多張圖片上傳 *建議圖片解析度(寬 * 高)：1140 x 641</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">公告標題 (英)</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" value="{{$list->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-2 col-form-label">公告內容 (英)</label>
                            <div class="col-10">
                                <textarea class="summernote" name="content" id="content" cols="30"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

<script>
    $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            })
        });
        $('.del_btn').click(function () {
            var type = $(this).attr("data-type");
            if(type == "img")
                var yes = confirm('你確定刪除這張圖片嗎？');
            else
                var yes = confirm('你確定刪除這個附件嗎？');

            if (yes) {
                var id = $(this).attr("data-id");
                axios.post('/admin/tenders/delNewsFile', { id: id,type: type })
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

<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
