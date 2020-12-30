@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        職缺名稱管理-新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/job_opportunities" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="unit_id" class="col-2 col-form-label">職缺單位</label>
                                <div class="col-10">
                                    <select class="form-control" name="unit_id" id="unit_id" required>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="position" class="col-2 col-form-label">職缺名稱</label>
                                <div class="col-10">
                                    <input class="form-control" id="position" name="position" required>
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
