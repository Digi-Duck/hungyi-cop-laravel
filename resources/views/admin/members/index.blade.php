@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        帳號列表管理
                    </h4>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/members/create">新增帳號</a>
                        <hr>
                        <table id="table" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>權限</th>
                                    <th>姓名</th>
                                    <th>帳號</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $role = ['系統管理員', '行政人員', '一般人員']; ?>
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->role }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="/admin/members/{{ $list->id }}/edit">編輯</a>
                                            <button class="btn btn-sm btn-danger test"
                                                data-listid="{{ $list->id }}">刪除</button>
                                            <form class="delete-form" action="/admin/members/{{ $list->id }}" method="POST"
                                                style="display: none;" data-listid="{{ $list->id }}">
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
                scrollCollapse: true,
            });
        });

        $('.btn-danger').click(function() {

            var listid = $(this).data("listid");
            if (confirm('確定要刪除此最新消息？')) {
                event.preventDefault();
                $('.delete-form[data-listid="' + listid + '"]').submit();
            }
        });

    </script>
@endsection
