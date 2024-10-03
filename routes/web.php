<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome_page');
// });

// php artisan ui vue --auth 產生

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// php artisan ui vue --auth 產生

// ============
// 路由練習
// // 基礎路由參數
// Route::get('students/{student_no}', function($student_no){
//     return '學號:'.$student_no;
// }); // closure(匿名函式/閉包)

// Route::get('students/{student_no}/score', function($student_no){
//     return '學號:'.$student_no.'的 所有成績!';
// });

// Route::get('students/{student_no}/score/{subject}', function($student_no, $subject){
//     return '學號:'.$student_no.'的 '.$subject.'成績!';
// });

// // 選擇性路由參數
// Route::get('students/{student_no}/score/{subject?}', function($student_no, $subject = null){
//     return '學號:'.$student_no.'的 '.(is_null($subject))? '全部科目' : $subject .'成績!';
// });

// 正規表達式限制參數
// Route::pattern('student_no', 's[0-9]{10}'); //統一格式的做法
// Route::group(['prefix' => 'students'], function(){
//     Route::get('{student_no}', function($student_no){
//         return '學號:'.$student_no;
//     });
    
//     Route::get('{student_no}/score/{subject?}', function($student_no, $subject = null){
//         return '學號:'.$student_no.'的 '.(is_null($subject))? '全部科目' : $subject .'成績!';
//     })->where(['subject' => '(Chinese|English|Math)']);
// });

// 作品測試路由
/**店家相關 */
Route::get('/shop/about', 'Shop\Basic\ShopBasicController@aboutShop');

/**商品瀏覽 */
Route::get('/product', 'Product\Basic\ProductBasicController@displayProducts');

/**商品細項展示 */
Route::get('/product/{ID}', 'Product\Basic\ProductBasicController@displayProductDetail');

/**花園新鮮事總覽 */
Route::get('/news', 'Shop\News\ShopNewsController@displayNews');

/**花園新鮮事細項展示 */
Route::get('/news/{ID}', 'Shop\News\ShopNewsController@displayNewsDetail');

/**店家聯絡/問題詢問 */
Route::get('/shop/contact', 'Shop\Basic\ShopBasicController@contactWithShop');