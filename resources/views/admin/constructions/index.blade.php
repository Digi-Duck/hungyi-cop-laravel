@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        @if ($id == 1)
                        土木工程管理
                        @elseif ($id ==2)
                        環保工程管理
                        @elseif ($id ==3)
                        建築工程管理
                        @elseif ($id ==4)
                        其他管理
                        @endif
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/constructions/create/{{ $id }}">新增在建工程</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>權重</th>
                                <th>實績名稱</th>
                                <th>完成日期</th>
                                <th width="120">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                            @if ($list->type_id == $id)
                            <tr>
                                <td>{{ $list->sort }}</td>
                                <td>{{$list->title}}</td>
                                <td>{{$list->complete_date}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="/admin/constructions/{{$list->id}}/edit">編輯</a>
                                    <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                    <form class="delete-form" action="/admin/constructions/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                            @endif
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

