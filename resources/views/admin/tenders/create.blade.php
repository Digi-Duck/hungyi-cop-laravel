@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        得獎事蹟管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/tenders" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input class="form-control" type="number" id="sort" name="sort" required>
                                </div>
                                <div class="col-12"><p class="text-danger">權重等於排序，數字越大排序越前面。</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="tender_date" class="col-2 col-form-label">得標日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="tender_date" name="tender_date">
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
                                <div class="col-12"><p class="text-danger">支援多張圖片上傳</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">得標標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">得標內容</label>
                                <div class="col-10">
                                    <textarea class="summernote" name="content" id="content" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">新增</button>
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
@endsection
