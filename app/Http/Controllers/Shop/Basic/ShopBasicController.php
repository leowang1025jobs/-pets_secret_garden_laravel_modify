<?php
     namespace App\Http\Controllers\Shop\Basic;
     
     use App\Http\Controllers\Controller as ParentController;
     use App\Http\Controllers\Product\Basic\ProductBasicController;
     use App\Http\Model\Shop\Basic\ShopBasic;
     use App\Http\Model\Shop\About\ShopMainGoal;
     use App\Http\Model\Shop\About\ShopMainHistory;
     use App\Http\Model\Shop\About\ShopHistoryMilestone;

     class ShopBasicController extends ParentController{
          public function aboutShop(){
               /**各頁面基本資料設定 */
               $productBasic = new ProductBasicController();
               $headerData = $productBasic->getHeaderBasicData();
               $block1Data = $productBasic->getJoinUsBlockData();
               $footerData = $productBasic->getFooterBasicData();
               $navBarItemData = $productBasic->getNavBarItemData();
               $homePageName = $navBarItemData['homePage'];
               $bannerSubTitle = ['回首頁', '關於祕密花園'];
               /**各頁面基本資料設定 */
               
               $mainGoalTitile = '從"心"出發 量身打造';
               $goalIntroduction = ShopMainGoal::where('id', 2)->with(['goalItems'])->get();
               $shopGoalItem = $goalIntroduction[0]->goalItems;
               $historyIntroduction = ShopMainHistory::where('id', 1)->select('introduction')->get();

               $shopMainGoal = ["introduction" => $goalIntroduction[0]['introduction']];
               $shopMainHistory = ["introduction" => $historyIntroduction[0]['introduction']];

               $shopHistoryMilestone = ShopHistoryMilestone::select('content', 'date')->get();

               $contentData=[
                    'navMainTitle' => $footerData[2]['item_data'][0],
                    'navLinkagePath' => $footerData[2]['item_data'][1],
                    'homePageName' => $homePageName,
                    'shopBasicDescription' => $headerData['shopBasicDescription'],
                    'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
                    'pageTitle'=>'Pet\'s Secret Garden',
                    'shopMainTitle'=>'祕密花園',
                    'shopSubTitle'=>'寵物生活會館',
                    'bannerMainTitle' => '經營理念',
                    'bannerSubTitle' => $bannerSubTitle,
                    'mainGoalTitile' => $mainGoalTitile,
                    'shopMainGoal' => $shopMainGoal["introduction"],
                    'mainGoalAlt' => '成立宗旨',
                    'shopGoalItem' => $shopGoalItem,
                    'shopMainHistory' => $shopMainHistory["introduction"],
                    'mainHistoryAlt' => '花園歷史',
                    'shopHistoryMilestone' => $shopHistoryMilestone,
                    'block1Data' => $block1Data,
                    'footerData' => $footerData
               ];

               return view('shop.basic.aboutShop',$contentData);
          }

          public function contactWithShop(){
               /**各頁面基本資料設定 */
               $productBasic = new ProductBasicController();
               $headerData = $productBasic->getHeaderBasicData();
               $block1Data = $productBasic->getJoinUsBlockData();
               $footerData = $productBasic->getFooterBasicData();
               $navBarItemData = $productBasic->getNavBarItemData();
               $homePageName = $navBarItemData['homePage'];
               $bannerSubTitle = ['回首頁', '聯絡秘密花園'];
               /**各頁面基本資料設定 */

               $shopBasicData = ShopBasic::first();

               $contactInfo = [
                    'mainTitle' => '與我們聯繫',
                    'subTitle' => [
                         'address' => '地址',
                         'phone' => '電話',
                         'e_mail' => '電子信箱',
                    ],
                    'linkageMethod' =>[
                         'address' => '',
                         'phone' => 'tel://',
                         'e_mail' => 'mailto:',
                    ]
               ];

               $inputHints = ['您的大名', '您的電子信箱', '詢問主題', '詢問內容'];

               $contentData=[
                    'navMainTitle' => $footerData[2]['item_data'][0],
                    'navLinkagePath' => $footerData[2]['item_data'][1],
                    'homePageName' => $homePageName,
                    'shopBasicDescription' => $headerData['shopBasicDescription'],
                    'shopBasicKeywords'=> $headerData['shopBasicKeywords'],
                    'pageTitle'=>'Pet\'s Secret Garden',
                    'shopMainTitle'=>'祕密花園',
                    'shopSubTitle'=>'寵物生活會館',
                    'bannerMainTitle' => '問題詢問',
                    'contactInfo' => $contactInfo,
                    'shopBasicData' => $shopBasicData,
                    'bannerSubTitle' => $bannerSubTitle,
                    'btnSubmitText'=> '送出問題',
                    'inputHints' => $inputHints,
                    'block1Data' => $block1Data,
                    'footerData' => $footerData
               ];

               return view('shop.basic.contactWithShop',$contentData);
          }
     }
?>