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
                        <form method="POST" action="/admin/award_stories" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input class="form-control" id="sort" name="sort" required>
                                </div>
                                <div class="col-12"><p class="text-danger">權重等於排序，數字越大排序越前面。</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="award_date" class="col-2 col-form-label">得獎日期</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="award_date" name="award_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">內容圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="img" name="img[]" required>
                                    @error('img.*')
                                        <p class="text-danger error_message">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12"><p class="text-danger">單張圖片上傳</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">得獎標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">得獎內容</label>
                                <div class="col-10">
                                    <textarea style="width: 100%" name="content" id="content" cols="" rows="10" required></textarea>
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
