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
                <h4 class="mb-0">ユーザー編集</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">ユーザー管理</a></li>
                        <li class="breadcrumb-item active">ユーザー編集</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-none justify-content-between d-flex align-items-center">
                    <h4 class="card-title">ユーザー情報</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', ['id'=>$user->id]) }}">
                        @method('put')
                        @csrf
                        <div class="card border-none shadow-none">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="text-input-name" class="col-md-2 col-form-label">名前<span class="text-danger ms-2">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name', $user->name)}}" id="text-input-name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="text-input-email" class="col-md-2 col-form-label">メールアドレス<span class="text-danger ms-2">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email', $user->email)}}" id="text-input-email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="text-input-password" class="col-md-2 col-form-label">パスワード<span class="text-danger ms-2">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="" id="text-input-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="text-input-confirm" class="col-md-2 col-form-label">パスワード確認</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="password_confirmation" value="" id="text-input-confirm">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">グループ<span class="text-danger ms-2">*</span></label>
                                    <div class="col-md-10">
                                        <div class="d-flex align-items-center gap-4 @error('group') is-invalid @enderror">
                                            @foreach($userGroups as $groupId => $groupName)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="group-{{ $groupId }}"
                                                       name="group" value="{{ $groupId }}" {{ old('group', $curGroupId) == $groupId ? 'checked' : '' }}>
                                                <label class="form-check-label" for="group-{{ $groupId }}">
                                                    {{ $groupName }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('group')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <div class="d-flex align-items-center gap-4">
                                            <button type="submit" class="btn btn-primary w-md">保存</button>
                                            <!-- <button type="button" class="btn btn-light w-md" >キャンセル</button> -->
                                            <a href="{{route('users.index')}}" class="btn btn-light w-md">戻る</a>
                                        </div>
                                    </div><!-- end col -->
                                </div>

                            </div>
                        </div>
                        <!-- end card -->

                    </form>
                    <!-- end form -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
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