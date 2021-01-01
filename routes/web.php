<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index');

// 關於我們
// -公司沿革
Route::get('history', 'FrontController@history');
// -職安品質政策
Route::get('security_policy', 'FrontController@security_policy');

// 動態消息
// -職缺公告
Route::get('job_opportunities', 'FrontController@job_opportunities');
// -得標公告
Route::get('tender', 'FrontController@tender');
Route::get('tender_detail/{id}', 'FrontController@tender_detail');

// 服務項目
Route::get('serve', 'FrontController@serve');

// 得獎及認證
// -得獎事蹟
Route::get('award_stories', 'FrontController@award_stories');
// -認證及獎盃
Route::get('certification_trophy', 'FrontController@certification_trophy');

// 工程實績
Route::get('performance/{id}', 'FrontController@performance');
Route::get('performance_detail/{id}', 'FrontController@performance_detail');

// 職安資訊
Route::get('occupational_safety', 'FrontController@occupational_safety');

// 聯絡我們
Route::get('contact_us', 'FrontController@contact_us');


Route::get('/home', 'HomeController@index');
Route::middleware(['auth'])->prefix('admin')->group(function () {

    //SEO設定
    Route::get('seo', 'SeoController@index');
    Route::post('seo/{id}', 'SeoController@update');

    // 關於我們
    // -公司沿革
    Route::resource('histories', 'HistoriesController');
    // -職安品質政策
    Route::resource('security_polities', 'SecurityPolitiesController');

    // 動態消息
    // -職缺單位
    Route::resource('job_opportunities_units', 'JobOpportunitieUnitsController');
    // -職缺名稱
    Route::resource('job_opportunities', 'JobOpportunitiesController');
    // -得標資訊
    Route::resource('tenders', 'TendersController');
    Route::post('tenders/delNewsFile', 'TendersController@deleteFile');

    // 得獎及認證
    // -得獎故事
    Route::resource('award_stories', 'AwardStoriesController');
    // -認證及獲獎
    Route::resource('certification_trophys', 'CertificationTrophysController');

    // 工程實績
    // Route::resource('performances', 'PerformancesController');
    Route::get('performances/{id}', 'PerformancesController@index');
    Route::get('performances/create/{id}', 'PerformancesController@create');
    Route::post('performances/store', 'PerformancesController@store');
    Route::get('performances/{id}/edit/', 'PerformancesController@edit');
    Route::resource('performances', PerformancesController::class)->only([
        'update', 'destroy'
    ]);

    // 聯絡我們
    Route::resource('contactus', 'ContactusController');
});

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
