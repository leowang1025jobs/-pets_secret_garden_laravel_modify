@extends('layout.main')
@section('pageTitle', $pageTitle)
@section('main-display')
<header>
     <div class="colorlib-navbar-brand">
          <a class="colorlib-logo" style="color: #00cc44;" href="/"><img src="/assets/images/icon.png" width="6%" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" class="mr-3 mb-2">{{ $shopMainTitle }}<br><span class="ml-5 pl-3">{{ $shopSubTitle }}</span></a>
     </div>
     <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
</header>

<section class="hero-wrap" style="background-image: url(/assets/images/other_banner_bg.jpg);" data-stellar-background-ratio="0.5" alt="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" title="{{ $shopMainTitle }}-{{ $bannerMainTitle }}" class="mr-3 mb-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters text align-items-end justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="/">{{ $bannerSubTitle[0] }}</a>  <!--回首頁-->
                    </span>
                    <span class="mr-2">
                        <a href="/news">{{ $bannerSubTitle[1] }}</a></span> <!--最新花園消息-->
                    <span>{{ $bannerSubTitle[2] }}</span> <!--消息內容-->
                </p>
                <h1 class="mb-5 bread">{{ $bannerMainTitle }}</h1> <!--好康爆爆-->
            </div>
        </div>
    </div>
</section>
<!-- END slider -->

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
                {!! $newsContent !!} <!--消息文章內容-->
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        @foreach ($newsTags as $newsTag)
                            <a href="#" class="tag-cloud-link">{{ $newsTag }}</a> <!--消息文章標籤-->
                        @endforeach
                    </div>
                </div>

                <div class="about-author d-flex p-5 bg-light">
                    <div class="bio align-self-md-center">
                        <img src="/assets/images/gardener.png" alt="Image placeholder" class="img-fluid mb-4" style="width: 55%;">
                    </div>
                    <div class="desc align-self-md-center">
                        <h3>{{ $newsAuth['name'] }}</h3><!--消息文章作者: 名稱-->
                        {!! $newsAuth['introduction'] !!}<!--消息文章作者: 簡介-->
                    </div>
                </div>


                <div class="pt-5 mt-5">
                    <!--消息文章回覆區起始-->
                    <h3 class="mb-5">{{ $replymentsQty }}</h3><!--消息文章回覆總篇數-->
                    <ul class="comment-list">
                        @foreach ($newsReplyments as $replyment)
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="/assets/images/{{ $replyment['picture_file_name'] }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>{{ $replyment['user_basic']['name'] }}</h3><!--消息文章主回覆: 回覆(使用)者顯示名稱-->
                                    <div class="meta">{{ $replyment['reply_date'] }}</div><!--消息文章主回覆: 回覆時間-->
                                    <p>
                                        {!! $replyment['content'] !!}<!--消息文章主回覆: 回覆內容-->
                                    </p>
                                    <p>
                                        <a href="#" class="reply">{{ $btnReplyment }}</a><!--消息文章主回覆按鈕-->
                                    </p>
                                </div>
                            </li>
                            @if (!empty($replyment['subReplyments']))
                                <ul class="children">
                                    @foreach ($replyment['subReplyments'] as $subReplyments)
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="/assets/images/{{ $subReplyments['picture_file_name'] }}" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>{{ $subReplyments['user_basic']['name'] }}</h3><!--消息文章子回覆: 回覆(使用)者顯示名稱-->
                                                <div class="meta">{{ $subReplyments['reply_date'] }}</div><!--消息文章子回覆: 回覆時間-->
                                                <p>
                                                    {!! $subReplyments['content'] !!}<!--消息文章子回覆: 回覆內容-->
                                                </p>
                                                <p>
                                                    <a href="#" class="reply">{{ $btnReplyment }}</a><!--消息文章子回覆按鈕-->
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </ul>
                    <!--消息文章回覆區結束-->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">{{ $inputComment['main_titile'] }}</h3> <!-- 留言區: 主標題 -->
                        <form action="#" class="p-5 bg-light">
                            @foreach ($inputComment['input'] as $index => $item)
                                <div class="form-group">
                                    @if ($index < 3)
                                        <label for="{{ $item['id'] }}">{{ $item['item_title'] }}</label> <!-- 留言區: 輸入項目標籤 -->
                                        <input type="{{ $item['type'] }}" class="form-control" id="{{ $item['id'] }}"> <!-- 留言區: 輸入項目內容 --> 
                                    @elseif ($index == 3)
                                        <label for="{{ $item['id'] }}">{{ $item['item_title'] }}</label> <!-- 留言區: 輸入項目標籤 -->
                                        <textarea class="form-control" id="{{ $item['id'] }}" cols="30" rows="10"></textarea> <!-- 留言區: 輸入項目內容 -->
                                    @else
                                        <input type="{{ $item['type'] }}" class="btn py-3 px-4 btn-primary" id="{{ $item['id'] }}" value="{{ $item['value'] }}"> <!-- 留言區: 輸入項目內容 -->
                                    @endif
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>

            </div>
            <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>{{ $newsSortMainTitle }}</h3> <!--文章分類:標題-->
                        @foreach ($shopNewsSort as $newsSort)
                        <li>
                            <a href="#">{{ $newsSort['sort'] }} <span>({{ $newsSort['newsQty'] }})</span> <!--文章分類:分類/消息數-->
                            </a>
                        </li>
                        @endforeach
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>{{ $footerData[1]['item_title'] }}</h3> <!--最新花園消息-->
                    @foreach ($footerData[1]['item_data'] as $index => $news)
                    <div class="block-21 mb-4 d-flex ">
                        <a class="blog-img mr-4 radius-img" style="background-image: url(/assets/images/{{ $news['photo_name'] }});" 
                            alt="{{ $shopMainTitle }}-{{ $news['sort'] }}" 
                            title="{{ $shopMainTitle }}-{{ $news['sort'] }}">
                        </a>
                        <div class="text">
                            <h3 class="heading">
                                <a href="/news/{{ $index }}">{!! $news['title'] !!}</a> <!--消息文章: 標題-->
                            </h3>
                            <div class="meta"> 
                                <div><a href="/news/{{ $index }}"><span class="icon-calendar "></span> {{ $news['date']}} </a></div> <!--消息文章: 建立/更新時間-->
                                <div><a href="/news/{{ $index }}"><span class="icon-person "></span> {{ $news['auth']}} </a></div> <!--消息文章: 建立人-->
                                <div><a href="/news/{{ $index }}"><span class="icon-chat "></span> {{ $news['msg_qty']}} </a></div> <!--消息文章: 回覆筆數-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>{{ $favoritetMainTitle }}</h3> <!--熱門搜尋: 標題-->
                    <div class="tagcloud">
                        @foreach ($favoriteNewsSort as $newsSort)
                            <a href="#" class="tag-cloud-link">{{ $newsSort['sort'] }}</a> <!--熱門搜尋: 排行消息分類-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
