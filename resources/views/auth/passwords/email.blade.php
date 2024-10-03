@extends('layout.main')
@section('pageTitle', $pageTitle)

@section('main-display')
<header>
    <div class="colorlib-navbar-brand">
         <a class="colorlib-logo" style="color: #00cc44;" href="/"><img src="/assets/images/icon.png" width="6%" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" class="mr-3 mb-2">{{ $shopMainTitle }}<br><span class="ml-5 pl-3">{{ $shopSubTitle }}</span></a>
    </div>
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
</header>

<!--店家主題投影片 -->
<section class="home-slider owl-carousel">
    @foreach ($homeBannerContext as $context)
        <div class="slider-item" style="background-image: url('/assets/images/{{ $context['homeBannerPicName'] }}');" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-start align-items-center" data-scrollax-parent="true">
                    <div class="col-md-8 col-lg-7 col-sm-12 ftco-animate text mb-4" data-scrollax=" properties: { translateY: '70%' }">
                        <span class="position">{{ $context['homeBannerMainTitle'] }}</span><!--首頁Banner:主標題-->
                        <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $context['homeBannerSubTitle'] }}</h1><!--首頁Banner:副標題-->
                        <div class="d-md-flex models-info mt-5 mb-5">
                            @foreach ($context['productKind'] as $kindData)
                            <div>
                                <p class="home-banner-main-item">{{ $kindData['kindName'] }}</p><!--首頁Banner輪播:項目商品/主題類型-->
                                <span class="home-banner-sub-item">{{ $kindData['kindDesc'] }}</span><!--首頁Banner輪播:項目商品/主題描述-->
                            </div>
                            @endforeach
                        </div>
                        <p><a href="/product/1" class="btn btn-primary px-4 py-3">{{ $context['linkPathDesc1'] }}</a> <a href="/product" class="btn btn-primary btn-outline-primary px-4 py-3">{{ $context['linkPathDesc2'] }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
<!--店家主題投影片 -->

<!--忘記密碼專區-->
<section class="ftco-section">
    <div class="container border border-light radius-img shadow p-3 mb-5 bg-body rounded">
        <div class="row d-flex justify-content-start">
            <div class="col-md-12">
                <p>
                    <h4 class="mb-1">忘記您的密碼? 別擔心...</h4>
                    <small style="color: #dc3545;">讓我們來幫助您吧!</small>
                </p>
            </div>
            <div class="col-md-12">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group row mt-3">
                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="請輸入註冊時的電子信箱...">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('重設並寄送密碼') }}
                            </button>
                        </div>
                        <div class="col-md-4 form-check">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--忘記密碼專區-->
@endsection
