@extends('layouts.app')

@section('header-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" />
<link rel="stylesheet" href="{{asset('assets/libs/dragula/dragula.min.css')}}" />
<style>
    /* Items CSS */
    .pane-container {
        height: calc(100vh - 280px); }
    @media (min-width: 992px) {
        .pane-container {
            height: calc(100vh - 350px); } }

    .item-list {
        margin: 0; }
    .item-list .item-box {
        cursor: pointer; }
    .item-list li.active .item-box {
        background-color: rgba(3, 142, 220, 0.075);
        border-color: transparent; }
    .item-list li .item-box {
        position: relative;
        display: block;
        color: #74788d;
        -webkit-transition: all 0.4s;
        transition: all 0.4s;
        padding: 12px;
        border: 1px solid #eff0f2;
        border-radius: 4px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 13px;
        margin: 12px 0px; }
    .item-list li .item-box:hover {
        background-color: rgba(3, 142, 220, 0.075);
        border-color: transparent; }

    .item-master-list {
        height: calc(100vh - 300px); }
    @media (min-width: 992px) {
        .item-master-list {
            height: calc(100vh - 360px); } }

    /* Dragular CSS */
    .gu-mirror {
        position: fixed !important;
        margin: 0 !important;
        z-index: 9999 !important;
    }
    .gu-hide {
        display: none !important;
    }
    .gu-transit {
        opacity: 0.2;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
        filter: alpha(opacity=20);
    }
    .gu-mirror {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 0 20px;
        opacity: 0.8;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        filter: alpha(opacity=80);
        background: #f8f8f8;
        cursor: grabbing;
    }
    .gu-mirror td {}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">分類の項目設定</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('genre.index')}}">マスタ管理</a></li>
                        <li class="breadcrumb-item"><a href="{{route('genre.index')}}">分類設定</a></li>
                        <li class="breadcrumb-item active">分類の項目設定</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="d-lg-flex mb-4">
        <div class="w-50 card">
            <div class="p-4 pb-0 bg-soft-primary rounded-top">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        共通・分類別項目
                    </div>

                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 align-items-start">
                            <div class="dropdown chat-noti-dropdown">
                                <button class="btn dropdown-toggle py-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="uil uil-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Add Contact</a>
                                    <a class="dropdown-item" href="#">Setting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chat-leftsidebar-nav mt-4">
                    <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 nav-justified">
                        <li class="nav-item">
                            <a href="#items-common" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                <span class="d-none d-sm-block">共通項目</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#items-genre" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-none d-sm-block">分類別項目</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="items-common">
                        <div class="pane-container" data-simplebar>
                            <div class="p-4">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="d-inline-block font-size-13">
                                            追加した項目の並び替えはドラッグ&ドロップで行うことができます。 <br/>
                                            項目の削除はゴミ箱アイコンもしくはドラッグ&ドロップで右のエリアに戻してください。
                                        </span>
                                        <button type="button" class="btn btn-primary text-nowrap">保存</button>
                                    </div>

                                    <ul class="list-unstyled item-list" id="common-items-container">

                                        <li>
                                            <div class="item-box d-flex align-items-start border-primary">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-truncate font-size-14 mb-1">材質</h5>
                                                        <button class="btn btn-light" type="button">
                                                            <i class="mdi mdi-trash-can-outline mdi-18px text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- end li -->
                                        <li>
                                            <div class="item-box d-flex align-items-start border-primary">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-truncate font-size-14 mb-1">解説</h5>
                                                        <button class="btn btn-light" type="button">
                                                            <i class="mdi mdi-trash-can-outline mdi-18px text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- end li -->
                                        <li>
                                            <div class="item-box d-flex align-items-start border-primary">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-truncate font-size-14 mb-1">開催日</h5>
                                                        <button class="btn btn-light" type="button">
                                                            <i class="mdi mdi-trash-can-outline mdi-18px text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- end li -->
                                    </ul>
                                    <!-- end ul -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="items-genre">
                        <div class="pane-container" data-simplebar>
                            <div class="p-4">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-size-14 d-inline-block">分類</span>
                                        <div class="w-25 mx-2">
                                            <select class="form-select">
                                                <option value="01">歴史</option>
                                                <option value="02">美術</option>
                                                <option value="03">文学</option>
                                                <option value="04">考古</option>
                                                <option value="05">動物</option>
                                                <option value="06">植物</option>
                                                <option value="07">分類７</option>
                                                <option value="08">分類８</option>
                                                <option value="09">分類９</option>
                                            </select>
                                        </div>
                                    </div>

                                    <ul class="list-unstyled item-list" id="genre-items-container">

                                        <li>
                                            <div class="item-box d-flex align-items-start border-primary">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-truncate font-size-14 mb-1">材質</h5>
                                                        <button class="btn btn-light" type="button">
                                                            <i class="mdi mdi-trash-can-outline mdi-18px text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- end li -->
                                        <li>
                                            <div class="item-box d-flex align-items-start border-primary">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-truncate font-size-14 mb-1">解説</h5>
                                                        <button class="btn btn-light" type="button">
                                                            <i class="mdi mdi-trash-can-outline mdi-18px text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- end li -->
                                        <li>
                                            <div class="item-box d-flex align-items-start border-primary">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-truncate font-size-14 mb-1">開催日</h5>
                                                        <button class="btn btn-light" type="button">
                                                            <i class="mdi mdi-trash-can-outline mdi-18px text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- end li -->
                                    </ul>
                                    <!-- end ul -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end items-leftsidebar -->

        <div class="w-50 mt-4 mt-sm-0 ms-lg-1">
            <div class="card">
                <div class="p-3 border-bottom">
                    <div class="row">
                        <div class="col-xl-4 col-7">
                            項目一覧
                        </div>
                        <div class="col-xl-8 col-5">
                            <ul class="list-inline user-chat-nav text-end mb-0">
                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-search"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                            <form class="px-2">
                                                <div>
                                                    <input type="text" class="form-control bg-light rounded" placeholder="検索ワードを入力…">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                    <!-- end li -->
                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button">
                                            <i class="uil uil-plus me-1"></i> 新規登録
                                        </button>
                                    </div>
                                </li>
                                    <!-- end li -->
                            </ul>
                                <!-- end ul -->
                        </div>
                    </div>
                </div>
                <div>
                    <div class="item-master-list p-3" data-simplebar>
                        <span class="font-size-13">
                            左のエリアに追加したい項目を追加したい箇所にドラッグ&ドロップしてください
                        </span>
                        <ul class="list-unstyled item-list" id="total-items-container">

                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">種別</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">検索カテゴリー</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">代表画像</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">動画</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">関連資料</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">年代指定</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">地図</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">所有者</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">収蔵施設</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">作者</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">関連地域</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">関係のある人物</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">関係のある施設</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">動作期間</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li>
                                <div class="item-box d-flex align-items-start border-primary">
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <i class="mdi mdi-drag-vertical mdi-24px text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-truncate font-size-14 mb-1">制作手順</h5>
                                            <button class="btn btn-light" type="button">
                                                <i class="mdi mdi-pencil-outline mdi-18px text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                        </ul>
                        <!-- end ul -->
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-end my-3">
                    <div class="d-flex align-items-center mx-2">
                        <select class="form-select mx-1" style="width: 70px">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        <span class="d-inline-block text-nowrap">件/ページ</span>
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
                    <div class="d-flex align-items-center mx-2">
                        <input class="form-control mx-1" id="to-page" style="width: 60px" type="number" min="1" max="90" value="53" placeholder="ページ">
                        <span class="d-inline-block text-nowrap"> に移動</span>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
    <!-- End d-lg-flex  -->
</div> <!-- container-fluid -->
@endsection

@section('footer-script')
    <!-- dragula plugins -->
    <script src="{{asset('assets/libs/dragula/dragula.min.js')}}"></script>
    <script>
        dragula([
            $("#common-items-container")[0],
            $("#genre-items-container")[0],
            $("#total-items-container")[0]
        ]).on('dragend', function(d) {
            let liEl = $(d);
            let fromMaster = $("button i.mdi-pencil-outline", liEl).length > 0;
            console.log($.trim(liEl.text()));

            if (fromMaster) {
                $("button i.mdi-pencil-outline", liEl)
                    .removeClass("mdi-pencil-outline text-dark")
                    .addClass("mdi-trash-can-outline text-danger");
            } else {
                $("button i.mdi-trash-can-outline", liEl)
                    .removeClass("mdi-trash-can-outline text-danger")
                    .addClass("mdi-pencil-outline text-dark");
            }
        });
    </script>
@endsection
