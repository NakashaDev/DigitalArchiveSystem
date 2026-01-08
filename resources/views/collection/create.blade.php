@extends('layouts.app')

@section('header-style')
<link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" />
@endsection

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">資料新規登録</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">資料管理</a></li>
                        <li class="breadcrumb-item active">資料新規登録</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-9 col-lg-8">

            <div class="card">
                <div class="card-header bg-primary justify-content-between d-flex align-items-center">
                    <h4 class="card-title text-white">標準項目</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">項目ID</label>
                        <input type="text" class="form-control" id="formrow-firstname-input">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">タイトル</label>
                        <div class="card shadow-none">
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#name-jp" role="tab" aria-selected="true">
                                            <span class="d-sm-block">日本語</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#name-en" role="tab" aria-selected="false">
                                            <span class="d-sm-block">英語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#name-zh" role="tab" aria-selected="false">
                                            <span class="d-sm-block">中国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#name-kr" role="tab" aria-selected="false">
                                            <span class="d-sm-block">韓国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="name-jp" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input" placeholder="タイトルを入力してください。">
                                    </div>
                                    <div class="tab-pane" id="name-en" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input" placeholder="Please input title.">
                                    </div>
                                    <div class="tab-pane" id="name-zh" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input" placeholder="标题">
                                    </div>
                                    <div class="tab-pane" id="name-kr" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input" placeholder="제목">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">メイン画像</label>
                        <div action="#" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick m-0">
                                <div class="mb-3">
                                    <i class="display-2 text-muted mdi mdi-cloud-upload"></i>
                                </div>
                                <h5>ここに画像をドラッグ＆ドロップ<br/>またはクリックで画像選択（一枚のみ）</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header bg-primary justify-content-between d-flex align-items-center">
                    <h4 class="card-title text-white">共通項目</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">説明</label>
                        <div class="card shadow-none">
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#description-jp" role="tab" aria-selected="true">
                                            <span class="d-sm-block">日本語</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#description-en" role="tab" aria-selected="false">
                                            <span class="d-sm-block">英語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#description-zh" role="tab" aria-selected="false">
                                            <span class="d-sm-block">中国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#description-kr" role="tab" aria-selected="false">
                                            <span class="d-sm-block">韓国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="description-jp" role="tabpanel">
                                        <textarea class="form-control" placeholder="説明文を入力してください。" id="gen-info-description-input" rows="3"></textarea>
                                    </div>
                                    <div class="tab-pane" id="description-en" role="tabpanel">
                                        <textarea class="form-control" placeholder="Please input description." id="gen-info-description-input" rows="3"></textarea>
                                    </div>
                                    <div class="tab-pane" id="description-zh" role="tabpanel">
                                        <textarea class="form-control" placeholder="解释" id="gen-info-description-input" rows="3"></textarea>
                                    </div>
                                    <div class="tab-pane" id="description-kr" role="tabpanel">
                                        <textarea class="form-control" placeholder="설명" id="gen-info-description-input" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">日付</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker-basic" placeholder="日付を選択してください。">
                            <div class="input-group-text"><i class="uil uil-calendar-alt"></i></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">単一選択</label>
                        <select class="form-control" data-trigger name="choices-single-default"
                            id="choices-single-default">
                            <option value="">項目名</option>
                            <option value="field-1">共通項目１</option>
                            <option value="field-2">共通項目２</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">複数選択</label>
                        <div class="d-flex align-items-center gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheck1">
                                <label class="form-check-label" for="formCheck1">
                                    選択肢１
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheck2" checked="">
                                <label class="form-check-label" for="formCheck2">
                                    選択肢２
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheck3" checked="">
                                <label class="form-check-label" for="formCheck3">
                                    選択肢３
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheck4">
                                <label class="form-check-label" for="formCheck4">
                                    選択肢４
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header bg-primary justify-content-between d-flex align-items-center">
                    <h4 class="card-title text-white">個別項目</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">単一選択</label>
                        <div class="d-flex align-items-center gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                                <label class="form-check-label" for="formRadios1">
                                    ラジオ１
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                <label class="form-check-label" for="formRadios2">
                                    ラジオ２
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios3">
                                <label class="form-check-label" for="formRadios3">
                                    ラジオ３
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">動画</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">ファイル添付</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">ギャラリー画像</label>
                        <div action="#" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick m-0">
                                <div class="mb-3">
                                    <i class="display-2 text-muted mdi mdi-cloud-upload"></i>
                                </div>
                                <h5>ここに画像をドラッグ＆ドロップ<br/>またはクリックで画像選択（複数枚可）</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-5">
                        <button type="button" class="btn btn-primary"><i class="mdi mdi-content-save"></i> 保存</button>
                        <button type="button" class="btn btn-secondary">キャンセル</button>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

        <div class="col-xxl-3 col-lg-4">
            <div class="card">
                <div class="card-header bg-primary justify-content-between d-flex align-items-center">
                    <h4 class="card-title text-white">分類設定</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <select class="form-control" data-trigger name="choices-single-default"
                            id="choices-single-default">
                            <option value="field-1">歴史</option>
                            <option value="field-2">美術</option>
                            <option value="field-1">民俗</option>
                            <option value="field-2">文学</option>
                            <option value="field-1">考古</option>
                            <option value="field-2">動物</option>
                            <option value="field-1">昆虫</option>
                            <option value="field-2">植物</option>
                            <option value="field-1">地学・古生物</option>
                        </select>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header bg-primary justify-content-between d-flex align-items-center">
                    <h4 class="card-title text-white">登録項目</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input"><i class="uil uil-check me-2"></i>標準項目</label>
                        <ul class="list-unstyled pricing-features mb-0 ms-4">
                            <li><i class="uil uil-check-circle text-success font-size-18 align-middle me-2"></i> 項目ID</li>
                            <li><i class="uil uil-check-circle text-success font-size-18 align-middle me-2"></i> タイトル</li>
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> メイン画像</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input"><i class="uil uil-check me-2"></i>共通項目</label>
                        <ul class="list-unstyled pricing-features mb-0 ms-4">
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> 説明</li>
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> 日付</li>
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> 単一選択</li>
                            <li><i class="uil uil-check-circle text-success font-size-18 align-middle me-2"></i> 複数選択</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input"><i class="uil uil-check me-2"></i>個別項目</label>
                        <ul class="list-unstyled pricing-features mb-0 ms-4">
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> 単一選択</li>
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> 動画</li>
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> ファイル添付</li>
                            <li><i class="uil uil-times-circle text-danger font-size-18 align-middle me-2"></i> ギャラリー画像</li>
                        </ul>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header bg-primary justify-content-between d-flex align-items-center">
                    <h4 class="card-title text-white">公開設定</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">ステータス</label>
                        <select class="form-control" data-trigger name="choices-single-default"
                            id="choices-single-default">
                            <option value="field-1">公開</option>
                            <option value="field-2">非公開</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">公開日</label>
                        <div class="d-flex align-items-center gap-1">
                            <input class="form-control" type="date" value="2019-08-19" id="example-date-input2">@
                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch form-switch-md mb-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                            <label class="form-check-label" for="flexSwitchCheckChecked">非公開日を設定</label>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <input class="form-control" type="date" value="2019-08-19" id="example-date-input2">@
                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <button type="button" class="btn btn-primary w-lg"><i class="mdi mdi-content-save"></i> 保存</button>
                        <button type="button" class="btn btn-secondary w-lg">プレビュー</button>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->
@endsection

@section('footer-script')
<script>
    $(document).ready(function() {
        flatpickr("#datepicker-basic");
    });
</script>
@endsection
