@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    職安品質政策管理
                </h4>
                <div class="card-body">
                    <a class="btn btn-success" href="/admin/security_polities/create">新增職業安全衛生目標</a>
                    <hr>
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>權重</th>
                                <th>藍色文字</th>
                                <th>橘色文字</th>
                                <th width="120">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                            <tr>
                                <td>{{ $list->sort }}</td>
                                <td>{{ $list->blue_text }}</td>
                                <td>{{$list->orange_text}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                        href="/admin/security_polities/{{$list->id}}/edit">編輯</a>
                                    <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                    <form class="delete-form" action="/admin/security_polities/{{$list->id}}"
                                        method="POST" style="display: none;" data-listid="{{$list->id}}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
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
        $('#table').DataTable({
            "order": [[0,'asc']],
            scrollCollapse: true,
        });
    });

    $('.btn-danger').click(function(){

    var listid = $(this).data("listid");
        if (confirm('確定要刪除這筆資料？')){
            event.preventDefault();
            $('.delete-form[data-listid="' + listid + '"]').submit();
        }
    });
</script>
@endsection
