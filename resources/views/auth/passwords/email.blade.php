@extends('layouts.app')

@section('content')
<div class="bg-overlay bg-white"></div>
<div class="container">
    <!-- start container -->
    <div class="min-vh-100">
        <div class="bg-overlay bg-white"></div>
        <div class="d-flex flex-column min-vh-100 px-3 pt-4">
            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center py-5">
                        <div class="mb-4 mb-md-5">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="{{asset('assets/images/logo.png')}}" alt="" height="22" class="auth-logo-dark">
                            </a>
                        </div>
                        @if (session('status'))
                        <div class="text-muted">
                            <h4 class="">メールを確認してください</h4>
                            <p><span class="fw-semibold">{{ session('email') }}</span> 宛に再設定用のURLを送信しましたのでご確認ください。</p>
                            <!-- <div class="mt-4">
                                <a href="auth-resetpassword.html" class="btn btn-primary w-100">メールを確認する</a>
                            </div> -->
                        </div>

                        <div class="mt-5 text-center text-muted">
                            <p>メールが届いていない方は <a href="{{ route('password.request') }}" class="fw-medium text-decoration-underline">再送信</a></p>
                        </div>
                        @else
                        <div class="text-muted mb-4">
                            <h5 class="">{{__('パスワード再設定')}}</h5>
                            <p>{{__('メールアドレスを入力してください。')}}<br />
                                {{__('パスワード再設定用のURLをお送りいたします。')}}
                            </p>
                        </div>

                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-floating form-floating-custom mb-3">
                                <input type="email" id="input-email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="input-email">メールアドレス</label>
                                <div class="form-floating-icon">
                                    <i class="uil uil-envelope-alt"></i>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-100">{{__('メールを送信')}} </a>
                            </div>
                        </form><!-- end form -->
                        @endif

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