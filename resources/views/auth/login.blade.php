@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザーログイン画面</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                    
                         <!-- パスワード入力 -->    
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <!-- アドレス入力 -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">アドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        {{--remember meはコメントアウト
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                       --}}
                            
                        <!-- 新規登録ボタン（作成）-->
                         <div class="row mb-3">
                            <div class="col-md-4">
                                <a class="btn btn-primary" href="register">
                                    新規登録
                                </a>
                            </div>
                        
                                {{--  コメントアウト  
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                --}}
                            
                        
                        <!-- ログインボタン（ララベル側作成）-->
                        
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>

                            {{--  コメントアウト  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                --}}
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
