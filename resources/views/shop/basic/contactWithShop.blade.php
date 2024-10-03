@extends('layout.main')
@section('pageTitle', $pageTitle)
@section('main-display')
<header>
     <div class="colorlib-navbar-brand">
          <a class="colorlib-logo" style="color: #00cc44;" href="/"><img src="/assets/images/icon.png" width="6%" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" class="mr-3 mb-2">{{ $shopMainTitle }}<br><span class="ml-5 pl-3">{{ $shopSubTitle }}</span></a>
     </div>
     <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
</header>

<section class="hero-wrap" style="background-image: url(/assets/images/other_banner_bg.jpg);" data-stellar-background-ratio="0.5" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}">
     <div class="overlay"></div>
     <div class="container">
         <div class="row no-gutters text align-items-end justify-content-center" data-scrollax-parent="true">
             <div class="col-md-8 ftco-animate text-center">
                 <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="/">{{ $bannerSubTitle[0] }}</a> <!--回首頁-->
                    </span>
                    <span>{{ $bannerSubTitle[1] }}</span></p> <!--聯絡秘密花園-->
                 <h1 class="mb-5 bread">{{ $bannerMainTitle }}</h1> <!--問題詢問-->
             </div>
         </div>
     </div>
 </section>
<!-- END slider -->

<section class="ftco-section contact-section">
     <div class="container mt-5">
         <div class="row block-9">
             <div class="col-md-4 order-last contact-info ftco-animate">
                 <div class="row">
                     <div class="col-md-12 mb-4">
                         <h2 class="h4">{{ $contactInfo['mainTitle'] }}</h2> <!--與我們聯繫-->
                     </div>
                     @foreach ($contactInfo['subTitle'] as $index => $title)
                        <div class="col-md-12 mb-3">
                            <p>
                                <span>{{ $title }}:</span> <!--各項聯絡資訊: 標題--> 
                                @if ($index != 'address')
                                    <a href="{{ $contactInfo['linkageMethod'][$index] }}{{ $shopBasicData[$index] }}">
                                        {{ $shopBasicData[$index] }} <!--各項聯絡資訊: 電話、電子信箱-->
                                    </a>
                                @else
                                    {{ $shopBasicData[$index] }} <!--各項聯絡資訊: 商家地址-->
                                @endif
                            </p>
                        </div>
                     @endforeach
                 </div>
             </div>
             <div class="col-md-1"></div>
             <div class="col-md-6 order-first ftco-animate">
                 <form action="#">
                    @foreach ($inputHints as $index => $hint)
                        <div class="form-group">
                            @if ($index < 3)
                                <!--輸入提示: 您的大名、您的電子信箱、詢問主題-->
                                <input type="text" class="form-control" placeholder="{{ $hint }}">
                            @endif
                        </div>
                    @endforeach
                     <div class="form-group">
                        <!--輸入提示: 詢問內容-->
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="{{ $inputHints[3] }}"></textarea>
                     </div>
                     <div class="form-group">
                        <!--送出按鈕: 送出問題-->
                        <input type="submit" class="btn btn-primary py-3 px-5" value="{{ $btnSubmitText }}">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>

 <div id="map"></div>
@endsection
