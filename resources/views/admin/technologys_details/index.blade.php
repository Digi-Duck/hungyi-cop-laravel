@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        {{ $zone->title }}-區塊管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/technologys_blocks/create/{{ $zone->id }}">新增區塊畫面</a>
                        <hr>
                        <div class="list-group">
                            @foreach ($lists as $index=>$list)
                            <div class="card mb-1">
                                <h5 class="card-header d-flex justify-content-between align-items-center">
                                    區塊{{ $index+1 }}
                                    <div>
                                        <a class="btn btn-sm btn-success" href="/admin/technologys_blocks/{{$list->id}}/edit">編輯區塊</a>
                                        <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除區塊</button>
                                        <form class="delete-form" action="/admin/technologys_blocks/{{$list->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </div>
                                </h5>
                                <div class="card-body">
                                    <h3 class="card-title">{{ $list->title }}</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <hr>
                                    <a class="btn btn-success btn-sm mb-3" href="/admin/technologys_details/create/{{ $list->id }}">新增內容</a>
                                    <table id="table" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>內容名稱</th>
                                            <th>文字說明</th>
                                            <th>圖片</th>
                                            {{-- <th>封面</th> --}}
                                            <th width="150">功能</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $detail)
                                            <tr>
                                                <td>{{$detail->title}}</td>
                                                <td>{{$detail->content}}</td>
                                                <td>{{ $detail->imgs }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="/admin/technologys_details/{{$detail->id}}/edit">進入</a>
                                                    <a class="btn btn-sm btn-success" href="/admin/technologys_details/{{$detail->id}}/edit">編輯</a>
                                                    <button class="btn btn-sm btn-danger test" data-listid="{{$detail->id}}">刪除</button>
                                                    <form class="delete-form" action="/admin/technologys_details/{{$detail->id}}" method="POST" style="display: none;" data-listid="{{$list->id}}">
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "order": [[0,'asc']],
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

