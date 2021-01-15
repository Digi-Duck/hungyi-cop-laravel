@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        {{ $block->title }}-內容新增
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/technologys_details/store" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="zones_id" value="{{ $zone->id }}" hidden>
                            <input type="text" name="blocks_id" value="{{ $block->id }}" hidden>
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
                                    <input type="number" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" id="img" name="img[]">
                                    @error('img.*')
                                        <p class="text-danger error_message">{{ $message}}</p>
                                    @enderror
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
