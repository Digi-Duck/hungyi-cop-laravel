@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
<style>
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
                    得標資訊管理-新增
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/tenders" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">權重</label>
                            <div class="col-10">
                                <input class="form-control" type="number" id="sort" name="sort" required>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">權重等於排序，數字越小排序越前面。</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tender_date" class="col-2 col-form-label">得標日期</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="tender_date" name="tender_date">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            {{-- 裁減圖片區塊 --}}
                            <div class="col-md-6 offset-md-2 mb-3">
                                <img id="image" src="">
                            </div>
                            <div class="col-md-4">
                                <div id="preview" class="preview"></div>
                            </div>
                            <label for="img" class="col-2 col-form-label">封面圖片</label>
                            <div class="col-10">
                                <input id="uploadImg" type="file" data-mywidth="415" data-myheight="310"
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                @error('img.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <p class="text-danger">單多張圖片裁減上傳</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imgs" class="col-2 col-form-label">內容圖片</label>
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
                            <label for="title" class="col-2 col-form-label">得標標題</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-2 col-form-label">得標內容</label>
                            <div class="col-10">
                                <textarea class="summernote" name="content" id="content" cols="30" rows="10"
                                    required></textarea>
                            </div>
                        </div>
                        <hr>
                        <button id="form_submit" type="button" class="btn btn-primary d-block mx-auto">新增</button>
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
        $('.clear_start').click(function () {
            $('#start').val('');
        });
        $('.clear_end').click(function () {
            $('#end').val('');
        });
</script>

<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
