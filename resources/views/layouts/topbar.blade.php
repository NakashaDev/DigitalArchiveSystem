<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-sm" data-feather="bell"></i>
                    <span class="noti-dot bg-danger"></span>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                    <span class="ms-2 d-none d-sm-block user-item-desc">
                        <span class="user-name">Admin User</span>
                        <span class="user-sub-title">Administrator</span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 bg-primary border-bottom">
                        <h6 class="mb-0 text-white">Admin User</h6>
                        <p class="mb-0 font-size-11 text-white-50 fw-semibold">admin@example.com</p>
                    </div>
                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">プロフィール</span></a>
                    <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">ヘルプ</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item d-flex align-items-center" href="user-settings.html"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">設定</span></a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i>
                        <span class="align-middle">ログアウト</span>

                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>