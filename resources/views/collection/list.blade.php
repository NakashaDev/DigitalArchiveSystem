@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">資料検索結果</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">資料管理</a></li>
                        <li class="breadcrumb-item"><a href="collection-search.html">資料検索</a></li>
                        <li class="breadcrumb-item active">検索結果</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-2 mb-3">
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary view-mode" id="btn-select-mode">選択</button>
                                <button type="button" class="btn btn-secondary select-mode" id="btn-view-mode" style="display: none;">キャンセル</button>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-light text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    言語 ▼
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">日本語</a></li>
                                    <li><a class="dropdown-item" href="#">英語</a></li>
                                    <li><a class="dropdown-item" href="#">中国語</a></li>
                                    <li><a class="dropdown-item" href="#">韓国語</a></li>
                                </ul>
                            </div><!-- end dropdown -->
                        </div>
                    </div><!-- end row -->

                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center bg-body">
                            <div class="d-flex flex-wrap align-items-start justify-content-md-start">
                                <div class="form-check select-mode font-size-16" style="display: none;">
                                    <input type="checkbox" class="form-check-input" id="collection-check-all">
                                    <label class="form-check-label" for="collection-check-all">全選択</label>
                                </div>
                                <h4 class="card-title view-mode">検索結果 <span class="text-muted font-size-13 fw-normal ms-2">(50件がヒットしました)</span></h4>
                            </div>
                            <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-4">
                                <select class="form-control w-lg" data-trigger name="choices-single-groups"
                                    id="choices-single-groups">
                                    <option value="1">更新順</option>
                                    <option value="2">登録順</option>
                                </select>
                                <div>
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" id="btn-list-mode" data-bs-toggle="tooltip" data-bs-placement="top" title="リスト表示"><i class="uil uil-list-ul"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="btn-grid-mode" data-bs-toggle="tooltip" data-bs-placement="top" title="タイル表示"><i class="uil uil-apps"></i></a>
                                        </li>
                                    </ul><!-- end ul -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row grid-mode" style="display: none;">
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-success mb-1" style="line-height: 80%">●</label> 公開中</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-danger mb-1" style="line-height: 80%">●</label> 非公開</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-success mb-1" style="line-height: 80%">●</label> 公開中</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-success mb-1" style="line-height: 80%">●</label> 公開中</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-danger mb-1" style="line-height: 80%">●</label> 非公開</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-success mb-1" style="line-height: 80%">●</label> 公開中</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center ">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-danger mb-1" style="line-height: 80%">●</label> 非公開</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-2 col-sm-2">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="align-items-center">
                                                <div class="card-img-overlay font-size-16 collection-check select-mode" style="display: none;">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                </div>
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </div>
                                            <div class="align-items-center">
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1 text-truncate"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-success mb-1" style="line-height: 80%">●</label> 公開中</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <div class="table-responsive list-mode">
                                <table class="table align-middle table-nowrap table-check">
                                    <tbody>
                                        <tr>
                                            <th class="select-mode p-0" style="width: 20px; display: none;" scope="row">
                                                <div class="form-check font-size-16 collection-check">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                    <label class="form-check-label" for="contacusercheck1"></label>
                                                </div>
                                            </th>
                                            <td style="width: 120px;">
                                                <img src="{{asset('assets/images/data01.png')}}" alt="" class="w-100">
                                            </td>
                                            <td>
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-success mb-1" style="line-height: 80%">●</label> 公開中</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </td>
                                            <td style="width: 150px;">
                                                <div class="d-flex justify-content-center align-items-center gap-4">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="編集"><i class="mdi mdi-18px mdi-file-edit-outline"></i></button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" title="削除"><i class="mdi mdi-18px mdi-trash-can-outline"></i></button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="複製"><i class="mdi mdi-18px mdi-content-copy"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="select-mode p-0" style="width: 20px; display: none;" scope="row">
                                                <div class="form-check font-size-16 collection-check">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                    <label class="form-check-label" for="contacusercheck1"></label>
                                                </div>
                                            </th>
                                            <td>
                                                <img src="{{asset('assets/images/data01.png')}}" class="w-100" alt="">
                                            </td>
                                            <td>
                                                <p class="m-0 badge badge-soft-primary px-2">美術</p>
                                                <h5 class="mb-0 py-1"><strong>草間彌生《かぼちゃ》</strong></h5>
                                                <div class="d-flex align-items-center gap-1"><label class="font-size-24 text-danger mb-1" style="line-height: 80%">●</label> 非公開</div>
                                                <p class="text-muted mb-0">E7896789-1</p>
                                            </td>
                                            <td style="width: 150px;">
                                                <div class="d-flex justify-content-center align-items-center gap-4">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="編集"><i class="mdi mdi-18px mdi-file-edit-outline"></i></button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" title="削除"><i class="mdi mdi-18px mdi-trash-can-outline"></i></button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="複製"><i class="mdi mdi-18px mdi-content-copy"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->

                            <div class="row">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <div class="col-md-3 d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-outline-danger select-mode" style="display: none;">削除</button>
                                        <button type="button" class="btn btn-outline-primary select-mode" style="display: none;">公開</button>
                                        <button type="button" class="btn btn-outline-primary select-mode" style="display: none;">非公開</button>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center justify-content-end gap-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <select class="form-control" data-trigger>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            <label for="choices-single-no-search" class="form-label font-size-13 text-muted mb-0">件/ページ</label>
                                        </div>
                                        <ul class="pagination pagination-rounded justify-content-center justify-content-sm-end mb-sm-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">…</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">50</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">51</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">52</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">53</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">54</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">…</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">90</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                        <div class="d-flex align-items-center gap-1">
                                            <input class="form-control mx-1" id="to-page" style="width: 70px" type="number" min="1" max="90" value="">
                                            <span class="d-inline-block text-nowrap">に移動</span>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                            </div><!-- end row -->

                        </div>
                    </div>

                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->
@endsection

@section('footer-script')
<script>

    // 表示方式を切り替える。
    function changeView(mode) {
        if (mode == "list") {
            $(".list-mode").show();
            $(".grid-mode").hide();
            $("#btn-list-mode").addClass('active');
            $("#btn-grid-mode").removeClass('active');
        }
        else {
            $(".list-mode").hide();
            $(".grid-mode").show();
            $("#btn-list-mode").removeClass('active');
            $("#btn-grid-mode").addClass('active');
        }
    }

    // 選択方式を切り替える。
    function toggleSelect(mode) {
        if (mode == "view") {
            $(".view-mode").show();
            $(".select-mode").hide();
        }
        else {
            $(".view-mode").hide();
            $(".select-mode").show();
        }
    }

    $(document).ready(function() {

        // 初期は、リスト・ビュー方式で表示する。
        changeView('list');
        toggleSelect('view');

        $("#collection-check-all").on("click", function(event){
            var checkboxes = document.querySelectorAll('.collection-check input[type="checkbox"]');
            for (var i=0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });

        // 選択方式のボタンを押す場合
        $("#btn-select-mode").on("click", function(event){
            toggleSelect('select');
        });

        // 選択キャンセルのボタンを押す場合
        $("#btn-view-mode").on("click", function(event){
            toggleSelect('view');
        });

        // リスト表示のボタンを押す場合
        $("#btn-list-mode").on("click", function(event){
            changeView('list');
        });

        // タイル表示のボタンを押す場合
        $("#btn-grid-mode").on("click", function(event){
            changeView('grid');
        });
    });
</script>
@endsection
