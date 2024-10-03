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
                        <a href="/">{{ $bannerSubTitle[0] }}</a>  <!--回首頁-->
                    </span> 
                    <span>
                        {{ $bannerSubTitle[1] }}  <!--最新花園消息-->
                    </span>
                </p>
                 <h1 class="mb-5 bread">{{ $bannerMainTitle }}</h1>  <!--花園新鮮事-->
             </div>
         </div>
     </div>
</section>
<!-- END slider -->

<section class="ftco-section">
     <div class="container">
         <div class="row d-flex">
             <div class="col-md-3 mb-5 heading-section ftco-animate">
                 <h2 class="mb-4"> {{ $bannerSubTitle[1] }} </h2>  <!--最新花園消息-->
                 <p class="mb-5">{{ $displayIntro }}</p> <!--展示消息導讀-->
             </div>
             @foreach ($shopNewsBasic as $index => $news)
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
</section>
@endsection
