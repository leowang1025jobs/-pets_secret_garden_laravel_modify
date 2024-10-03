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
                              <a href="/">{{ $bannerSubTitle[0] }}</a> {{-- 回首頁 --}} 
                         </span>
                         <span>{{ $bannerSubTitle[1] }}</span></p> {{-- 關於祕密花園 --}}
                    <h1 class="mb-5 bread">{{ $bannerMainTitle }}</h1> {{-- 經營理念 --}}
               </div>
          </div>
     </div>
</section>
<!-- END slider -->

<section class="ftco-section-2">
     <div class="container-fluid">
          <div class="section-2-blocks-wrapper d-flex row no-gutters">
               <div class="img col-md-6 ftco-animate" style="background-image: url('/assets/images/thinking.jpg');" alt="{{ $shopMainTitle }}-{{ $mainGoalAlt }}" title="{{ $shopMainTitle }}-{{ $mainGoalAlt }}">
               </div>
               <div class="text col-md-6 ftco-animate">
                    <div class="text-inner align-self-start">

                    <h3 class="heading">{{ $mainGoalTitile }}</h3> {{-- 商店經營主要目標標題 --}}
                    <p>{!! $shopMainGoal !!}</p>{{-- 商店經營主要目標內容導讀  --}}
                    <ul class="my-4">
                         @foreach ($shopGoalItem as $item)
                              <li>
                                   <span class="ion-ios-checkmark-circle mr-2"></span> {{ $item['item_content'] }}{{-- 商店經營主要目標各項目  --}}
                              </li>
                         @endforeach
                    </ul>
                    </div>
               </div>
          </div>
     </div>
</section>

<section class="ftco-section-2">
     <div class="container-fluid">
          <div class="section-2-blocks-wrapper d-flex row no-gutters">
               <div class="text col-md-6 ftco-animate">
                    <div class="text-inner align-self-start">
                    <p>{!! $shopMainHistory !!}</p> <!--商店主要歷史: 標題/內容導讀-->
                    <ul class="my-4">
                         @foreach ($shopHistoryMilestone as $item)
                              <li>
                                   <span class="ion-ios-checkmark-circle mr-2"></span>
                                   <strong>{{ $item['date'] }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ $item['content'] }} <!-- 商店主要歷史里程碑(日期/內容) -->
                              </li>
                         @endforeach
                    </ul>
                    </div>
               </div>
               <div class="img col-md-6 ftco-animate" style="background-image: url('/assets/images/story.jpg');" alt="{{ $shopMainTitle }}-{{ $mainHistoryAlt }}" title="{{ $shopMainTitle }}-{{ $mainHistoryAlt }}">
               </div>
          </div>
     </div>
</section>
@endsection
