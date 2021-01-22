@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        案例宣導管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/safety_cases" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">權重</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required>
                                </div>
                                <div class="col-12"><p class="text-danger">權重等於排序，數字越小排序越前面。</p></div>
                            </div>
                            <div class="form-group row">
                                <label for="attachments" class="col-2 col-form-label">案例檔案</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="attachments" name="attachments[]" required>
                                    @error('attachments.*')
                                        <p class="text-danger error_message">{{$message}}</p>
                                    @enderror
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
