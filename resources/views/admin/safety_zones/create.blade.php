@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        專區連結管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/safety_zones" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required>
                                </div>
                                <div class="col-12"><p class="text-danger">權重等於排序，數字越小排序越前面。</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">連結名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-2 col-form-label">網址</label>
                                <div class="col-10">
                                    <input class="form-control" id="url" name="url" required>
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
@endsection
