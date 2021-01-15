@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        技術專區畫面-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/technologys" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required>
                                </div>
                                <div class="col-12"><p class="text-danger">權重等於排序，數字越大排序越前面。</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subtitle" class="col-2 col-form-label">小標題</label>
                                <div class="col-10">
                                    <input class="form-control" id="subtitle" name="subtitle" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">內容</label>
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
@endsection
