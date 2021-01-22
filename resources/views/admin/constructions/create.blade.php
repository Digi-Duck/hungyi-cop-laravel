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
                    @if ($id == 1)
                    在建工程-土木工程管理-新增
                    @elseif ($id == 2)
                    在建工程-環保工程管理-新增
                    @elseif ($id == 3)
                    在建工程-建築工程管理-新增
                    @elseif ($id == 4)
                    在建工程-其他管理-新增
                    @endif
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/constructions/store" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $id }}" hidden>
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
                            <label for="title" class="col-2 col-form-label">工程標題</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="owner" class="col-2 col-form-label">業主</label>
                            <div class="col-10">
                                <input class="form-control" id="owner" name="owner" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duration" class="col-2 col-form-label">契約工期</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="duration" name="duration">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="award_date" class="col-2 col-form-label">決標日</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="award_date" name="award_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-2 col-form-label">開工日</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complete_date" class="col-2 col-form-label">預定完工日</label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="complete_date" name="complete_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-2 col-form-label">承攬金額</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="scheduled_progress" class="col-2 col-form-label">預定進度 (%)</label>
                            <div class="col-10">
                                <input type="number" max="100" step="0.01" class="form-control" id="scheduled_progress"
                                    name="scheduled_progress">
                            </div>
                            <div class="col-12">
                                <p class="text-danger">請輸入 0.00 ~ 100.00 的數值</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="actual_progress" class="col-2 col-form-label">實際進度 (%)</label>
                            <div class="col-10">
                                <input type="number" max="100" step="0.01" class="form-control" id="actual_progress"
                                    name="actual_progress">
                            </div>
                            <div class="col-12">
                                <p class="text-danger">請輸入 0.00 ~ 100.00 的數值</p>
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
                                <input id="uploadImg" type="file" data-mywidth="538" data-myheight="415"
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                {{-- <input type="file" class="form-control" id="img" name="img[]"> --}}
                                @error('img.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <p class="text-danger">單多張圖片上傳</p>
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
                                <p class="text-danger">支援多張圖片上傳 *建議圖片解析度(寬 * 高)：1110 x 540</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="youtube" class="col-2 col-form-label">Youtube 影片網址</label>
                            <div class="col-10">
                                <input type="text" max="100" step="0.01" class="form-control" id="youtube"
                                    name="youtube">
                            </div>
                            <div class="col-12">
                                <p class="text-danger">不輸入網址就不會顯示</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="content" class="col-2 col-form-label">工程內容</label>
                            <div class="col-10">
                                <textarea name="content" id="content" cols="" rows="10" style="width: 100%"
                                    required></textarea>
                            </div>
                        </div>
                        <hr>
                        <button id="form_submit" type="submit" class="btn btn-primary d-block mx-auto">新增</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
