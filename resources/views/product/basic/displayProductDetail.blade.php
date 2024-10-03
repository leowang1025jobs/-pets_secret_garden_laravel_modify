@extends('layout.main')
@section('pageTitle', $pageTitle)
@section('main-display')
<header>
     <div class="colorlib-navbar-brand">
        <a class="colorlib-logo" style="color: #00cc44;" href="/">
            <img src="/assets/images/icon.png" width="6%" alt="{{ $shopMainTitle }}-{{ $broswerProducts }}" title="{{ $shopMainTitle }}-{{ $broswerProducts }}" class="mr-3 mb-2">{{ $shopMainTitle }}<br>{{-- 祕密花園 --}}
            <span class="ml-5 pl-3">{{ $shopSubTitle }}</span> {{-- 寵物生活會館 --}}
        </a>
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
                        <a href="/">{{ $backToHomePage }}</a> {{-- 回首頁 --}}
                    </span> 
                    <span class="mr-2">
                        <a href="/product">{{ $bannerMainType }}</a> {{-- 花園熱銷商品 --}}
                    </span> 
                    <span>{{ $bannerSubTitle }}</span> {{-- 商品介紹 --}}
                </p>
                <h1 class="mb-5 bread">{{ $bannerMainTitle }}</h1> {{-- 商品特色 --}}
            </div>
        </div>
    </div>
</section>
 <!-- END slider -->

 <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row model-detail d-mf-flex align-items-center">
                    <div class="col-md-6 ftco-animate">
                        <div class="carousel-model owl-carousel">
                            @foreach ($productsAllBasicData[$productID] as $itemTitle => $rowData)
                                @if ($itemTitle == 'type')
                                    <div class="items">
                                        <img src="/assets/images/image_{{ $productID }}.{{ $mainFileFormat[$productID] }}" 
                                        class="img-fluid" 
                                        alt="{{ $shopMainTitle }}-{{ $rowData['main'] }}/{{ $rowData['sub'] }}" 
                                        title="{{ $shopMainTitle }}-{{ $rowData['main'] }}/{{ $rowData['sub'] }}">
                                    </div>
                                    <div class="items">
                                        <img src="/assets/images/image_{{ $productID }}_1.jpg" class="img-fluid" 
                                        alt="{{ $shopMainTitle }}-{{ $rowData['main'] }}/{{ $rowData['sub'] }}" 
                                        title="{{ $shopMainTitle }}-{{ $rowData['main'] }}/{{ $rowData['sub'] }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5 model-info ftco-animate">
                        @foreach ($productsAllBasicData[$productID] as $itemTitle => $rowData)
                            @if ($itemTitle == 'name')
                                <h3 class="mb-4">{{ $rowData }}</h3> <!--商品項目: 品名-->
                            @elseif ($itemTitle != 'type')
                                <p><span>{{ $productsDataTitle[$itemTitle] }}</span>
                                    <span>{{ $rowData }}</span> <!--商品項目: 標題/說明-->
                                </p>
                            @endif
                        @endforeach
                        <p class="mt-4"><a href="#" class="btn btn-primary py-3 px-4">{{ $orderProduct }}</a></p> <!--訂購此商品-->
                    </div>
                </div>
                <div class="row no-gutters mt-5 d-flex justify-content-center text-center">
                    @foreach  ($randomProductsIDArr as $randomID)
                        <div class="col-md-5 col-lg-2 fto-animate m-2"> <!--其他商品預覽-->
                            <a href="/product/{{ $randomID }}"><img src="/assets/images/image_{{ $randomID }}.{{ $mainFileFormat[$randomID] }}" 
                                class="img-fluid-product-detail radius-img" 
                                alt="{{ $shopMainTitle }}-{{ $productsAllBasicData[$randomID]['type']['main'] }}/{{ $productsAllBasicData[$randomID]['type']['sub'] }}" 
                                title="{{ $shopMainTitle }}-{{ $productsAllBasicData[$randomID]['type']['main'] }}/{{ $productsAllBasicData[$randomID]['type']['sub'] }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection