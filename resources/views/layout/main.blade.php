<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{ $shopBasicDescription }}">
        <meta name="keywords" content="{{ $shopBasicKeywords }}">
    
        <link rel="icon" href="/assets/images/icon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/animate.css">
    
        <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    
        <link rel="stylesheet" href="/assets/css/aos.css">
    
        <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    
        <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="/assets/css/jquery.timepicker.css">
    
    
        <link rel="stylesheet" href="/assets/css/flaticon.css">
        <link rel="stylesheet" href="/assets/css/icomoon.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <div class="page">
            <!--右側隱藏式導覽列-->
            <nav id="colorlib-main-nav" role="navigation" class="mt-5">
                <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
                <div class="js-fullheight colorlib-table">
                    <div class="img" style="background-image: url(/assets/images/bg_1.jpg);" alt="{{ $shopMainTitle }}-{{ $homePageName }}" title="{{ $shopMainTitle }}-{{ $homePageName }}"></div>
                    <div class="colorlib-table-cell js-fullheight">
                        <div class="row no-gutters">
                            <div class="col-md-12 text-center">
                                <h1 class="mb-4">
                                    <div class="row">
                                        <div class="col-sm-5 col-md-4"></div>
                                        <div class="col-sm-7 col-md-8">
                                            <a href="/" class="logo text-left">
                                                <img src="/assets/images/icon.png" alt="{{ $shopMainTitle }}-{{ $homePageName }}" title="{{ $shopMainTitle }}-{{ $homePageName }}" class="mr-3 mb-2" style="max-width: 6%;">{{ $shopMainTitle }}<br>
                                                <span class="ml-5">{{ $shopSubTitle }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </h1>
                                <ul>
                                    @foreach ($navMainTitle as $index => $titleName)
                                        <li class="ml-5 pl-4">
                                            <a href="{{ $navLinkagePath[$index] }}">
                                                <span><small>0{{ $index }}</small>{{ $titleName }}</span> <!--導覽列標題-->
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!--右側隱藏式導覽列-->
            <!--頁面主要內容 開始-->
            <div id="colorlib-page">
                @yield('main-display')
                <!--"招兵買馬(Join Us)"訊息區塊 開始-->
                <section class="ftco-quote ftco-animate">
                    <div class="container mt-5">
                        <div class="row d-flex">
                            <div class="col-md-9 req-quote py-5 align-items-center img radius-img" style="background-image: url(/assets/images/join_us.jpg);">
                                <h3 class="ml-md-3 " style="color: #00cc44; " 
                                alt="{{ $shopMainTitle }}-{{ $block1Data['main_title'] }}" 
                                title="{{ $shopMainTitle }}-{{ $block1Data['main_title'] }}">
                                    {{ $block1Data['sub_title_1'] }}
                                </h3>
                                <span class="ml-md-3 "><a href="# ">{{ $block1Data['sub_title_2'] }}</a></span>
                            </div>
                        </div>
                    </div>
                </section>
                <!--"招兵買馬(Join Us)"訊息區塊 結束-->
                <!--頁尾內容 開始-->
                <footer class="ftco-footer ftco-section img ">
                    <div class="overlay "></div>
                    <div class="container ">
                        <div class="row mb-5 ">
                            <div class="col-md-3 ">
                                <!--頁尾左側:祕密花園簡介-->
                                <div class="ftco-footer-widget mb-4 ">
                                    <h2 class="ftco-heading-2 ">{{ $footerData[0]['item_title'] }}</h2>
                                    <p>{{ $footerData[0]['item_data'][0] }}</p>
                                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5 ">
                                        <li class="ftco-animate "><a href="# "><span class="icon-twitter "></span></a></li>
                                        <li class="ftco-animate "><a href="# "><span class="icon-facebook "></span></a></li>
                                        <li class="ftco-animate "><a href="# "><span class="icon-instagram "></span></a></li>
                                    </ul>
                                </div>
                                <!--頁尾左側:祕密花園簡介-->
                            </div>
                            <div class="col-md-4 ">
                                <!--頁尾中間:最新消息-->
                                <div class="ftco-footer-widget mb-4 ">
                                    <h2 class="ftco-heading-2">{{ $footerData[1]['item_title'] }}</h2>
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
                                <!--頁尾中間:最新消息-->
                            </div>
                            <div class="col-md-2 ">
                                <!--頁尾中間:導覽列項目-->
                                <div class="ftco-footer-widget mb-4 ml-md-4 ">
                                    <h2 class="ftco-heading-2 ">{{ $footerData[2]['item_title'] }}</h2>
                                    <ul class="list-unstyled">
                                        @foreach ($footerData[2]['item_data'][0] as $index => $title)
                                            <li><a href="{{ $footerData[2]['item_data'][1][$index] }}" class="py-2 d-block">{{ $title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--頁尾中間:導覽列項目-->
                            </div>
                            <div class="col-md-3 ">
                                <!--頁尾右側:聯絡方式-->
                                <div class="ftco-footer-widget mb-4 ">
                                    <h2 class="ftco-heading-2 ">{{ $footerData[3]['item_title'] }}</h2>
                                    <div class="block-23 mb-3 ">
                                        <ul>
                                            <li><span class="icon icon-map-marker "></span><span class="text ">{{ $footerData[3]['item_data'][0]['address'] }}</span></li>
                                            <li><a href="# "><span class="icon icon-phone "></span><span class="text ">{{ $footerData[3]['item_data'][0]['phone'] }}</span></a></li>
                                            <li><a href="# "><span class="icon icon-envelope "></span><span class="text ">{{ $footerData[3]['item_data'][0]['e_mail'] }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--頁尾右側:聯絡方式-->
                            </div>
                        </div>
                    </div>
                </footer>
                <!--頁尾內容 結束-->

                <!-- loader 開始-->
                <div id="ftco-loader" class="show fullscreen ">
                    <svg class="circular " width="48px " height="48px "><circle class="path-bg " cx="24 " cy="24 " r="22 " fill="none " stroke-width="4 " stroke="#eeeeee "/>
                        <circle class="path" cx="24" cy="24" r="22" fill="none " stroke-width="4 " stroke-miterlimit="10 " stroke="#F96D00 "/>
                    </svg>
                </div>
                <!-- loader 結束-->
            </div>
            <!--頁面主要內容 結束-->
            <!-- Modal 開始-->
            <div class="modal fade " id="modalRequest " tabindex="-1 " role="dialog " aria-labelledby="modalRequestLabel " aria-hidden="true ">
                <div class="modal-dialog " role="document ">
                    <div class="modal-content ">
                        <div class="modal-header ">
                            <h5 class="modal-title " id="modalRequestLabel ">Request a Quote</h5>
                            <button type="button " class="close " data-dismiss="modal " aria-label="Close ">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                        </div>
                        <div class="modal-body ">
                            <form action="# ">
                                <div class="form-group ">
                                    <label for="appointment_name " class="text-black ">Full Name</label>
                                    <input type="text " class="form-control " id="appointment_name ">
                                </div>
                                <div class="form-group ">
                                    <label for="appointment_email " class="text-black ">Email</label>
                                    <input type="text " class="form-control " id="appointment_email ">
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <label for="appointment_date " class="text-black ">Date</label>
                                            <input type="text " class="form-control " id="appointment_date ">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <label for="appointment_time " class="text-black ">Time</label>
                                            <input type="text " class="form-control " id="appointment_time ">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="appointment_message " class="text-black ">Message</label>
                                    <textarea name=" " id="appointment_message " class="form-control " cols="30 " rows="10 "></textarea>
                                </div>
                                <div class="form-group ">
                                    <input type="submit " value="Send Message " class="btn btn-primary ">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal 結束-->
        </div>

        <script src="/assets/js/jquery.min.js "></script>
        <script src="/assets/js/jquery-migrate-3.0.1.min.js "></script>
        <script src="/assets/js/popper.min.js "></script>
        <script src="/assets/js/bootstrap.min.js "></script>
        <script src="/assets/js/jquery.easing.1.3.js "></script>
        <script src="/assets/js/jquery.waypoints.min.js "></script>
        <script src="/assets/js/jquery.stellar.min.js "></script>
        <script src="/assets/js/owl.carousel.min.js "></script>
        <script src="/assets/js/jquery.magnific-popup.min.js "></script>
        <script src="/assets/js/aos.js "></script>
        <script src="/assets/js/jquery.animateNumber.min.js "></script>
        <script src="/assets/js/scrollax.min.js "></script>
        <script src="/assets/js/bootstrap-datepicker.js "></script>
        <script src="/assets/js/jquery.timepicker.min.js "></script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false "></script>
        <script src="/assets/js/google-map.js "></script> -->
        <script src="/assets/js/main.js "></script>
        <script type="text/javascript">
            $(function(){
                $("#btn_register").on("click", function () {
                    location.href = "/register";
                });
                $("#btn_remember").on("click", function () {
                    $("#remember").attr("checked", true);
                    $(this).css("background-color", "#dc3545");
                    $(this).css("color", "#fff");
                    $(this).attr("class", "btn btn-outline-danger w-100");
                });
            });
        </script>
    </body>
</html>