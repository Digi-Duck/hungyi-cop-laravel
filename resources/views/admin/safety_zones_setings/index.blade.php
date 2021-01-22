@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        特殊專區設定管理
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/safety_zones_setings/{{ $list->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group row">
                                <label for="switch" class="col-2 form-check-label">是否顯示</label>
                                <div class="col-10">
                                    <input class="form-check-input" type="checkbox" name="switch" id="switch" {{ $list->switch ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">專區名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" value="{{ $list->title }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-2 col-form-label">連結網址</label>
                                <div class="col-10">
                                    <input class="form-control" id="url" name="url" value="{{ $list->url }}" required>
                                </div>
                            </div>
                            <hr>
                            <button id="form_submit" type="submit" class="btn btn-primary d-block mx-auto">修改</button>
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
            $('#table').DataTable({
                "order": [[0,'asc']],
                scrollCollapse: true,
            });
        } );
    </script>
@endsection

