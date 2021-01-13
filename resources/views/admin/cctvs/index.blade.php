@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        CCTV管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/cctvs/create">新增CCTV</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>工程名稱</th>
                                    <th>CCTV名稱</th>
                                    <th>網址</th>
                                    <th>指派人員</th>
                                    {{-- <th>封面</th> --}}
                                    <th width="150">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->title}}</td>
                                    <td>{{$list->cctv_title}}</td>
                                    <td>{{$list->url}}</td>
                                    <td>{{ $list->assign_names }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="/admin/cctvs/{{$list->id}}">查看</a>
                                        @cannot('personnel')
                                            <a class="btn btn-sm btn-success" href="/admin/cctvs/{{$list->id}}/edit">編輯</a>
                                            <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                        @endcannot
                                        <form class="delete-form" action="/admin/cctvs/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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

