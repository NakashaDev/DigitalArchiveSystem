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
                <h4 class="mb-0">分類作成</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('genre.index')}}">マスター管理</a></li>
                        <li class="breadcrumb-item"><a href="{{route('genre.index')}}">分類一覧</a></li>
                        <li class="breadcrumb-item active">新規作成</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <form id="form-genre-create" method="POST" action="{{route('genre.store')}}">
                @csrf
                <input type="hidden" value="{{$id}}" name="create_id" />
                <input type="hidden" value="{{$maxOrder}}" name="order" />
                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">分類コード</h4>
                    </div>
                    <div class="card-body text-end">
                        <span class="text-muted">2/100</span>
                        <input class="form-control" type="text" readonly value="{{old('code', $maxCode)}}" name="code">
                        <span class="text-muted pt-1">英数字入力可能、最大100文字</span>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">分類名</h4>
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
                                        <input class="form-control @error('name_' . $value) is-invalid @enderror" type="text" value="{{old('name_' . $value, $record['name_' . $value])}}" name="name_{{$value}}" placeholder="分類名を入力してください。">
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

                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">短縮名</h4>
                    </div>
                    <div class="card-body">
                        <div class="card shadow-none">
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                    @foreach(\App\Enums\LangCode::asArray() as $key=>$value)
                                    <li class="nav-item">
                                        <a class="nav-link {{$value == 1 ? 'active' : ''}}" data-bs-toggle="tab" href="#short-{{$value}}" role="tab" aria-selected="true">
                                            <span class="d-sm-block">{{\App\Enums\LangCode::getDescription($value)}}</span>
                                            <span class="lang-dot bg-danger"></span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    @foreach(\App\Enums\LangCode::asArray() as $key=>$value)
                                    <div class="tab-pane {{$value == 1 ? 'active' : ''}}" id="short-{{$value}}" role="tabpanel">
                                        <input class="form-control @error('name_v_' . $value) is-invalid @enderror" type="text" value="{{old('name_v_' . $value, $record['name_v_' . $value])}}" name="name_v_{{$value}}" placeholder="分類名を入力してください。">
                                        @error('name_v_' . $value)
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

                <div class="card">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">既存分類の複製</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch form-switch-md mb-2">
                            <input class="form-check-input" type="checkbox" id="copy-genre-flag" name="is_duplicate" {{old('is_duplicate') == 1 ? 'checked' : ''}} value="1">
                            <label class="form-check-label" for="copy-genre-flag">複製する</label>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card" id="copy-genre-list">
                    <div class="card-header justify-content-between d-flex align-items-center">
                        <h4 class="card-title">複製する分類</h4>
                    </div>
                    <div class="card-body col-md-6 choice-select @error('duplicate_genre') is-invalid @enderror">
                        <select class="form-control" data-trigger name="duplicate_genre" >
                            <option value="">分類名</option>
                            @foreach($genres as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                        @error('duplicate_genre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-5">
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> 保存</button>
                            <a href="{{route('genre.index')}}" class="btn btn-secondary">キャンセル</a>
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
</script>
@endsection