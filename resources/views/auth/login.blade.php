@extends('layouts.app')

@section('content')
<div class="bg-overlay bg-white"></div>
<div class="container">
    <!-- start container -->
    <div class="min-vh-100">
        <div class="d-flex flex-column min-vh-100 px-3 pt-4">
            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="text-center  py-5">
                        <div class="mb-4 mb-md-5">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="{{asset('/assets/images/logo.png')}}" alt="" height="22" class="auth-logo-dark">
                            </a>
                        </div>

                        <div class="mb-4">
                            <h5>{{ __('ログイン') }}</h5>
                            <p>{{ __('アカウント情報を入力してください') }}</p>
                        </div>

                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror

                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating form-floating-custom mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="input-username" placeholder="Enter User Name" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="input-username">{{ __('ユーザー名またはメールアドレス') }}</label>
                                <div class="form-floating-icon">
                                    <i class="uil uil-users-alt @error('email') text-danger @enderror"></i>
                                </div>
                            </div>

                            <div class="form-floating form-floating-custom mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="Enter Password" value="{{ old('password') }}" name="password" required>
                                <label for="input-password">{{ __('パスワード') }}</label>
                                <div class="form-floating-icon">
                                    <i class="uil uil-padlock @error('password') text-danger @enderror"></i>
                                </div>
                            </div>

                            <div class="form-check form-check-info font-size-16 text-start">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
                                <label class="form-check-label font-size-14" for="remember">
                                    {{ __("次回から入力を省略")}}
                                </label>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary w-100 btn-login" type="submit">{{ __('ログイン') }}</button>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('password.request') }}" class="text-muted text-decoration-underline">{{__('パスワードをお忘れですか？')}}</a>
                            </div>
                        </form><!-- end form -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center text-muted p-4">
                        <p class="mb-0">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> ナカシャクリエイテブ株式会社 All Rights Reserved.
                        </p>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

        </div>
    </div>
    <!-- end container -->
</div>
@endsection