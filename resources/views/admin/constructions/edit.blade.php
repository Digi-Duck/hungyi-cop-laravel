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
                    {{ $type }}-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/constructions/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <input type="text" name="this_type_id" value="{{ $list->type_id }}" hidden>
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">工程類型</label>
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
                            <label for="owner" class="col-2 col-form-label">業主</label>
                            <div class="col-10">
                                <input class="form-control" id="owner" name="owner" value="{{ $list->owner }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duration" class="col-2 col-form-label">契約工期</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="duration" value="{{ $list->duration }}"
                                    name="duration">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="award_date" class="col-2 col-form-label">決標日</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="award_date" value="{{ $list->award_date }}"
                                    name="award_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-2 col-form-label">開工日</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="start_date" value="{{ $list->start_date }}"
                                    name="start_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complete_date" class="col-2 col-form-label">預定完工日</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="complete_date"
                                    value="{{ $list->complete_date }}" name="complete_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-2 col-form-label">承攬金額</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $list->price }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="scheduled_progress" class="col-2 col-form-label">預定進度 (%)</label>
                            <div class="col-10">
                                <input type="number" max="100" step="0.01" class="form-control" id="scheduled_progress"
                                    value="{{ $list->scheduled_progress }}" name="scheduled_progress">
                            </div>
                            <div class="col-12">
                                <p class="text-danger">請輸入 0.00 ~ 100.00 的數值</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="actual_progress" class="col-2 col-form-label">實際進度 (%)</label>
                            <div class="col-10">
                                <input type="number" max="100" step="0.01" class="form-control" id="actual_progress"
                                    value="{{ $list->actual_progress }}" name="actual_progress">
                            </div>
                            <div class="col-12">
                                <p class="text-danger">請輸入 0.00 ~ 100.00 的數值</p>
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
                                <input id="uploadImg" type="file" data-mywidth="538" data-myheight="415"
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
                                @foreach ($list->constructionsImgs as $img)
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
                        <div class="form-group row">
                            <label for="youtube" class="col-2 col-form-label">Youtube影片網址</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="youtube" name="youtube"
                                    value="{{ $list->youtube }}">
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
                axios.post('/admin/constructions/deleteFile', { id: id,type: type })
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
