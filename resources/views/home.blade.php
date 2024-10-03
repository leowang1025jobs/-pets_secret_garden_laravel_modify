@extends('layout.main')
@section('pageTitle', $pageTitle)

@section('main-display')

<header>
    <div class="colorlib-navbar-brand">
         <a class="colorlib-logo" style="color: #00cc44;" href="/">
            <img src="/assets/images/icon.png" width="6%" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" class="mr-3 mb-2">{{ $shopMainTitle }}<br>
            <span class="ml-5 pl-3">
                @if (!$isLogin)
                    訪客您好，歡迎來到{{ $shopSubTitle }}
                @else
                    Hi! {{ $bannerSubTitle[1] }}，歡迎回到{{ $shopSubTitle }}
                @endif
            </span>
        </a>
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

<section class="ftco-section-2">
    <div class="container-fluid">
        <div class="section-2-blocks-wrapper d-flex row no-gutters">
            <div class="img col-md-6 ftco-animate" style="background-image: url('/assets/images/shopping.jpg');" alt="{{ $shopMainTitle }}-{{ $mainSection1Data[0] }}" title="{{ $shopMainTitle }}-{{ $mainSection1Data[0] }}">
            </div>
            <div class="text col-md-6 ftco-animate">
                <div class="text-inner align-self-start">
                    {!! $shopBasicData['main_feature'] !!} <!--首頁區塊1: 主標題資料-->
                    <ul class="my-4">
                        @foreach ($featureItem as $item)
                        <li>
                            <span class="ion-ios-checkmark-circle mr-2">
                                {{ $item }} <!--首頁區塊1: 店面特色項目-->
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="row">
                        <div class="col-md-7 ftco-animate">
                            <div class="img-2 d-flex justify-content-center align-items-center" style="background-image: url('/assets/images/bg_6.jpg');" alt="{{ $shopMainTitle }}-{{ $mainSection1Data[1] }}" title="{{ $shopMainTitle }}-{{ $mainSection1Data[1] }}">
                                <a href="/assets/videos/introduce.mp4" class="button popup-vimeo"><span class="ion-ios-play"></span></a>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-flex align-items-center">
                            <h3 class="watchvideo-heading"><a href="/assets/videos/introduce.mp4"><span class="ion-ios-play"></span>{{ $mainSection1Data[2] }}</a></h3> <!--首頁區塊1: 影片介紹標題-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-2">
    <div class="container-fluid">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 d-flex align-items-center heading-section ftco-animate bg-light">
                <div class="col-md-9">
                    <div class="p-5">
                        {!! $shopBasicData['main_service'] !!} <!--首頁區塊2: 主標題資料-->
                    </div>
                </div>
            </div>
            <!--商品展示項目 -->
            @foreach ($productCollection as $index1 => $item)
                <div class="col-md-3 model-entry ftco-animate">
                    <div class="model-img" style="background-image: url(/assets/images/{{ $item['img_name'] }});" alt="{{ $shopMainTitle }}-{{ $item['type'] }}" title="{{ $shopMainTitle }}-{{ $item['type'] }}">
                        <div class="name">
                            <h3><a href="product/{{ $index1 }}">{{ $item['type'] }}</a></h3>
                        </div>
                        <div class="text">
                            <h3><a href="product/{{ $index1 }}">{{ $item['type'] }}</a></h3>
                            <div class="d-flex models-info">
                                @foreach ($item['brand_name'] as $index2 => $name)
                                    <div class="pr-md-3">
                                        <p>{{ $name }}</p>
                                        <span>{{ $item['storage_qty'][$index2] }}款</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-3 d-flex justify-content-center align-items-center bg-light ftco-animate">
                <div class="btn-view">
                    <p><a href="/product/1">{{ $collectionLinkage }}</a></p>
                </div>
            </div>
            <!--商品展示項目 -->
        </div>
    </div>
</section>

