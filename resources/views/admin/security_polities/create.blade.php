@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        職安品質政策管理
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="/admin/security_polities" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="accidents_false" class="col-2 col-form-label">虛驚事故一年低於 (次)</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="accidents_false" name="accidents_false" value="{{ $list->accidents_false }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="deaths" class="col-2 col-form-label">死亡數低於 (次)</label>
                                <div class="col-10">
                                    <input class="form-control" id="deaths" name="deaths" value="{{ $list->deaths }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="accidents_times" class="col-2 col-form-label">重傷事故低於 (次)</label>
                                <div class="col-10">
                                    <input class="form-control" id="accidents_times" name="accidents_times" value="{{ $list->accidents_times }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hospitallized" class="col-2 col-form-label">住院治療低於 (次)</label>
                                <div class="col-10">
                                    <input class="form-control" id="hospitallized" name="hospitallized" value="{{ $list->hospitallized }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="fines_times" class="col-2 col-form-label">罰款最多 (次)</label>
                                <div class="col-10">
                                    <input class="form-control" id="fines_times" name="fines_times" value="{{ $list->fines_times }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fines_million" class="col-2 col-form-label">罰款金額少於 (萬)</label>
                                <div class="col-10">
                                    <input class="form-control" id="fines_million" name="fines_million" value="{{ $list->fines_million }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="accidents_people" class="col-2 col-form-label">輕傷事故低於 (人)</label>
                                <div class="col-10">
                                    <input class="form-control" id="accidents_people" name="accidents_people" value="{{ $list->accidents_people }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="injury" class="col-2 col-form-label">輕傷事故次數低於 (次)</label>
                                <div class="col-10">
                                    <input class="form-control" id="injury" name="injury" value="{{ $list->injury }}" required>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">新增</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            })
        });
        $('.clear_start').click(function () {
            $('#start').val('');
        });
        $('.clear_end').click(function () {
            $('#end').val('');
        });
    </script>
@endsection
