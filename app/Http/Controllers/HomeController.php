<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Product\Basic\ProductBasicController;
use App\Http\Controllers\Shop\News\ShopNewsController;
use App\Http\Model\Shop\Basic\ShopBasic;
use App\Http\Model\Shop\Basic\ShopSubService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',$this->getHomePageData());
    }

    public function getHomePageData(){
        /**各頁面基本資料設定 */
        $productBasic = new ProductBasicController();
        $shopNewsBasic = new ShopNewsController();
        $headerData = $productBasic->getHeaderBasicData();
        $block1Data = $productBasic->getJoinUsBlockData();
        $footerData = $productBasic->getFooterBasicData();
        $navBarItemData = $productBasic->getNavBarItemData();
        $homePageName = $navBarItemData['homePage'];
        $subTitle = '登入頁';
        $isLogin = false;
        if(Auth::check()){
            $isLogin = true;
            $subTitle = Auth::user()->name;
        }
        $bannerSubTitle = ['回首頁', $subTitle];
        /**各頁面基本資料設定 */

        /**首頁Banner文字資料 */
        $homeBannerContext = [	
            [
                "homeBannerMainTitle" => "您在找我嗎?",
                "homeBannerSubTitle" => "毛小孩專區",
                "homeBannerPicName" => "bg_0.jpg",
                "productKind" =>[
                    ["kindName" => "主食項目", "kindDesc" => "5 大品牌"],
                    ["kindName" => "零食選擇", "kindDesc" => "10 大種類"],
                    ["kindName" => "能量補給", "kindDesc" => "多種樣式"],
                    ["kindName" => "消耗用品", "kindDesc" => "沐浴清潔"],
                    ["kindName" => "我的金窩", "kindDesc" => "各式床窩"],
                    ["kindName" => "玩樂用品", "kindDesc" => "耐咬玩具"]
                ],
                "linkPathDesc1"=> "了解更多產品",
                "linkPathDesc2"=> "觀看商品列表"
            ],
            [
                "homeBannerMainTitle" => "魚兒水中游...",
                "homeBannerSubTitle" => "水族世界",
                "homeBannerPicName" => "bg_2.jpg",
                "productKind" =>[
                    ["kindName" => "我的主食", "kindDesc" => "4 大品牌"],
                    ["kindName" => "保健藥品", "kindDesc" => "維持健康"],
                    ["kindName" => "過濾器材", "kindDesc" => "各式選擇"],
                    ["kindName" => "各式水缸", "kindDesc" => "多種尺寸"],
                    ["kindName" => "水族造景", "kindDesc" => "水草假石"],
                    ["kindName" => "照明器具", "kindDesc" => "多種亮度"]
                ],
                "linkPathDesc1"=> "了解更多產品",
                "linkPathDesc2"=> "觀看商品列表"
            ],
            [
                "homeBannerMainTitle" => "可愛世界在這邊~",
                "homeBannerSubTitle" => "鳥兒 & 鼠鼠",
                "homeBannerPicName" => "bg_3.jpg",
                "productKind" =>[
                    ["kindName" => "專用飼料", "kindDesc" => "各大品牌"],
                    ["kindName" => "餵養器具", "kindDesc" => "各種材質"],
                    ["kindName" => "鳥鼠一窩", "kindDesc" => "各種尺寸"],
                    ["kindName" => "一起走吧", "kindDesc" => "特色攜包"],
                    ["kindName" => "伸展台", "kindDesc" => "各種站架"],
                    ["kindName" => "玩樂用具", "kindDesc" => "方便輕巧"]
                ],
                "linkPathDesc1"=> "了解更多產品",
                "linkPathDesc2"=> "觀看商品列表"
            ],
            [
                "homeBannerMainTitle" => "為他們找個家...",
                "homeBannerSubTitle" => "請認養代替購買!",
                "homeBannerPicName" => "bg_4.jpg",
                "productKind" =>[
                    ["kindName" => "巧虎", "kindDesc" => "可愛憐人"],
                    ["kindName" => "小白", "kindDesc" => "活潑好動"],
                    ["kindName" => "黑皮", "kindDesc" => "聰明聽話"],
                    ["kindName" => "來福", "kindDesc" => "忠厚顧家"],
                    ["kindName" => "咪咪", "kindDesc" => "貪吃可愛"],
                    ["kindName" => "庫巴", "kindDesc" => "貼心穩定"]
                ],
                "linkPathDesc1"=> "如何幫到他們?",
                "linkPathDesc2"=> "了解更多..."
            ]
        ];
        /**首頁Banner文字資料 */

        /**首頁區塊1相關資料 */
        $shopBasicData = ShopBasic::first();
        $mainSection1Data = [
            "購物展示",
            "店面介紹影片",
            "觀看我們店面影片"
        ];
        $featureItem = [
            "我們有舒適明亮的購物空間、動線指引!",
            "我們有專業的解說人員為您服務!",
            "我們有合理的價格與產品服務!"
        ];
        /**首頁區塊1相關資料 */

        /**首頁區塊2相關資料 */
        $productCollection = $productBasic->getProductCollection();
        /**首頁區塊2相關資料 */

        /**首頁區塊3相關資料 */
        $section3Title = '顧客回饋';
        $mainSection3Data = [
            "mainTitle" => '<h2 class="mb-4">顧客有話說</h2>',
            "subTitle" =>'<p>來看看曾經光顧的貴賓們，對花園有什麼寶貴回饋吧... </p>',
            "customerFeedback" =>[
                [
                    "feedbackContent" => '<p class="mb-5">來店面買我們家毛小孩用品時，發現店面井然有序<br>店員們也很有耐心地為我解說所需的清潔工具，順便也了解正確的使用方式!&nbsp;大推!</p>', 
                    "customerName" => '<p class="name">李大維</p>',
                    "occupation" => '<span class="position">顧客</span>'
                ],
                [
                    "feedbackContent" => '<p class="mb-5">其實最近診所很多的毛媽毛爸都在問我有沒有推薦的營養補充品<br>想不到某天下午的光顧，讓我多知道原來附近還有一家相關補充品的好店家!<br>值得推薦!', 
                    "customerName" => '<p class="name">林超群</p>',
                    "occupation" => '<span class="position">獸醫師</span>'
                ],
                [
                    "feedbackContent" => '<p class="mb-5">看到"天竺鼠車車"的動畫好心動喔<br>於是因緣際會下，透過到朋友介紹來到這裡!<br>哇~好多可愛的小窩窩跟玩具!&nbsp;我們家的micky不用煩惱啦~</p>', 
                    "customerName" => '<p class="name">陳小姐</p>',
                    "occupation" => '<span class="position">小資族</span>'
                ],
                [
                    "feedbackContent" => '<p class="mb-5">正在煩惱要用什麼尺寸的魚缸給客戶時...<br>意外出現"祕密花園"的廣告!<br>好奇之下，到他們店面了解，才知道他們也有幫忙訂製特殊尺寸的造景缸!<br>甚至不常見的熱帶水草...<br>太棒了!我又多個選擇!</p>', 
                    "customerName" => '<p class="name">王麗敏</p>',
                    "occupation" => '<span class="position">水族造景師</span>'
                ]
            ]
        ];
        /**首頁區塊3相關資料 */

        /**首頁區塊4相關資料 */
        $section4Title = '我們的服務';
        $mainSection4Title = '<h3 class="heading">'.$section4Title.'</h3>';
        $subSerivce = ShopSubService::all();
        /**首頁區塊4相關資料 */

        /**首頁區塊5相關資料 */
        $section5Title = '最新秘密花園消息';
        $mainSection5Title = '<h2 class="mb-4">'.$section5Title.'</h2>';
        $mainSection5Data = [
            "subTitle" =>[
                '<p class="mb-2">您在關注我們嗎?</p>',
                '<p class="mb-2">有什麼好康折扣的呢?</p>',
                '<p class="mb-2">或是取得教學課程內容?</p>'
            ]
        ];
        $shopNewsBasicData = $shopNewsBasic->getShopNewsBasicData();
        /**首頁區塊5相關資料 */

        $contentData=[
            'isLogin' =>$isLogin,
            'navMainTitle' => $footerData[2]['item_data'][0],
            'navLinkagePath' => $footerData[2]['item_data'][1],
            'homePageName' => $homePageName,
            'shopBasicDescription' => $headerData['shopBasicDescription'],
            'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
            'pageTitle'=>'Pet\'s Secret Garden',
            'shopMainTitle'=>'祕密花園',
            'shopSubTitle'=>'寵物生活會館',
            'bannerMainTitle' => '會員專區',
            'bannerSubTitle' => $bannerSubTitle,
            'homeBannerContext' =>$homeBannerContext,
            'shopBasicData' => $shopBasicData,
            'block1Data' => $block1Data,
            'mainSection1Data' => $mainSection1Data,
            'featureItem' =>$featureItem,
            'productCollection' => $productCollection,
            'collectionLinkage' => '了解更多',
            'section3Title' => $section3Title,
            'mainSection3Data' => $mainSection3Data,
            'section4Title' => $section4Title,
            'mainSection4Title' =>$mainSection4Title,
            'subSerivce' =>$subSerivce,
            'section5Title' => $section5Title,
            'mainSection5Title' =>$mainSection5Title,
            'mainSection5Data' =>$mainSection5Data,
            'section5Linkage' => '請進入了解',
            'shopNewsBasicData' => $shopNewsBasicData,
            'footerData' => $footerData
       ];

       return $contentData;
    }
}
