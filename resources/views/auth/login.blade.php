@extends('layouts.app')
<div class="container" id="win-login">
     <div class="row justify-content-center" style="margin-top:25px;">
          <div class="col-md-8">
               <div class="card">
               <div class="card-header">{{ __('準備登入') }}</div>
               <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                         @csrf

                         <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('電子信箱') }}</label>

                              <div class="col-md-6">
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="請輸入會員信箱...">

                                   @error('email')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                              </div>
                         </div>

                         <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('密碼') }}</label>

                              <div class="col-md-6">
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="請輸入會員密碼...">

                                   @error('password')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                              </div>
                         </div>

                         <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                   <div class="form-check">
                                   <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   <label class="form-check-label" for="remember">
                                        {{ __('記住我') }}
                                   </label>
                                   </div>
                              </div>
                         </div>

                         <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                   <button type="submit" class="btn btn-primary">
                                   {{ __('登入') }}
                                   </button>

                                   @if (Route::has('register'))
                                   <button type="button" class="btn btn-primary ml-3" id="btn_register">
                                        {{ __('註冊') }}
                                   </button>
                                   @endif

                                   @if (Route::has('password.request'))
                                   <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('忘記您的密碼?') }}
                                   </a>
                                   @endif
                              </div>
                         </div>
                    </form>
               </div>
               </div>
          </div>
     </div>
</div>