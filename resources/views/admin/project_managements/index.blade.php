@extends('layouts.app')

@section('css')
<style>
    .rwd-table {
        background: #fff;
        overflow: hidden;
    }

    .rwd-table tr:nth-of-type(2n) {
        background: #eee;
    }

    .rwd-table th,
    .rwd-table td {
        margin: 0.5em 1em;
    }

    .rwd-table {
        min-width: 100%;
    }

    .rwd-table th {
        display: none;
    }

    .rwd-table td {
        display: block;
    }

    .rwd-table td:before {
        content: attr(data-th) " : ";
        font-weight: bold;
        width: 6.5em;
        display: inline-block;
    }

    .rwd-table th,
    .rwd-table td {
        text-align: left;
    }

    .rwd-table th,
    .rwd-table td:before {
        font-weight: bold;
    }

    @media (min-width: 480px) {
        .rwd-table td:before {
            display: none;
        }

        .rwd-table th,
        .rwd-table td {
            display: table-cell;
            padding: 0.25em 0.5em;
        }

        .rwd-table th:first-child,
        .rwd-table td:first-child {
            padding-left: 0;
        }

        .rwd-table th:last-child,
        .rwd-table td:last-child {
            padding-right: 0;
        }

        .rwd-table th,
        .rwd-table td {
            padding: 1em !important;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">
                    專案管理
                </h4>
                <div class="card-body">
                    <a class="btn btn-success" href="/admin/project_managements/create">新增工程</a>
                    <hr>
                    <table id="table" class="table table-bordered table-striped table-hover responsive-table rwd-table">
                        <thead>
                            <tr>
                                <th>工程名稱</th>
                                <th>標</th>
                                <th>開工日期</th>
                                <th>新增者</th>
                                <th>備註</th>
                                <th width="250">工程圖片</th>
                                {{-- <th>封面</th> --}}
                                <th width="150">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                            <tr>
                                <td data-th="工程名稱">{{$list->name}}</td>
                                <td data-th="標">{{$list->target}}</td>
                                <td data-th="開工日期">{{ date('Y:m:d', strtotime($list->start_date)) }}</td>
                                <td data-th="新增者">{{ $list->creator }}</td>
                                <td data-th="備註">{{ $list->remark }}</td>
                                <td data-th="工程圖片"><img style="width: 100%" src="{{ $list->img }}" alt=""></td>
                                <td data-th="功能">
                                    <a class="btn btn-sm btn-primary" href="/admin/project_managements/{{$list->id}}">查看</a>
                                    @cannot('personnel')
                                    <a class="btn btn-sm btn-success" href="/admin/project_managements/{{$list->id}}/edit">編輯</a>
                                    <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                    @endcannot
                                    <form class="delete-form" action="/admin/project_managements/{{$list->id}}" method="POST"
                                        style="display: none;" data-listid="{{$list->id}}">
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
                responsive: true,
                "order": [[0,'asc']],
                scrollCollapse: true
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
