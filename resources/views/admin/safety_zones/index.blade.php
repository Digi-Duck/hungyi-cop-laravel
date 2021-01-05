@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        專區連結管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/safety_zones/create">新增專區連結</a>
                        <hr>
                        <div class="col-12"><p class="text-danger">只會取前四筆資料，用權重判斷。</p></div>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>權重</th>
                                <th>連結名稱</th>
                                <th>網址</th>
                                {{-- <th>封面</th> --}}
                                <th width="120">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$list->sort}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->url}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="/admin/safety_zones/{{$list->id}}/edit">編輯</a>
                                        <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                        <form class="delete-form" action="/admin/safety_zones/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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

