@extends('layouts.app')

@section('content')
<div class="container">
    <!-- start container -->
    <div class="min-vh-100">
        <div class="bg-overlay bg-white"></div>
        <div class="d-flex flex-column min-vh-100 px-3 pt-4">
            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="text-center  py-5">
                        <div class="mb-4 mb-md-5">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="{{asset('/assets/images/logo.png')}}" alt="" height="22" class="auth-logo-dark">
                            </a>
                        </div>
                        <div class="text-muted mb-4">
                            <h5 class="">{{__('パスワードを再設定する')}}</h5>
                            <p>{{__('新しいパスワードを入力してください')}}</p>
                        </div>

                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                            <div class="form-floating form-floating-custom mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="Enter Password" value="{{ old('password') }}" name="password" required autocomplete="new-password">
                                <label for="input-password">{{ __('パスワード') }}</label>
                                <div class="form-floating-icon">
                                    <i class="uil uil-padlock @error('password') text-danger @enderror"></i>
                                </div>
                            </div>

                            <div class="form-floating form-floating-custom mb-3">
                                <input type="password" class="form-control" id="password-confim" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                <label for="input-password">{{ __('確認のためもう一度入力') }}</label>
                                <div class="form-floating-icon">
                                    <i class="uil uil-check-circle"></i>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary w-100 btn-login" type="submit">{{ __('再設定する') }}</button>
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