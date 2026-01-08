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
                <h4 class="mb-0">分類一覧</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">マスター管理</a></li>
                        <li class="breadcrumb-item active">分類設定</li>
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
                        <div class="col-md-8">
                            <form id="form-search" method="GET" action="{{route('genre.index')}}">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="specificSizeInputName" placeholder="分類名・分類コードを入力してください" name="keyword" value="{{$keyword}}">
                                    </div>
                                    <div class="col-auto px-3" style="border-right: 1px solid #aaa">
                                        <button type="submit" class="btn btn-outline-primary">検索</button>
                                    </div>
                                    <div class="col-auto px-3">
                                        <button type="reset" class="btn btn-outline-secondary">リセット</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                                <div>
                                    <a href="{{route('genre.create', ['id' => 0])}}" class="btn btn-primary" ><i class="uil uil-plus me-1"></i> 新規登録</a>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-light text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        言語 ▼
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @foreach(\App\Enums\LangCode::asArray() as $key=>$value)
                                            <li><a class="dropdown-item" href="{{route('genre.index')}}?lang={{$value}}">{{\App\Enums\LangCode::getDescription($value)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- end dropdown -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check table-striped" id="tbl-genre">
                            <thead>
                            <tr style="background: #f8f8f8">
                                <th scope="col" style="width: 50px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th scope="col">分類ID</th>
                                <th scope="col">分類コード</th>
                                <th scope="col">分類名</th>
                                <th scope="col">表示名</th>
                                <th scope="col">登録資料数</th>
                                <th style="width: 80px; min-width: 80px;">分類編集</th>
                            </tr><!-- end tr -->
                            </thead><!-- end thead -->
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                            <label class="form-check-label" for="contacusercheck1"></label>
                                        </div>
                                    </th>
                                    <td>{{($curPage - 1) * $perPage + $loop->index + 1}}</td>
                                    <td>{{$genre->genre_code}}</td>
                                    <td>{{$genre->genre_name}}</td>
                                    <td>{{$genre->genre_name_v}}</td>
                                    <td>{{$genre->collection_count}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="btn btn-light border-secondary mx-1" href="{{route('genre.edit', ['id' => $genre->collection_genre_id])}}" role="button" title="編集">
                                                <i class="mdi mdi-18px mdi-file-edit-outline"></i>
                                            </a>
                                            <a class="btn btn-light border-secondary mx-1 {{$genre->collection_count == 0 ? '' : 'disabled'}}" role="button" title="削除"
                                                data-bs-toggle="modal" data-bs-target=".delete-genre-modal" onClick="javascript:createDeleteFrm({{$genre->collection_genre_id}})">
                                                <i class="mdi mdi-18px mdi-trash-can-outline {{$genre->collection_count == 0 ? 'text-danger' : ''}}"></i>
                                            </a>
                                            <a class="btn btn-light border-secondary mx-1" href="{{route('genre.create', ['id' => $genre->collection_genre_id])}}" role="button" title="複製">
                                                <i class="mdi mdi-18px mdi-content-copy"></i>
                                            </a>
                                            <a class="btn btn-light border-secondary mx-1" href="{{route('genre.setting', ['id' => $genre->collection_genre_id])}}" role="button" title="項目設定">
                                                <i class="mdi mdi-18px mdi-format-list-bulleted-square"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->

                    <div class="row g-0 text-center text-sm-start">
                        <!-- start pagination component -->
                        <div class="col-sm-3">
                            <div>
                                <p class="mb-sm-0">{{$total}}件見つかりました。</p>
                            </div>
                        </div>
                        <x-pagination :cur-page="$curPage" :per-page="$perPage" :total-count="$total" route-name="genre.index" />
                        <!-- start pagination component -->
                    </div><!-- end row -->

                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="modal fade delete-genre-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">削除確認</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>この分類をを本当に削除しますか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="javascript:sendDeleteRequest()">はい</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <form id="form-delete" method="POST">
        @csrf
        <input type="hidden" name="_method" value="delete" />
    </form>
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

    function createDeleteFrm(selId) {
        $('form#form-delete').attr('action', "{{url('/genre')}}" + "/" + selId);
    }

    function sendDeleteRequest() {
        $('form#form-delete').submit();
    }
</script>
@endsection
