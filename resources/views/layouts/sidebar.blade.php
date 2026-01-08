@php $routeName = Route::currentRouteName(); @endphp
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{route('home')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo.png')}}" alt="" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @can('dashboard')
                <li class="menu-title" data-key="t-dashboards">DASHBOARDS</li>

                <li class="{{$routeName == 'home' ?'mm-active' : ''}}">
                    <a href="{{route('home')}}">
                        <i class="icon nav-icon" data-feather="home"></i>
                        <span class="menu-item" data-key="t-home">ホーム</span>
                    </a>
                </li>
                @endcan

                <li class="menu-title" data-key="t-dashboards">Data Management</li>

                @can('collection-management')
                <li class="{{str_starts_with($routeName, 'materials') ? 'mm-active' : ''}}">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="icon nav-icon" data-feather="file-text"></i>
                        <span class="menu-item" data-key="t-data">資料管理</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('collection.search')}}" data-key="t-data-list">資料検索</a></li>
                        <li><a href="{{route('collection.create')}}" data-key="t-new-data">資料新規登録</a></li>
                    </ul>
                </li>
                @endcan

                @can('bulk-import')
                <li class="{{str_starts_with($routeName, 'operations') ? 'mm-active' : ''}}">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="icon nav-icon" data-feather="check-square"></i>
                        <span class="menu-item" data-key="t-bulk">一括操作</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a data-key="t-template-output">一括登録テンプレート出力</a></li>
                        <li><a data-key="t-bulk-upload">一括登録アップロード</a></li>
                        <li><a data-key="t-images-upload">画像照合アップロード</a></li>
                    </ul>
                </li>
                @endcan

                @hasrole(\App\Enums\UserGroup::SUPER_ADMIN)
                <li class="menu-title" data-key="t-dashboards">Maintenance</li>

                <li class="{{str_starts_with($routeName, 'maintenance') ? 'mm-active' : ''}}">
                    <a class="has-arrow">
                        <i class="icon nav-icon" data-feather="settings"></i>
                        <span class="menu-item" data-key="t-maintenance">メンテナンスモード</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a data-key="t-set-maintenance">メンテナンス管理</a></li>
                    </ul>
                </li>

                <li class="{{str_starts_with($routeName, 'genre') || str_starts_with($routeName, 'items') ? 'mm-active' : ''}}">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="icon nav-icon" data-feather="box"></i>
                        <span class="menu-item" data-key="t-users">マスター管理</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li class="{{str_starts_with($routeName, 'genre') ? 'mm-active' : ''}}">
                            <a class="{{str_starts_with($routeName, 'genre') ? 'active' : ''}}" href="{{route('genre.index')}}" data-key="t-data-category">分類設定</a>
                        </li>
                        <li class="{{str_starts_with($routeName, 'items') ? 'mm-active' : ''}}">
                            <a class="{{str_starts_with($routeName, 'items') ? 'active' : ''}}" href="{{route('items.index')}}" data-key="t-data-item">項目設定</a>
                        </li>
                    </ul>
                </li>

                <li class="{{str_starts_with($routeName, 'users') ? 'mm-active' : ''}}">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="icon nav-icon" data-feather="users"></i>
                        <span class="menu-item" data-key="t-users">ユーザー管理</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li class="{{$routeName == 'users.index' ? 'mm-active' : ''}}">
                            <a href="{{route('users.index')}}" class="{{$routeName == 'users.index' ? 'active' : ''}}" data-key="t-user-list">ユーザー一覧</a>
                        </li>
                        <li class="{{$routeName == 'users.create' ? 'mm-active' : ''}}">
                            <a href="{{route('users.create')}}" class="{{$routeName == 'users.create' ? 'active' : ''}}" data-key="t-new-user">ユーザー新規登録</a>
                        </li>
                        <li><a data-key="t-user-group">グループ設定</a></li>
                    </ul>
                </li>
                @endhasrole

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
