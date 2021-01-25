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
                    副Banner管理-{{ $list->page }}編輯
                </h4>
                <div class="card-body">
                    <form name="form" method="POST" action="/admin/sub_banners/{{$list->id}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="page" class="col-2 col-form-label">頁面</label>
                            <div class="col-10">
                                <input class="form-control" id="page" name="page" value="{{ $list->page }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-2 col-form-label">Banner (目前圖片)</label>
                            <div class="col-10">
                                <img style="width: 350px" src="{{ asset($list->img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2 mb-3">
                                <img id="image" src="">
                            </div>
                            <div class="col-md-4">
                                <div id="preview" class="preview"></div>
                            </div>
                            <label for="img" class="col-2 col-form-label">Banner (更新圖片)</label>
                            <div class="col-10">
                                <input id="uploadImg" type="file"
                                @if ($list->page != '首頁')
                                    data-mywidth="1920" data-myheight="480"
                                @elseif ($list->page == '首頁')
                                    data-mywidth="1920" data-myheight="795"
                                @endif
                                    class="form-control image">
                                <input type="text" class="form-control " id="img" name="img" hidden>
                                {{-- <input type="file" class="form-control" id="img" name="img" required> --}}
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
<script src="{{ asset('js/cropper.js') }}"></script>
@endsection
