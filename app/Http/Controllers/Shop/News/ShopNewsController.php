<?php
     namespace App\Http\Controllers\Shop\News;

     use App\Http\Controllers\Controller as ParentController;
     use App\Http\Controllers\Product\Basic\ProductBasicController;
     use App\Http\Model\User\Basic\UserBasic;
     use App\Http\Model\Shop\News\Basic\NewsBasic;
     use App\Http\Model\Shop\News\Basic\ShopNewsTag;
     use App\Http\Model\Shop\News\Basic\ShopNewsSort;

     class ShopNewsController extends ParentController{
          public function displayNews(){
               /**各頁面基本資料設定 */
               $productBasic = new ProductBasicController();
               $headerData = $productBasic->getHeaderBasicData();
               $block1Data = $productBasic->getJoinUsBlockData();
               $footerData = $productBasic->getFooterBasicData();
               $navBarItemData = $productBasic->getNavBarItemData();
               $homePageName = $navBarItemData['homePage'];
               $bannerSubTitle = ['回首頁', '最新花園消息'];
               /**各頁面基本資料設定 */

               $displayIntro = '關於祕密花園的最新消息看這裡喔!無論是最新好康訊息、寵物照顧或訓練課程，或市面上有推出什麼不錯的產品，在這邊都收的到!';
               $shopNewsBasic = $this->getShopNewsBasicData();

               $contentData=[
                    'navMainTitle' => $footerData[2]['item_data'][0],
                    'navLinkagePath' => $footerData[2]['item_data'][1],
                    'homePageName' => $homePageName,
                    'shopBasicDescription' => $headerData['shopBasicDescription'],
                    'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
                    'pageTitle'=>'Pet\'s Secret Garden',
                    'shopMainTitle'=>'祕密花園',
                    'shopSubTitle'=>'寵物生活會館',
                    'bannerMainTitle' => '花園新鮮事',
                    'bannerSubTitle' => $bannerSubTitle,
                    'displayIntro' => $displayIntro,
                    'shopNewsBasic' => $shopNewsBasic,
                    'block1Data' => $block1Data,
                    'footerData' => $footerData
               ];

               return view('shop.news.displayNews',$contentData);
          }

          public function displayNewsDetail($newsID){
               /**各頁面基本資料設定*/
               $productBasic = new ProductBasicController();
               $headerData = $productBasic->getHeaderBasicData();
               $block1Data = $productBasic->getJoinUsBlockData();
               $footerData = $productBasic->getFooterBasicData();
               $navBarItemData = $productBasic->getNavBarItemData();
               $homePageName = $navBarItemData['homePage'];
               $bannerSubTitle = ['回首頁', '最新花園消息', '消息內容'];
               /**各頁面基本資料設定 */

               $shopNewsBasic = $this->getShopNewsBasicData();
               $shopNewsSort = $this->getShopNewsSort();
               $favoriteNewsSort = $this->getFavoriteNewsSort();

               $newsReplyments = $this->getShopNewsReplyment();
               $replymentsQty = count($newsReplyments);

               // 消息文章回覆的資料處理
               $replyIDArr = [];
               foreach ($newsReplyments as $index => $replyment) {
                    $replymentIDArr = json_decode($replyment['replyment_id']);
                    $tempArr = [];
                    if(!empty($replymentIDArr)){
                         foreach ($replymentIDArr as $replymentID){
                              array_push($tempArr, $this->getShopNewsReplyment($replymentID));
                         }
                         $replyIDArr[$index] = $replymentIDArr;
                    }
                    $newsReplyments[$index]['subReplyments'] = $tempArr;
                    unset($newsReplyments[$index]['replyment_id']);
               }

               foreach ($newsReplyments as $index => $replyment) {
                    foreach($replyIDArr as $IDArr){
                         if(in_array($replyment['id'], $IDArr)){
                              unset($newsReplyments[$replyment['id']]);
                         }    
                    }
               }

               $inputComment = [
                    'main_titile' => '請留下您的想法',
                    'input' => [
                                   [
                                        'id' => 'name',
                                        'item_title' => '姓名 *',
                                        'type' => 'text',
                                        'value' => ''
                                   ],
                                   [
                                        'id' => 'email',
                                        'item_title' => 'E-mail *',
                                        'type' => 'email',
                                        'value' => ''
                                   ],
                                   [
                                        'id' => 'website',
                                        'item_title' => '個人網站',
                                        'type' => 'url',
                                        'value' => ''
                                   ],
                                   [
                                        'id' => 'message',
                                        'item_title' => '您想說的內容',
                                        'type' => '',
                                        'value' => ''
                                   ],
                                   [
                                        'id' => 'submit',
                                        'item_title' => '',
                                        'type' => 'submit',
                                        'value' => '發表您的內容'
                                   ]
                               ]
               ];

               $contentData=[
                    'navMainTitle' => $footerData[2]['item_data'][0],
                    'navLinkagePath' => $footerData[2]['item_data'][1],
                    'homePageName' => $homePageName,
                    'shopBasicDescription' => $headerData['shopBasicDescription'],
                    'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
                    'pageTitle'=>'Pet\'s Secret Garden',
                    'shopMainTitle'=>'祕密花園',
                    'shopSubTitle'=>'寵物生活會館',
                    'bannerMainTitle' => '好康爆爆',
                    'bannerSubTitle' => $bannerSubTitle,
                    'newsContent' => $shopNewsBasic[$newsID]['news_content'],
                    'newsTags' => $shopNewsBasic[$newsID]['shop_news_tag_id'],
                    'newsAuth' => $shopNewsBasic[$newsID]['user_basic'],
                    'newsSortMainTitle' => '文章分類',
                    'shopNewsSort' => $shopNewsSort,
                    'favoritetMainTitle' => '熱門搜尋',
                    'favoriteNewsSort' => $favoriteNewsSort,
                    'replymentsQty' => strval($replymentsQty).' 則發言',
                    'newsReplyments' => $newsReplyments,
                    'btnReplyment' => '回覆',
                    'inputComment' => $inputComment,
                    'block1Data' => $block1Data,
                    'footerData' => $footerData
               ];
               return view('shop.news.displayNewsDetail',$contentData);
          }

          public function getShopNewsBasicData(){
               $shopNewsTags = $this->getShopNewsTags();
               $shopNewsSort = $this->getShopNewsSort();
               $newsBasicData = $this->getNewsBasicData(0);

               $shopNewsBasicData = [1=>
                    [
                         'news_main_title' => $newsBasicData[1]['news_main_title'],
                         'created_at' => '2023-07-13 16:12:50',
                         'user_basic' => $this->getUserBasicData(1),
                         'replyment_qty' => 30,
                         'picture_file_name' => 'animal_training.jpg',
                         'news_content' => $this->getNewsContentsData(2),
                         'shop_news_tag_id' => [
                              $shopNewsTags[1]['name'],
                              $shopNewsTags[2]['name'],
                              $shopNewsTags[3]['name'],
                              $shopNewsTags[4]['name']
                         ],
                         'news_sorts'=> $shopNewsSort[3]
                    ],
                    [
                         'news_main_title' => $newsBasicData[0]['news_main_title'],
                         'created_at' => '2023-07-11 12:00:33',
                         'user_basic' => $this->getUserBasicData(1),
                         'replyment_qty' => 22,
                         'picture_file_name' => 'dog_shedding.jpg',
                         'news_content' => $this->getNewsContentsData(1),
                         'shop_news_tag_id' => [
                              $shopNewsTags[5]['name'],
                              $shopNewsTags[2]['name'],
                              $shopNewsTags[9]['name'],
                              $shopNewsTags[10]['name']
                         ],
                         'news_sorts'=> $shopNewsSort[4]
                    ],
                    [
                         'news_main_title' => $newsBasicData[2]['news_main_title'],
                         'created_at' => '2023-06-30 09:42:37',
                         'user_basic' => $this->getUserBasicData(1),
                         'replyment_qty' => 19,
                         'picture_file_name' => 'opening.jpg',
                         'news_content' => $this->getNewsContentsData(3),
                         'shop_news_tag_id' => [
                              $shopNewsTags[7]['name'],
                              $shopNewsTags[6]['name']
                         ],
                         'news_sorts'=> $shopNewsSort[1]
                         
                    ]
               ];

               return $shopNewsBasicData;
          }

          private function getUserBasicData($userID){
               $userBasicData = UserBasic::where('id', $userID)->select('account', 'name', 'introduction')->get();

               return $userBasicData[0];
          }

          private function getNewsBasicData($newsID = 0){
               if($newsID != 0){
                    $newsBasicData = NewsBasic::where('id', $newsID)->select('news_main_title', 'news_content')->get();
               }else{
                    $newsBasicData = NewsBasic::select('news_main_title', 'news_content')->get();
               }

               return $newsBasicData;
          }

          private function getNewsContentsData($newsID){
               $newsBasicData = $this->getNewsBasicData($newsID);
               $newsContentsData = $newsBasicData[0]['news_content'];

               return $newsContentsData;
          }

          private function getShopNewsReplyment($replymentID = 0){
               $shopNewsReplyment = [
                    1=>
                    [
                         'id' => 6,
                         'content' => nl2br('<p>請問如果是皮膚過敏引起的脫毛，有什麼可以推薦的洗毛精呢?謝謝唷!</p>'),
                         'reply_date' => '2023-07-25 14:15:00',
                         'replyment_id' => '[]',
                         'user_basic' => $this->getUserBasicData(7),
                         'picture_file_name' => 'man.png',
                    ],
                    [
                         'id' => 2,
                         'content' => nl2br('<p>請問家裡的狗狗如果有明顯的毛曩發炎現象，<br>請問除了吃藥的方式，居住環境還有哪些要注意的地方呢?<br>因為每到這個季節，看他不停地抓癢，也是有些心疼呢!<br>再請各位前輩分享您們的心得了!感恩喔!</p>'),
                         'reply_date' => '2023-07-20 09:43:00',
                         'replyment_id' => '[3, 4, 5]',
                         'user_basic' => $this->getUserBasicData(3),
                         'picture_file_name' => 'user.png',
                    ],
                    [
                         'id' => 3,
                         'content' => nl2br('<p>建議您還是帶它請教專業醫生!<br>應該會比較好解決您的問題，總比等待好!</p>'),
                         'reply_date' => '2023-07-21 13:23:00',
                         'replyment_id' => '[]',
                         'user_basic' => $this->getUserBasicData(4),
                         'picture_file_name' => 'woman.png',
                    ],
                    [
                         'id' => 4,
                         'content' => nl2br('<p>我自己家裡也有長毛狗，那時參考文章內的作法與尋求醫生的協助。<br>從飲食到洗毛精的選擇與改善，才逐漸改善它的問題。<br>需要一些時間的，加油啊!</p>'),
                         'reply_date' => '2023-07-22 23:18:00',
                         'replyment_id' => '[]',
                         'user_basic' => $this->getUserBasicData(5),
                         'picture_file_name' => 'user.png',
                    ],
                    [
                         'id' => 5,
                         'content' => nl2br('<p>建議可以從環境、清潔方式去注意...<br>哪裡有不太適合毛小孩的地方?<br>再來就是注意它是否是過敏體質?<br>如果是的話，那就要從飲食去改善了...</p>'),
                         'reply_date' => '2023-07-25 10:11:00',
                         'replyment_id' => '[]',
                         'user_basic' => $this->getUserBasicData(6),
                         'picture_file_name' => 'man.png',
                    ],
                    [
                         'id' => 1,
                         'content' => nl2br('<p>我對家裡的三隻小毛孩，每到夏天總是有這方面的困惱!<br>剛好看到這篇文章，心想先照著做看看吧。<br>想不到試了一個多月，家裡的沙發終於比較不是白雪紛飛的樣子!<br>感謝分享此文!</p>'),
                         'reply_date' => '2023-07-15 18:23:00',
                         'replyment_id' => '[]',
                         'user_basic' => $this->getUserBasicData(2),
                         'picture_file_name' => 'woman.png',
                    ]
               ];

               if($replymentID === 0){
                    return $shopNewsReplyment;
               }else{
                    return $shopNewsReplyment[$replymentID];
               }
          }

          private function getShopNewsTags(){
               $shopNewsTags = ShopNewsTag::select('id', 'name')->get();

               return $shopNewsTags;
          }

          private function getShopNewsSort(){
               $newsSort = ShopNewsSort::select('news_sort')->get();

               for($i = 1; $i<=5; $i++){
                    $shopNewsSort[$i]['sort'] = $newsSort[$i-1]['news_sort'];
                    $shopNewsSort[$i]['newsQty'] = 0;
                    if($i == 1 || $i == 3 || $i == 4){
                         $shopNewsSort[$i]['newsQty'] = 1; 
                    }
               }

               return $shopNewsSort;
          }

          private function getFavoriteNewsSort(){
               $newsTags = ShopNewsTag::whereIn('id', [1, 2, 4, 5, 6, 7, 8])->select('name')->get();
               
               for($i = 1; $i<=7; $i++){
                    $favoriteNewsSort[$i]['sort'] = $newsTags[$i-1]['name'];
               }

               return $favoriteNewsSort;
          }
     }
?>