<section class="ftco-section testimony-section img" style="background-image: url(/assets/images/client-saying.jpg);" alt="{{ $shopMainTitle }}-{{ $section3Title }}" title="{{ $shopMainTitle }}-{{ $section3Title }}">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5 text-center heading-section ftco-animate">
                {!! $mainSection3Data['mainTitle'] !!}  <!--首頁區塊3: 主標題資料-->
                {!! $mainSection3Data['subTitle'] !!}   <!--首頁區塊3: 副標題資料-->
            </div>
        </div>
        <div class="row d-md-flex justify-content-center">
            <div class="col-md-7 ftco-animate">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($mainSection3Data['customerFeedback'] as $index => $item)
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5" style="background-image: url(/assets/images/person_{{ $index + 1}}.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    {!! $item['feedbackContent'] !!} <!--首頁區塊3: 客戶回饋內容-->
                                    {!! $item['customerName'] !!} <!--首頁區塊3: 客戶姓名-->
                                    {!! $item['occupation'] !!} <!--首頁區塊3: 客戶職業-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-2">
    <div class="container-fluid">
        <div class="section-2-blocks-wrapper d-flex row no-gutters">
            <div class="img col-md-6 ftco-animate" style="background-image: url('/assets/images/bg_6.jpg');" alt="{{ $shopMainTitle }}-{{ $section4Title }}" title="{{ $shopMainTitle }}-{{ $section4Title }}">
            </div>
            <div class="text col-md-6 ftco-animate">
                <div class="text-inner align-self-start">
                    {!! $mainSection4Title !!}  <!--首頁區塊4: 主標題-->
                    @foreach ($subSerivce as $item)
                        <div class="services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-megaphone"></span></div>
                            <div class="info ml-4">
                                {!! $item->item_name !!}      <!--首頁區塊4: 服務項目標題-->
                                {!! $item->item_content !!}   <!--首頁區塊4: 服務項目內容-->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 mb-5 heading-section ftco-animate">
                {!! $mainSection5Title !!}                    <!--首頁區塊5: 主標題-->
                @foreach ($mainSection5Data["subTitle"] as $subTitle)
                    <p class="mb-2">
                        {!! $subTitle !!}                     <!--首頁區塊5: 各項副標題-->
                    </p>
                @endforeach
                <p class="btn-view mt-5">
                    <a href="/news">
                        {{ $section5Linkage }}                <!--首頁區塊5: 最新消息連結-->
                    </a>
                </p>
            </div>
            @foreach ($shopNewsBasicData as $index => $news)
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="/news/{{ $index }}" class="block-20 radius-img" 
                        style="background-image: url('/assets/images/{{ $news['picture_file_name'] }}');" 
                        alt="{{ $shopMainTitle }}-{{ $news['news_main_title'] }}" 
                        title="{{ $shopMainTitle }}-{{ $news['news_main_title'] }}">
                        </a>
                        <div class="text pt-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">{{ $news['created_at'] }}</a></div>  <!--消息建立/更新日期-->
                                <div><a href="#">{{ $news['user_basic']['name'] }}</a></div> <!--消息建立者-->
                                <div>
                                    <a href="#" class="meta-chat">
                                        <span class="icon-chat"></span> {{ $news['replyment_qty'] }} <!--消息回應筆數-->
                                    </a>
                                </div>
                            </div>
                            <h3 class="heading mt-3">
                                <a href="#"> {!! $news['news_main_title'] !!}</a> <!--消息主要標題-->
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container border border-light radius-img shadow p-3 mb-5 bg-body rounded">
        <div class="row d-flex justify-content-start">
            @if (!$isLogin)
                <div class="col-md-12">
                    <p>
                        <h4 class="mb-1">想了解更多好康跟消息嗎?</h4>
                        <small style="color: #dc3545;">那就手刀加入會員吧!</small>
                    </p>
                </div>
                <div class="col-md-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mt-3">
                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="請輸入會員信箱">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="請輸入會員密碼">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <button class="btn btn-outline-primary w-100" type="button" name="remember" id="btn_remember">{{ __('記住我') }}</button>
                            </div>
                            <div class="col-md-1 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('進入會員專區') }}
                                </button>
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                @if (Route::has('register'))
                                    <button type="button" class="btn btn-primary w-100" id="btn_register">
                                        {{ __('註冊會員') }}
                                    </button>
                                @endif
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-primary w-100" href="{{ route('password.request') }}">
                                        {{ __('忘記您的密碼?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-1 d-flex align-items-center">
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="col-md-12">
                    <p>
                        <h4 class="mb-1">歡迎回來，{{ $bannerSubTitle[1] }}</h4>
                        <small style="color: #dc3545;">記得多回來看看好康與消息喔!</small>
                    </p>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a type="button" class="btn btn-outline-primary w-100" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('我要離開') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <button type="button" class="btn btn-primary w-100" id="btn_member_area">
                        {{ __('會員專區') }}
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- <div class="container">
    @if (!$isLogin)
        <div class="row justify-content-center">
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
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('歡迎' . $bannerSubTitle[1] . '的登入!') }}
                        <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    @endif
</div> --}}

@endsection
