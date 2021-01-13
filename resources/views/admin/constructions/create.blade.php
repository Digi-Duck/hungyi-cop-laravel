@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        @if ($id == 1)
                        土木工程管理-新增
                        @elseif ($id == 2)
                        環保工程管理-新增
                        @elseif ($id == 3)
                        建築工程管理-新增
                        @elseif ($id == 4)
                        其他管理-新增
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
                                <div class="col-12"><p class="text-danger">權重等於排序，數字越大排序越前面。</p></div>
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
                                    <input type="number" max="100" step="0.01" class="form-control" id="scheduled_progress" name="scheduled_progress">
                                </div>
                                <div class="col-12"><p class="text-danger">請輸入 0.00 ~ 100.00 的數值</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="actual_progress" class="col-2 col-form-label">實際進度 (%)</label>
                                <div class="col-10">
                                    <input type="number" max="100" step="0.01" class="form-control" id="actual_progress" name="actual_progress">
                                </div>
                                <div class="col-12"><p class="text-danger">請輸入 0.00 ~ 100.00 的數值</p></div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">封面圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="img" name="img[]">
                                    @error('img.*')
                                        <p class="text-danger error_message">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12"><p class="text-danger">單多張圖片上傳</p></div>
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
                                <label for="url" class="col-2 col-form-label">Youtube 影片網址</label>
                                <div class="col-10">
                                    <input type="text" max="100" step="0.01" class="form-control" id="url" name="url">
                                </div>
                                <div class="col-12"><p class="text-danger">不輸入網址就不會顯示</p></div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">工程內容</label>
                                <div class="col-10">
                                    <textarea name="content" id="content" cols="" rows="10" style="width: 100%" required></textarea>
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
