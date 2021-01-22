@extends('layouts.app')

@section('css')
@endsection

@section('content')
@if(Session::has('message'))
@endif
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    副Banner管理
                </h4>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>頁面</th>
                                <th>圖片</th>
                                <th width="120">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                            <tr>
                                <td>{{$list->page}}</td>
                                <td><img style="width: 250px" src="{{ asset($list->img) }}" alt=""></td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                        href="/admin/sub_banners/{{$list->id}}/edit">編輯</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
            $('#table').DataTable(
                {
                    "paging":   false,
                    "ordering": false,
                    "info":     false
                }
            );
        } );
</script>
@endsection
