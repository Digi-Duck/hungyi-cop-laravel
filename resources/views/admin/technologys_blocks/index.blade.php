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
                                    <div> {{ $list->title }} <small class="">權重{{ $list->sort }}</small></div>
                                    <div>
                                        <a class="btn btn-sm btn-success" href="/admin/technologys_blocks/{{$list->id}}/edit">編輯區塊</a>
                                        <button class="btn btn-sm btn-danger test" data-type="block" data-listid="{{$list->id}}">刪除區塊</button>
                                        <form class="delete-form" action="/admin/technologys_blocks/{{$list->id}}" method="POST" style="display: none;" data-type="block" data-listid="{{$list->id}}">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </div>
                                </h5>
                                <div class="card-body">
                                    <h3 class="card-title"></h3>
                                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                                    <a class="btn btn-success btn-sm" href="/admin/technologys_details/create/{{ $list->id }}">新增內容</a>
                                    <hr>
                                    <table id="table" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>內容標題</th>
                                            <th>文字說明</th>
                                            <th>圖片</th>
                                            <th width="150">功能</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $detail)
                                        {{-- {{ dd($detail->blocks_id, $list->id) }} --}}
                                            @if ($detail->blocks_id == $list->id)
                                                <tr>
                                                    <td>{{$detail->title}}</td>
                                                    <td>{{$detail->content}}</td>
                                                    <td><img style="width: 250px;" src="{{ asset($detail->imgs) }}" alt=""></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success" href="/admin/technologys_details/{{$detail->id}}/edit">編輯</a>
                                                        <button class="btn btn-sm btn-danger test" data-type="details" data-listid="{{$detail->id}}">刪除</button>
                                                        <form class="delete-form" action="/admin/technologys_details/{{$detail->id}}" method="POST" style="display: none;" data-type="details" data-listid="{{$detail->id}}">
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
                "order": [[0,'desc']],
                scrollCollapse: true,
            });
        } );

        $('.btn-danger').click(function(){
            var listid = $(this).data("listid");
            var type = $(this).data('type');
            console.log(listid, type);
            if (confirm('確定要刪除這筆資料？')){
                event.preventDefault();
                $('.delete-form[data-type="'+ type +'"][data-listid="' + listid + '"]').submit();
            }
        });
    </script>
@endsection

