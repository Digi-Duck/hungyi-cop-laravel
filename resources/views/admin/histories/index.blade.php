@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        公司沿革管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/histories/create">新增沿革</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>年份</th>
                                <th>事件名稱</th>
                                <th width="120">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->year }}</td>
                                    <td>{{$list->event}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="/admin/histories/{{$list->id}}/edit">編輯</a>
                                        <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                        <form class="delete-form" action="/admin/histories/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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
                "order": [[0,'desc']],
                scrollCollapse: true,
            });
        } );

        $('.btn-danger').click(function(){

            var listid = $(this).data("listid");
            if (confirm('確定要刪除這筆資料？')){
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection

