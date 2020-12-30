@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        職缺單位管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/job_opportunities_units" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="unit" class="col-2 col-form-label">單位名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="unit" name="unit" required>
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
