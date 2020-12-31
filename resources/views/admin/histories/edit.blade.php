@extends('layouts.app')

@section('css')
<style>
    .imgs_area{
        position: relative;
    }
    .imgs_area img{
        border: 1px solid #000;
    }
    .del_btn{
        position:absolute;
        top: 0;
        right:0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        transform: translate(50%,-50%);
        font-size: 25px;
        line-height: 30px;
        text-align: center;
        z-index: 20;
        cursor: pointer;
    }
    .fa-file{
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
                    得獎事蹟管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/histories/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="year" class="col-2 col-form-label">年份</label>
                            <div class="col-10">
                                <input class="form-control" id="year" name="year" value="{{ $list->year }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event" class="col-2 col-form-label">事件名稱</label>
                            <div class="col-10">
                                <input class="form-control" id="event" name="event" value="{{ $list->event }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="img" class="col-2 col-form-label">內容圖片(目前圖片)</label>
                            <div class="col-10 row">
                                <div class="imgs_area mx-2 mb-2">
                                    <img src="{{$list->img}}" alt="" width="200">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-2 col-form-label">內容圖片(更新圖片)</label>
                            <div class="col-10">
                                <input type="file" class="form-control" id="img" name="img[]" multiple>
                                @error('img.*')
                                    <p class="text-danger error_message">{{ $message}}</p>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="capital" class="col-2 col-form-label">事件描述 1</label>
                            <div class="col-10">
                                <input class="form-control" id="capital" name="capital" value="{{ $list->capital }}" required>
                            </div>
                            <div class="col-12"><p class="text-danger">建議 12 個字以內</p></div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-2 col-form-label">事件描述 2</label>
                            <div class="col-10">
                                <input class="form-control" id="address" name="address" value="{{ $list->address }}" required>
                            </div>
                            <div class="col-12"><p class="text-danger">建議 12 個字以內</p></div>
                        </div>
                        <div class="form-group row">
                            <label for="engineering" class="col-2 col-form-label">事件描述 3</label>
                            <div class="col-10">
                                <input class="form-control" id="engineering" name="engineering" value="{{ $list->engineering }}" required>
                            </div>
                            <div class="col-12"><p class="text-danger">建議 24 個字以內</p></div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary d-block mx-auto">更新</button>
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
        $('.del_btn').click(function () {
            var type = $(this).attr("data-type");
            if(type == "img")
                var yes = confirm('你確定刪除這張圖片嗎？');
            else
                var yes = confirm('你確定刪除這個附件嗎？');

            if (yes) {
                var id = $(this).attr("data-id");
                axios.post('/admin/news/delNewsFile', { id: id,type: type })
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
@endsection
