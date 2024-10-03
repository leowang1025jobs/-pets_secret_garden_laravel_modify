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
                <p class="breadcrumbs"><span class="mr-2"><a href="/">{{ $bannerSubTitle[0] }}</a></span> <span>{{ $bannerSubTitle[1] }}</span></p>
                <h1 class="mb-5 bread">{{ $bannerMainTitle }}</hs1>
            </div>
        </div>
    </div>
</section>
<!-- END slider -->

<section class="ftco-section-2">
    <div class="container-fluid">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 d-flex align-items-center heading-section ftco-animate bg-light">
                <div class="col-md-9">
                <!--商品主頁-導覽說明-->
                <div class="p-5">
                    <h2 class="mb-4">{{ $productIntro['main_title'] }}</h2>
                    @foreach ($productIntro['intro_item'] as $intro)
                        <p>{{ $intro }}</p>
                    @endforeach
                </div>
                <!--商品主頁-導覽說明-->
                </div>
            </div>
                <!--商品展示項目 -->
                @foreach ($productCollection as $index1 => $item)
                    <div class="col-md-3 model-entry ftco-animate">
                        <div class="model-img" style="background-image: url(/assets/images/{{ $item['img_name'] }});" alt="秘密花園-精緻狗糧、飼料" title="秘密花園-精緻狗糧、飼料">
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
                <!--商品展示項目 -->
            <div class="col-md-3 d-flex justify-content-center align-items-center bg-light ftco-animate">
                <div class="btn-view">
                    <p><a href="/product/1">{{ $collectionLinkage }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection