@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        組織職位管理-編輯
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/association_registers_types/{{$list->id}}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group row">
                                <label for="type" class="col-2 col-form-label">職位名稱 (中)</label>
                                <div class="col-10">
                                <input class="form-control" id="type" name="type" value="{{$list->type}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="en_type" class="col-2 col-form-label">職位名稱 (英)</label>
                                <div class="col-10">
                                    <input class="form-control" id="en_type" name="en_type" value="{{$list->en_type}}" required>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection