@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        職安品質政策管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/security_polities" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="blue_text" class="col-2 col-form-label">藍色文字</label>
                                <div class="col-10">
                                    <input class="form-control" id="blue_text" name="blue_text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="orange_text" class="col-2 col-form-label">橘色文字</label>
                                <div class="col-10">
                                    <input class="form-control" id="orange_text" name="orange_text"  required>
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
@endsection
