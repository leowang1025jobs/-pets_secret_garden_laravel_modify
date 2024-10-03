<?php
     namespace App\Http\Controllers\Product\Basic;

     use App\Http\Controllers\Controller as ParentController;

     class ProductBasicController extends ParentController{
          public function displayProducts(){
               $headerData = $this->getHeaderBasicData();
               $navBarItemData = $this->getNavBarItemData();
               $homePageName = $navBarItemData['homePage'];
               
               $bannerSubTitle = ['回首頁', '花園熱銷商品'];

               $productIntro = [
                    'main_title' => '歡迎瀏覽花園的商品! 我們有...',
                    'intro_item' => [
                         '各式貓狗飼料、純手做的乾/溼式零食',
                         '各式觀賞魚飼料、活餌',
                         '各式鳥類飼料',
                         '貓貓、狗狗的床窩、抓板',
                         '美麗的水草與照景設備',
                         '超耐玩玩具、訓練用玩具'
                    ]
               ];

               //取得商品項目資料
               $productCollection = $this->getProductCollection();

               $block1Data = $this->getJoinUsBlockData();
               $footerData = $this->getFooterBasicData();

               $contentData=[
                    'navMainTitle' => $footerData[2]['item_data'][0],
                    'navLinkagePath' => $footerData[2]['item_data'][1],
                    'homePageName' => $homePageName,
                    'shopBasicDescription' => $headerData['shopBasicDescription'],
                    'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
                    'pageTitle'=>'Pet\'s Secret Garden',
                    'shopMainTitle'=>'祕密花園',
                    'shopSubTitle'=>'寵物生活會館',
                    'bannerMainTitle' => '商品瀏覽',
                    'bannerSubTitle' => $bannerSubTitle,
                    'productIntro' => $productIntro,
                    'productCollection' => $productCollection,
                    'collectionLinkage' => '了解更多',
                    'block1Data' => $block1Data,
                    'footerData' => $footerData
               ];

               return view('product.basic.displayProducts',$contentData);
          }

          public function getProductCollection(){
               $productCollection = [
                    1 => [
                         'type' => '精緻狗糧、飼料',
                         'brand_name' => ['希爾思', '寶多福', '寶路', '西莎', '博士巧思'],
                         'storage_qty' => [12, 10, 10, 7, 5],
                         'img_name' => 'image_1.png'
                    ],
                    [
                         'type' => '精緻貓糧、飼料',
                         'brand_name' => ['皇家', '希爾思', '西莎', '寶路', '博士巧思'],
                         'storage_qty' => [15, 12, 12, 8, 8],
                         'img_name' => 'image_2.png'
                    ],
                    [
                         'type' => '手作美味零食',
                         'brand_name' => ['肉乾', '肉條', '餅乾', '脆片', '魚鬆'],
                         'storage_qty' => [15, 12, 10, 10, 5],
                         'img_name' => 'image_3.jpg'
                    ],
                    [
                         'type' => '觀賞魚飼料、活餌',
                         'brand_name' => ['海豐', '福壽', 'Hirkari', 'AQUAFUN', '其他活餌'],
                         'storage_qty' => [13, 11, 8, 8, 5],
                         'img_name' => 'image_4.jpg'
                    ],
                    [
                         'type' => '各種鳥類飼料',
                         'brand_name' => ['Whitte Molen', 'AQUAFUN', 'Pet Best', '偉特', '蘭亞仕'],
                         'storage_qty' => [15, 13, 10, 8, 5],
                         'img_name' => 'image_5.png'
                    ],
                    [
                         'type' => '貓、狗用床窩',
                         'brand_name' => ['犬用中小型', '犬用大型', '貓通用型', '貓用加大', '特殊床墊'],
                         'storage_qty' => [15, 10, 20, 10, 10],
                         'img_name' => 'image_6.jpg'
                    ],
                    [
                         'type' => '各種樣式水草',
                         'brand_name' => ['水蘭類', '有莖類', '榕類', '椒草類', '水生蕨類'],
                         'storage_qty' => [18, 17, 15, 13, 8],
                         'img_name' => 'image_7.jpg'
                    ],
                    [
                         'type' => '水族造景器具',
                         'brand_name' => ['浮木', '石材', '貝殼', '陶瓷品', '底砂'],
                         'storage_qty' => [13, 10, 10, 8, 5],
                         'img_name' => 'image_8.jpg'
                    ],
                    [
                         'type' => '趣味、訓練用玩具',
                         'brand_name' => ['啃咬/發聲', '拋接/互動', '益智/訓練', '逗貓用', '貓跳台'],
                         'storage_qty' => [18, 15, 15, 10, 10],
                         'img_name' => 'image_9.jpg'
                    ]
               ];

               return $productCollection;
          }

          public function displayProductDetail($productID){
               $headerData = $this->getHeaderBasicData();
               $block1Data = $this->getJoinUsBlockData();
               $footerData = $this->getFooterBasicData();
               $navBarItemData = $this->getNavBarItemData();
               $homePageName = $navBarItemData['homePage'];
               $mainFileFormat =[
                    1=> 'png', 'png', 'jpg', 'jpg', 'png', 'jpg', 'jpg', 'jpg', 'jpg'
               ];
               $randomProductsIDArr = array();

               $productsMainType = [1 => '狗狗用品','貓咪用品', '水族用品', '鳥禽用品', '寵物鼠用品'];
               $productsSubType = [1 => '主食類', '零食類', '營養保健', '消耗用品', '起居用品', '訓練器材', '造景材料', '其他用品'];
               
               $productsDataTitle = [
                    'suitable' => '適合對象',
                    'feature' => '特色',
                    'weight' => '淨重 (Kg)',
                    'place' => '產地', 
                    'fixedPrice' => '定價',
                    'memberPrice' => '會員價'
               ];

               $productsAllBasicData = [
                    1 => [
                        'name' => '希爾斯(Hill\'s) 成犬飼料(中)',
                        'suitable' => '7歲以上老狗',
                        'feature' => '幫助7歲以上成犬維持消化道平衡',
                        'weight' => 7.5,
                        'place' => '美國', 
                        'fixedPrice' => 1600,
                        'memberPrice' => 1450,
                        'type' => [
                              'main' => $productsMainType[1],
                              'sub' => $productsSubType[1]
                         ]
                    ],
                    [
                         'name' => "法國皇家(ROYAL CANIN) 成貓飼料(大)",
                         'suitable' => '1歲以下幼貓',
                         'feature' => '富含高蛋白、維他命，幫助肌肉成長',
                         'weight' => 15,
                         'place' => '法國', 
                         'fixedPrice' => 2800,
                         'memberPrice' => 2680,
                         'type' => [
                              'main' => $productsMainType[2],
                              'sub' => $productsSubType[1]
                         ]
                    ],
                    [
                         'name' => '精緻手作肉乾(包)',
                         'suitable' => '喜好有嚼勁的狗狗',
                         'feature' => '低脂雞胸肉製作，營養價值豐富',
                         'weight' => 0.4,
                         'place' => '台灣', 
                         'fixedPrice' => 150,
                         'memberPrice' => 135,
                         'type' => [
                              'main' => $productsMainType[1],
                              'sub' => $productsSubType[2]
                         ]
                    ],
                    [
                          'name' => '福壽牌-豐年蝦塊罐裝',
                          'suitable' => '淡海水小型魚、魚苗等各式小魚',
                          'feature' => '營養均衡的天然餌料',
                          'weight' => 0.2,
                          'place' => '台灣', 
                          'fixedPrice' => 150,
                          'memberPrice' => 135,
                          'type' => [
                              'main' => $productsMainType[3],
                              'sub' => $productsSubType[1]
                         ]
                    ],
                    [
                         'name' => '偉特(Witte molen) 小型鸚鵡飼料',
                         'suitable' => '熱帶鳥類(虎皮、橫斑、小鸚、各類小型鸚鵡)',
                         'feature' => '富含高蛋白、維他命，幫助肌肉成長',
                         'weight' => 1,
                         'place' => '荷蘭', 
                         'fixedPrice' => 320,
                         'memberPrice' => 300,
                         'type' => [
                              'main' => $productsMainType[4],
                              'sub' => $productsSubType[1]
                         ]
                    ],
                    [
                         'name' => '舒芬(Soften) 貓用柔暖寵物窩',
                         'suitable' => '任何體型貓咪、小型犬皆可',
                         'feature' => '透氣舒適、保暖柔暖',
                         'weight' => 1.2,
                         'place' => '台灣', 
                         'fixedPrice' => 540,
                         'memberPrice' => 500,
                         'type' => [
                              'main' => $productsMainType[2],
                              'sub' => $productsSubType[5]
                         ]
                    ],
                    [
                         'name' => '綠菊花草(3株)',
                         'suitable' => '強光且溫度不太高的環境',
                         'feature' => '容易栽種，抗藻類生長',
                         'weight' => 'N/A',
                         'place' => '台灣', 
                         'fixedPrice' => 20,
                         'memberPrice' => 15,
                         'type' => [
                              'main' => $productsMainType[3],
                              'sub' => $productsSubType[7]
                         ]
                    ],
                    [
                         'name' => '海底造景組(包)',
                         'suitable' => '欲將水族環境打造成海底模樣',
                         'feature' => '有海星、扇貝等海底生物等樣式',
                         'weight' => 0.8,
                         'place' => '台灣', 
                         'fixedPrice' => 250,
                         'memberPrice' => 225,
                         'type' => [
                              'main' => $productsMainType[3],
                              'sub' => $productsSubType[7]
                         ]
                    ],
                    [
                         'name' => '牛皮綜合潔牙骨(大)', 
                         'suitable' => '任何犬型皆適用',
                         'feature' => '天然無毒，為牛皮高溫製成', 
                         'weight' => 1.5,
                         'place' => '台灣', 
                         'fixedPrice' => 260,
                         'memberPrice' => 248,
                         'type' => [
                              'main' => $productsMainType[1],
                              'sub' => $productsSubType[2]
                         ]
                    ]
               ];

               $i=1;
               while($i <= 4) { 
                    $i++;
                    $randomID = rand(1, 9);
                    if($randomID != intval($productID) && !in_array($randomID, $randomProductsIDArr)){
                         array_push($randomProductsIDArr, $randomID);
                    }

                    if(count($randomProductsIDArr) < 4) {
                         $i = 1;
                    }else if(count($randomProductsIDArr) == 4){
                         break;
                    }
               }

               $contentData=[
                    'navMainTitle' => $footerData[2]['item_data'][0],
                    'navLinkagePath' => $footerData[2]['item_data'][1],
                    'homePageName' => $homePageName,
                    'shopBasicDescription' => $headerData['shopBasicDescription'],
                    'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
                    'pageTitle'=>'Pet\'s Secret Garden',
                    'shopMainTitle'=>'祕密花園',
                    'shopSubTitle'=>'寵物生活會館',
                    'backToHomePage' => '回首頁',
                    'bannerMainType' => '花園熱銷商品',
                    'bannerMainTitle' => '商品特色',
                    'bannerSubTitle' =>'商品介紹',
                    'broswerProducts' =>'商品瀏覽',
                    'productID' => $productID,
                    'productsDataTitle'=> $productsDataTitle,
                    'productsAllBasicData'=> $productsAllBasicData,
                    'mainFileFormat' => $mainFileFormat,
                    'randomProductsIDArr' => $randomProductsIDArr,
                    'orderProduct' => '訂購此商品',
                    'block1Data' => $block1Data,
                    'footerData' => $footerData
               ];

               return view('product.basic.displayProductDetail', $contentData);
          }

          public function getHeaderBasicData(){
               $description = '祕密花園是專營毛小孩與其他寵物的用品專賣,包含小寶貝吃、玩、住的各種產品的小百貨,地址位於彰化縣彰化市卦山路18號,歡迎各位蒞臨!';
               $keyWordsArr = json_decode('["祕密花園","毛小孩","貓","狗","水族","鳥","天竺鼠","飼料","手作零食","玩具"]');
               $keywordsStr = '';
               foreach ($keyWordsArr as $keyWords) {
                    $keywordsStr .= $keyWords;
               }

               $headerBasicData['shopBasicDescription'] = $description;
               $headerBasicData['shopBasicKeywords'] = $keywordsStr;

               return $headerBasicData;
          }

          public function getJoinUsBlockData(){
               $blockData = [
                    'main_title' => '加入我們',
                    'sub_title_1' =>'想成為花園的一份子嗎?',
                    'sub_title_2' =>'歡迎您的加入!'
               ];

               return $blockData;
          }

          public function getFooterBasicData(){
               $navBarItemData = $this->getNavBarItemData();
               $navMainTitle = $navBarItemData['mainTitle'];
               $navLinkagePath = $navBarItemData['linkagePath'];

               $newsCollection =[1=>
                    [
                         'title' => nl2br('寵物行為學習課程來了!'),
                         'date' => '07/13/2023',
                         'auth' => '花園園長',
                         'msg_qty' => 30,
                         'photo_name' => 'animal_training.jpg',
                         'sort' => '行為訓練'
                    ],
                    [
                         'title' => nl2br('夏天到了!<br>您的毛小孩有掉毛的困惱嗎?'),
                         'date' => '07/11/2023',
                         'auth' => '花園園長',
                         'msg_qty' => 22,
                         'photo_name' => 'dog_shedding.jpg',
                         'sort' => '清潔照顧'
                    ],
                    [
                         'title' => nl2br('開幕大回饋!<br>全館最低85折!'),
                         'date' => '06/30/2023',
                         'auth' => '花園園長',
                         'msg_qty' => 19,
                         'photo_name' => 'opening.jpg',
                         'sort' => '花園好康'
                    ]
               ];

               $shopBasicCollection =[
                    [
                         'address' => '500 彰化縣彰化市卦山路18號',
                         'phone' => '0963-03784',
                         'e_mail' => 'leowang1025jobs@gmail.com'
                    ]
               ];

               $footerBasicData = [
                    [
                         'item_title' => '祕密花園',
                         'item_data' => ['無論是家裡的毛小孩們、漫遊水中的魚兒，
                         或者是具有特色的寵物小夥伴們，這裡將會是來了就不想回家的秘密天地，
                         趕緊跟爸爸媽媽一起來找尋您們的最愛']
                    ],
                    [
                         'item_title' => '最新花園消息',
                         'item_data' => $newsCollection
                    ],
                    [
                         'item_title' => '花園導覽',
                         'item_data' => [$navMainTitle, $navLinkagePath]
                    ],
                    [
                         'item_title' => '有任何問題嗎?',
                         'item_data' => $shopBasicCollection
                    ]
               ];

               return $footerBasicData;
          }

          public function getNavBarItemData(){
               $navBarItemData = [
                    'homePage' => '首頁',
                    'mainTitle' => [
                         1 => '秘密花園首頁',
                         '關於祕密花園',
                         '花園熱銷商品',
                         '最新花園消息',
                         '聯絡秘密花園'
                    ],
                    'linkagePath' => [
                         1 => '/',
                         '/shop/about',
                         '/product',
                         '/news',
                         '/shop/contact'
                    ]
               ];

               return $navBarItemData;
          }
     }
?>