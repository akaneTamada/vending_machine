@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー新規登録画面</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- 名前入力欄はコメントアウト
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                     
                        <!-- アドレス入力 -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">アドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワード入力 -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード確認
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                      --}}
                    
                        <!-- 登録ボタン（ララベル作成） -->
                      
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    新規登録
                                </button>
                            </div>
                        
                     

                         <!-- 戻るボタン（自作） -->
                    
                        
                            <div class="col-md-4">
                                <a class="btn btn-primary" href="login">
                                    戻る
                                </a>
                            </div>
                        </div>
               

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
