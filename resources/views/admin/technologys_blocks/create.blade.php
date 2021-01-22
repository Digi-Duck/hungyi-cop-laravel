@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    技術專區-{{ $zone->title }}-區塊新增
                </h4>
                <div class="card-body">
                    <form method="POST" action="/admin/technologys_blocks/store" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="zones_id" value="{{ $zone->id }}" hidden>
                        <div class="form-group row">
                            <label for="sort" class="col-2 col-form-label">權重</label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sort" name="sort" required>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">權重等於排序，數字越小排序越前面。</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">區塊標題</label>
                            <div class="col-10">
                                <input class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="block_color" class="col-2 col-form-label">背板顏色</label>
                            <div class="col-10">
                                <input type="color" class="form-control" id="block_color" name="block_color" value="#5196B2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text_color" class="col-2 col-form-label">文字顏色</label>
                            <div class="col-10">
                                <input type="color" class="form-control" id="text_color" name="text_color" value="#ffffff">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitle" class="col-2 col-form-label">選擇樣式</label>
                            <div class="col-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="style" id="exampleRadios1"
                                        value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        樣式1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="style" id="exampleRadios2"
                                        value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        樣式2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="style" id="exampleRadios3"
                                        value="3">
                                    <label class="form-check-label" for="exampleRadios3">
                                        樣式3
                                    </label>
                                </div>
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
