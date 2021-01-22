@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    職安品質政策管理-編輯
                </h4>
                <div class="card-body">
                    <form name="form" method="POST" action="/admin/security_polities/{{$list->id}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">權重</label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sort" name="sort"
                                    value="{{ $list->sort }}" required>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">權重等於排序，數字越大排序越前面。</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blue_text" class="col-2 col-form-label">藍色文字</label>
                            <div class="col-10">
                                <input class="form-control" id="blue_text" name="blue_text"
                                    value="{{ $list->blue_text }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orange_text" class="col-2 col-form-label">橘色文字</label>
                            <div class="col-10">
                                <input class="form-control" id="orange_text" name="orange_text"
                                    value="{{ $list->orange_text }}">
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
<script>
</script>
@endsection
