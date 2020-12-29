@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($seoes as $seo)
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        SEO設定
                    </h4>
                    <div class="card-body">
                        <form action="/admin/seo/{{$seo->id}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title(中)</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$seo->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="keyword" class="col-form-label">Keyword</label>
                                <textarea class="form-control" style="height:200px;" id="keyword" name="keyword" required>{{$seo->keyword}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control" style="height:200px;" id="description" name="description" required>{{$seo->description}}</textarea>
                            </div>
                            <hr>
                            <div class="offset-5 col-2 text-center">
                                <button class="btn btn-success btn-sm">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
@endsection

