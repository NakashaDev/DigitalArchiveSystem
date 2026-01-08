@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">資料検索</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">資料管理</a></li>
                        <li class="breadcrumb-item active">資料検索</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="d-xl-flex">
        <div class="w-100">
            <form method="POST" autocomplete="off" action="{{ route('collection.list') }}">
            @csrf
            <div class="d-md-flex">
                <div class="card filemanager-sidebar me-md-3">
                    <div class="card-header d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title"><i class="mdi mdi-chevron-right text-primary me-1"></i>検索対象分類</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="condition-genre-check-all" checked>
                                    <label class="form-check-label" for="condition-genre-check-all">
                                        すべて
                                    </label>
                                </div>
                                @foreach($genres as $genre)
                                <div class="form-check condition-genre-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="condition-genre-{{$genre->genre_code}}" name="condition-genre[]" value="{{$genre->genre_code}}" checked>
                                    <label class="form-check-label" for="condition-genre-{{$genre->genre_code}}">
                                        {{$genre->genre_name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- end cardbody-->
                </div><!-- end card -->
                <!-- filemanager-leftsidebar -->

                <div class="w-100">

                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title"><i class="mdi mdi-chevron-right text-primary me-1"></i>キーワード検索</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-sm-6 mb-3">
                                    <div class="search-box">
                                        <div class="position-relative">
                                            <input type="text" class="form-control bg-light border-light rounded" id="keyword" name="keyword" placeholder="キーワードを入力後、ENTERで検索できます。">
                                            <i class="uil uil-search search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 d-flex align-items-center">
                                    <div class="d-flex flex-wrap gap-3 mb-3 ms-1 align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="keyword-operator" id="keyword-operator-and" value="and" checked>
                                            <label class="form-check-label" for="keyword-operator-and">
                                                AND
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="keyword-operator" id="keyword-operator-or" value="or">
                                            <label class="form-check-label" for="keyword-operator-or">
                                                OR
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end cardbody-->
                    </div><!-- end card -->

                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title"><i class="mdi mdi-chevron-right text-primary me-1"></i>詳細検索</h5>
                        </div>
                        <div class="card-body">
                            <div id="condition-list">
                                <div id="condition-detail-0">
                                    <input type="hidden" name="condition-index[]" value="0">
                                    <div class="row">
                                        <div class="col-md-6 d-flex gap-2">
                                            <div class="col-md-4 mb-3">
                                                <select class="form-control" data-trigger id="condition-field-0" name="condition-field-0[]">
                                                    <option value="">項目名</option>
                                                    <option value="field-1">共通項目１</option>
                                                    <option value="field-2">共通項目２</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <input class="form-control" type="text" id="condition-value-0" name="condition-value-0[]" value="" placeholder="キーワード">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3 d-flex gap-2">
                                                <select class="form-control" data-trigger id="condition-compare-0" name="condition-compare-0[]">
                                                    <option value="EQU" selected>と等しい</option>
                                                    <option value="NEQ">と異なる</option>
                                                    <option value="LSS">未満</option>
                                                    <option value="LEQ">以下</option>
                                                    <option value="GTR">超過</option>
                                                    <option value="GEQ">以上</option>
                                                    <option value="LKE">を含む</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <button type="button" class="btn btn-outline-secondary" id="btn-add-condition"><i class="uil uil-plus"></i></button>
                                </div>
                            </div>
                            <!-- end row -->

                        </div><!-- end cardbody-->
                    </div><!-- end card -->

                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title text-muted">＊この画面で入力されたすべての内容は検索条件になります</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex flex-wrap gap-4">
                                    <button type="submit" class="btn btn-primary w-lg" id="btn-search">検索</button>
                                    <button type="reset" class="btn btn-outline-secondary w-lg">リセット</button>
                                </div>
                            </div>
                            <!-- end row
                        </div><!-- end cardbody-->
                    </div><!-- end card -->

                </div>
            </div>
            </form>
        </div>

        <!-- end card -->
    </div>

</div> <!-- container-fluid -->
@endsection

@section('footer-script')
<script>
    var condition_index = 1;
    function getTemplate(index) {
        let template = `
            <div id="condition-detail-${index}">
                <input type="hidden" name="condition-index[]" value="${index}">
                <div class="row">
                    <div class="col-md-12 d-flex gap-3 mb-3 ms-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="condition-operator-and-${index}" name="condition-operator-${index}[]" value="and" checked>
                            <label class="form-check-label" for="condition-operator-and-${index}">
                                AND
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="condition-operator-or-${index}" name="condition-operator-${index}[]" value="or">
                            <label class="form-check-label" for="condition-operator-or-${index}">
                                OR
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex gap-2">
                        <div class="col-md-4 mb-3">
                            <select class="form-control" data-trigger id="condition-field-${index}" name="condition-field-${index}[]">
                                <option value="">項目名</option>
                                <option value="field-1">共通項目１</option>
                                <option value="field-2">共通項目２</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <input class="form-control" type="text" id="condition-value-${index}" name="condition-value-${index}[]" value="" placeholder="キーワード">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3 d-flex gap-2">
                            <select class="form-control" data-trigger id="condition-compare-${index}" name="condition-compare-${index}[]">
                                <option value="EQU" selected>と等しい</option>
                                <option value="NEQ">と異なる</option>
                                <option value="LSS">未満</option>
                                <option value="LEQ">以下</option>
                                <option value="GTR">超過</option>
                                <option value="GEQ">以上</option>
                                <option value="LKE">を含む</option>
                            </select>
                            <button type="button" class="btn btn-outline-danger" id="btn-remove-condition-${index}" condition-index="${index}"><i class="uil uil-times"></i></button>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        `;
        return template;
    }

    $(document).ready(function() {

        $("#condition-genre-check-all").on("click", function(event){
            var checkboxes = document.querySelectorAll('.condition-genre-check input[type="checkbox"]');
            for (var i=0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });

        // 検索条件追加（+）のボタンを押す場合
        $("#btn-add-condition").on("click", function(event){
            // 検索条件のパターンを追加
            $("#condition-list").append(getTemplate(condition_index));

            // 項目名のドロップダウンコントロールのUI更新
            new Choices("#condition-field-"+condition_index, {
                    searchEnabled: false,
                    shouldSort: false,
                    placeholderValue: "",
                    searchPlaceholderValue: "",
            });

            // 比較式のドロップダウンコントロールのUI更新
            new Choices("#condition-compare-"+condition_index, {
                    searchEnabled: false,
                    shouldSort: false,
                    placeholderValue: "",
                    searchPlaceholderValue: "",
            });

            // 条件削除（×）のボタンを押す場合のイベントリスナーを追加
            $("#btn-remove-condition-"+condition_index).on("click", function(event){
                let index = $(this).attr("condition-index");
                $("#condition-detail-"+index).remove();
            });

            condition_index++;
        });

        $("#btn-search").on("click", function(event){
            //event.preventDefault();
        });
    });
</script>
@endsection
