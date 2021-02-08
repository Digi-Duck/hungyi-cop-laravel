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
                    CCTV管理
                </h4>
                <div class="card-body">
                    <a class="btn btn-success" href="/admin/cctvs/create">新增CCTV</a>
                    <hr>
                    <table id="table" class="table table-bordered table-striped table-hover responsive-table rwd-table">
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
                                <td data-th="工程名稱">{{$list->title}}</td>
                                <td data-th="CCTV名稱">{{$list->cctv_title}}</td>
                                <td data-th="網址"><a href="{{$list->url}}" target="_block">{{$list->url}}</a></td>
                                <td data-th="指派人員">{{ $list->assign_names }}</td>
                                <td data-th="功能">
                                    <a class="btn btn-sm btn-primary" href="/admin/cctvs/{{$list->id}}">查看</a>
                                    @cannot('personnel')
                                    <a class="btn btn-sm btn-success" href="/admin/cctvs/{{$list->id}}/edit">編輯</a>
                                    <button class="btn btn-sm btn-danger test" data-listid="{{$list->id}}">刪除</button>
                                    @endcannot
                                    <form class="delete-form" action="/admin/cctvs/{{$list->id}}" method="POST"
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