@extends('layouts.app')

@section('css')
<style>
    .imgs_area{
        position: relative;
    }
    .imgs_area img{
        border: 1px solid #000;
    }
    .del_btn{
        position:absolute;
        top: 0;
        right:0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        transform: translate(50%,-50%);
        font-size: 25px;
        line-height: 30px;
        text-align: center;
        z-index: 20;
        cursor: pointer;
    }
    .fa-file{
        font-size: 48px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    職缺名稱管理-編輯
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/job_opportunities/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="unit_id" class="col-2 col-form-label">職缺單位</label>
                            <div class="col-10">
                                <select class="form-control" name="unit_id" id="unit_id" required>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" @if ($list->unit_id == $unit->id) selected @endif>{{$unit->unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-2 col-form-label">職缺名稱</label>
                            <div class="col-10">
                                <input class="form-control" id="position" name="position" value="{{ $list->position }}" required>
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
@endsection
