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
                        專案管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/project_managements" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="creator" id="" value="{{ Auth::user()->name }}" hidden>
                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">工程名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="target" class="col-2 col-form-label">標</label>
                                <div class="col-10">
                                    <input class="form-control" id="target" name="target" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="approved_date" class="col-2 col-form-label">核定日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="approved_date" name="approved_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_date" class="col-2 col-form-label">開工日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="finished_date" class="col-2 col-form-label">完工日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="finished_date" name="finished_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="director" class="col-2 col-form-label">工地主任</label>
                                <div class="col-10">
                                    <input class="form-control" id="director" name="director" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="remark" class="col-2 col-form-label">備註</label>
                                <div class="col-10">
                                    <input class="form-control" id="remark" name="remark" required>
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
                                <label for="img" class="col-2 col-form-label">工程照片</label>
                                <div class="col-10">
                                    <input id="uploadImg" type="file" data-mywidth="1024" data-myheight="768"
                                        class="form-control image">
                                    <input type="text" class="form-control " id="img" name="img" hidden>
                                    {{-- <input type="file" class="form-control" id="img" name="img[]"> --}}
                                    @error('img.*')
                                    <p class="text-danger error_message">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <p class="text-danger">單張圖片裁減上傳</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-form-label"><strong>專案權限設定 </strong></label><br>
                                @foreach ($names as $index=>$item)
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="assign_names[]" id="assign_names{{ $index }}">
                                        <label class="form-check-label" for="assign_names{{ $index }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
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
