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
                    技術專區-{{ $block->title }}-內容新增
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/technologys_details/store" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="zones_id" value="{{ $zone->id }}" hidden>
                        <input type="text" name="blocks_id" value="{{ $block->id }}" hidden>
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">權重</label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sort" name="sort" required>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">權重等於排序，數字越小排序越前面。</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">標題</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" required>
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
                            <label for="img" class="col-2 col-form-label">圖片</label>
                            <div class="col-10">
                                <input id="uploadImg" type="file" data-mywidth="1363" data-myheight="768"
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                {{-- <input type="file" class="form-control" id="img" name="img[]"> --}}
                                @error('img.*')
                                <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-2 col-form-label">內容</label>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
