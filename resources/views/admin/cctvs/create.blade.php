@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        CCTV管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/cctvs" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">工程名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cctv_title" class="col-2 col-form-label">CCTV名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="cctv_title" name="cctv_title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-2 col-form-label">網址</label>
                                <div class="col-10">
                                    <input class="form-control" id="url" name="url" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account" class="col-2 col-form-label">帳號</label>
                                <div class="col-10">
                                    <input class="form-control" id="account" name="account" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-2 col-form-label">密碼</label>
                                <div class="col-10">
                                    <input class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-form-label"><strong>指派人員 </strong></label><br>
                                @foreach ($names as $index=>$item)
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="assign_names[]" id="assign_names{{ $index }}">
                                        <label class="form-check-label" for="assign_names{{ $index }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
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
