@extends('layouts.app')

@section('header-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" />
@endsection

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">項目設定（新規）</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">マスター管理</a></li>
                        <li class="breadcrumb-item"><a href="{{route('items.index')}}">項目設定</a></li>
                        <li class="breadcrumb-item active">新規作成</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <form id="form-items-create" method="POST" action="{{route('items.store')}}">
                @csrf
                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">項目ID</h4>
                    </div>
                    <div class="card-body text-end">
                        <span class="text-muted">2/100</span>
                        <input class="form-control" type="text" value="15" id="example-text-input">
                        <div class="justify-content-between d-flex align-items-center">
                            <div class="text-danger text-start pt-1">
                            </div>
                            <span class="text-muted pt-1">英数字入力可能、最大100文字</span>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">形式</h4>
                    </div>
                    <div class="card-body col-md-3" style="min-width: 250px;">
                        <select class="form-control" name="choices-input-type"
                            id="choices-input-type">
                            <option value="input">自由入力（一行）</option>
                            <option value="textarea">自由入力（複数行）</option>
                            <option value="date">日付</option>
                            <option value="radio">単一選択</option>
                            <option value="check">複数選択</option>
                            <option value="image">画像</option>
                            <option value="media">動画</option>
                            <option value="file">ファイル添付</option>
                        </select>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">項目名</h4>
                    </div>
                    <div class="card-body">
                        <div class="card shadow-none">
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    @foreach(\App\Enums\LangCode::asArray() as $key=>$value)
                                        <li class="nav-item">
                                            <a class="nav-link {{$value == 1 ? 'active' : ''}}" data-bs-toggle="tab" href="#name-{{$value}}" role="tab" aria-selected="true">
                                                <span class="d-sm-block">{{\App\Enums\LangCode::getDescription($value)}}</span>
                                                <span class="lang-dot bg-danger"></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    @foreach(\App\Enums\LangCode::asArray() as $key=>$value)
                                        <div class="tab-pane {{$value == 1 ? 'active' : ''}}" id="name-{{$value}}" role="tabpanel">
                                            <input class="form-control @error('name_' . $value) is-invalid @enderror" type="text" value="{{old('name_' . $value)}}" name="name_{{$value}}">
                                            @error('name_' . $value)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card" id="choice-has-lang">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">多言語項目</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch form-switch-md mb-2">
                            <input class="form-check-input" type="checkbox" id="multi-language-flag" checked="">
                            <label class="form-check-label" for="multi-language-flag"></label>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card" id="choice-with-lang" style="display: none;">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">選択肢</h4>
                    </div>
                    <div class="card-body">
                        <div class="card shadow-none">
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#choise1-jp" role="tab" aria-selected="true">
                                            <span class="d-sm-block">日本語</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#choise1-en" role="tab" aria-selected="false">
                                            <span class="d-sm-block">英語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#choise1-zh" role="tab" aria-selected="false">
                                            <span class="d-sm-block">中国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#choise1-kr" role="tab" aria-selected="false">
                                            <span class="d-sm-block">韓国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active d-flex gap-2" id="choise1-jp" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                        <button type="button" class="btn btn-outline-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
                                    </div>
                                    <div class="tab-pane" id="choise1-en" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                    <div class="tab-pane" id="choise1-zh" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                    <div class="tab-pane" id="choise1-kr" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-none">
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#choise2-jp" role="tab" aria-selected="true">
                                            <span class="d-sm-block">日本語</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#choise2-en" role="tab" aria-selected="false">
                                            <span class="d-sm-block">英語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#choise2-zh" role="tab" aria-selected="false">
                                            <span class="d-sm-block">中国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex nav-link" data-bs-toggle="tab" href="#choise2-kr" role="tab" aria-selected="false">
                                            <span class="d-sm-block">韓国語</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active d-flex gap-2" id="choise2-jp" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                        <button type="button" class="btn btn-outline-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
                                    </div>
                                    <div class="tab-pane" id="choise2-en" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                    <div class="tab-pane" id="choise2-zh" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                    <div class="tab-pane" id="choise2-kr" role="tabpanel">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-danger text-start">
                            <button type="button" class="btn btn-outline-secondary"><i class="uil uil-plus"></i></button>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card" id="choice-without-lang" style="display: none;">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">選択肢</h4>
                    </div>
                    <div class="card-body">
                        <div class="card shadow-none">
                            <div class="card-body p-3">
                                <div class="d-flex gap-2" id="choise2-jp">
                                    <input class="form-control" type="text" value="" id="example-text-input">
                                    <button type="button" class="btn btn-outline-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-none">
                            <div class="card-body p-3">
                                <div class="d-flex gap-2" id="choise2-jp">
                                    <input class="form-control" type="text" value="" id="example-text-input">
                                    <button type="button" class="btn btn-outline-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-danger text-start">
                            <button type="button" class="btn btn-outline-secondary"><i class="uil uil-plus"></i></button>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">備考</h4>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" id="gen-info-description-input" rows="3"></textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-5">
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> 保存</button>
                            <a href="{{route('items.index')}}" class="btn btn-secondary">キャンセル</a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </form>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->
@endsection

@section('footer-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 3000;
        @if(session('success'))
        toastr.success("{{session('success')}}");
        @elseif(session('failed'))
        toastr.error("{{session('failed')}}");
        @endif
    });


    var singleNoSorting = new Choices('#choices-input-type', {
        shouldSort: false,
    });

    $("#choices-input-type").on("change", function(){
        triggerType($(this).val(), $("#multi-language-flag").is(':checked'));
    });

    $("#multi-language-flag").on("change", function(){
        triggerType($("#choices-input-type").val(), $(this).is(':checked'));
    });

    function triggerType(inputType, hasLang) {
        if (inputType == 'date') {
            $("#choice-has-lang").fadeOut();
        }
        else {
            $("#choice-has-lang").fadeIn();
            if (inputType == 'radio' || inputType == 'check') {
                if (hasLang) {
                    $("#choice-with-lang").fadeIn();
                    $("#choice-without-lang").fadeOut();
                }
                else {
                    $("#choice-with-lang").fadeOut();
                    $("#choice-without-lang").fadeIn();
                }
            }
            else {
                $("#choice-with-lang").fadeOut();
                $("#choice-without-lang").fadeOut();
            }
        }
    }
</script>
@endsection