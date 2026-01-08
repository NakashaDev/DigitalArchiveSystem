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
                <h4 class="mb-0">ユーザー一覧</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">ユーザー管理</a></li>
                        <li class="breadcrumb-item active">ユーザー一覧</li>
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

                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">検索結果 <span class="text-muted font-size-13 fw-normal ms-2">({{$total}}件がヒットしました)</span></h4>
                            <div class="d-flex d-flex-custom flex-wrap align-items-start justify-content-md-end gap-4">
                                <div class="d-flex flex-wrap align-items-center justify-content-md-end gap-2 w-lg">
                                    <label for="choices-single-no-search" class="form-label font-size-13 text-muted mb-0">表示件数</label>
                                    <select class="form-control" data-trigger>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div>
                                    <select class="form-control w-lg" data-trigger name="choices-single-groups" id="choices-single-groups">
                                        <option value="1">更新順</option>
                                        <option value="2">登録順</option>
                                    </select>
                                </div>
                                <div>
                                    <a href="{{route('users.create')}}" class="btn btn-light"><i class="uil uil-plus me-1"></i> 新規登録</a>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-h"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target=".delete-all-modal" onClick="javascript:changeMethod()">選択したユーザーを削除</button></li>
                                    </ul>
                                </div><!-- end dropdown -->
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form id="user-list-form" method="POST">
                                <input type="hidden" name="_method" value="delete" />
                                @csrf
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th scope="col">№</th>
                                                <th scope="col">名前</th>
                                                <th scope="col">メールアドレス</th>
                                                <th scope="col">グループ</th>
                                                <th scope="col">登録日時</th>
                                                <th style="width: 80px; min-width: 80px;">操作</th>
                                            </tr><!-- end tr -->
                                        </thead><!-- end thead -->
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="contacusercheck{{$user->id}}" name="sel[]" value="{{$user->id}}">
                                                        <label class="form-check-label" for="contacusercheck{{$user->id}}"></label>
                                                    </div>
                                                </th>
                                                <th scope="row">{{($curPage - 1) * $perPage + $loop->index + 1}}</th>
                                                <td>
                                                    <a href="{{route('users.edit', ['id'=>$user->id])}}" class="text-body fw-medium">{{$user->name}}</a>
                                                </td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->roles->first()->name_ja}}</td>
                                                <td>{{date('Y-m-d H:i', strtotime($user->created_at))}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="uil uil-ellipsis-h"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="{{route('users.edit', ['id'=>$user->id])}}">編集</a></li>
                                                            <!-- <li><button class="dropdown-item" type="button" onClick="javascript:sendDeleteRequest({{$user->id}})">削除</button></li> -->
                                                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target=".delete-user-modal" onClick="javascript:changeUrl({{$user->id}})">削除</button></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div><!-- end table responsive -->
                            </form>
                            <div class="row">
                            <div class="d-flex align-items-center justify-content-between gap-2">
                                <!-- start pagination component -->
                                <div class="col-md-3 d-flex flex-wrap gap-2">
                                </div>
                                <x-pagination :cur-page="$curPage" :per-page="$perPage" :total-count="$total" route-name="users.index" />
                                <!-- end pagination component -->
                            </div>

                        </div>
                    </div>

                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="modal fade delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">削除確認</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>このユーザーを本当に削除しますか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="javascript:sendDeleteRequest()">はい</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade delete-all-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">一括削除確認</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>選択したユーザーを本当に削除しますか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="javascript:sendDeleteRequest()">はい</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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

    const changeMethod = () => {
        $('input[name=_method]').val('post');
        $('form#user-list-form').attr('action', "{{route('users.delete')}}");
    }

    const changeUrl = (selId) => {
        $('input[name=_method]').val('delete');
        $('form#user-list-form').attr('action', "{{url('/users')}}" + "/" + selId);
    }

    const sendDeleteRequest = () => {
        $('form#user-list-form').submit();
    }
</script>
@endsection
