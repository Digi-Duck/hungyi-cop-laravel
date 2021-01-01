@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        聯絡我們管理
                    </h4>
                    <div class="card-body">
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>信箱</th>
                                <th>電話</th>
                                <th>留言</th>
                                <th width="120">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->name }}</td>
                                    <td>{{$list->email}}</td>
                                    <td>{{$list->phone}}</td>
                                    <td>{{ $list->content }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="/admin/contactus/{{$list->id}}/edit">查看</a>
                                        <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                        <form class="delete-form" action="/admin/contactus/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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

