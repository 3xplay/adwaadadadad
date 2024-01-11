<?php

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#region user ( no login allowed )
Route::get('/', function () {
  return redirect('/dashboard');
});

Route::namespace('backoffice')->name('backoffice.')->group(function () {

  Route::group(['middleware' => 'auth'], function () {

   Route::group(['middleware' => 'admin'], function () {
          Route::get('dashboard', 'BackofficeController@dashboard')->name('dashboard');

          //deposit Manager
          Route::get('deposit', 'DepositController@alldeposit')->name('deposit');
          Route::get('deposit/pending', 'DepositController@deposit')->name('deposit.list');
          Route::get('deposit/approved', 'DepositController@approved')->name('deposit.approved');
          Route::get('deposit/rejected', 'DepositController@rejected')->name('deposit.rejected');
          Route::get('deposit/detail/{id}', 'DepositController@details')->name('deposit.detail');
          Route::post('deposit/approve/{id}', 'DepositController@approve')->name('deposit.approve');
          Route::post('deposit/reject/{id}', 'DepositController@reject')->name('deposit.reject');
          
          
          //Members balance Manager
          Route::get('balance', 'PengaturanSaldoController@balance')->name('balance');
          Route::get('balance/main/{id}', 'PengaturanSaldoController@mainBall')->name('balance.main');
          Route::get('balance/bonus/{id}', 'PengaturanSaldoController@bonusBall')->name('balance.bonus');

          Route::post('balance/update/{id}', 'PengaturanSaldoController@update')->name('balance.update');

          //transaction member
          Route::get('member/transaction', 'HistoritransaksiController@transaction')->name('member.transaction');
          
          
       Route::group(['middleware' => 'dev_mode'], function () {

        // Admin Manager
        Route::controller('DatamemberController')->name('admin.')->prefix('admins')->group(function () {
          Route::get('/create', 'createacc')->name('create');
          Route::get('/list', 'admins')->name('list');
          Route::get('/master', 'masters')->name('masters');
          Route::post('/created', 'create')->name('created');
          Route::post('/delete/{id}', 'destroy')->name('delete');
        });

          Route::get('admin/gateway', 'DepositbankController@gateway')->name('gateway');
          Route::get('admin/gateway/edit/{id}', 'DepositbankController@edit')->name('gateway.edit');
          Route::post('admin/gateway/update/{id}', 'DepositbankController@update')->name('gateway.update');


          Route::get('account/profile', 'ProfilAdminController@profile')->name('account.profile');
          Route::get('account/password', 'ProfilAdminController@AdminChangePassword')->name('account.profile.password');
          Route::post('account/profile/update/{id}', 'ProfilAdminController@update')->name('account.profile.update');
          Route::post('account/password/change', 'ProfilAdminController@cpwd')->name('account.profile.changepass');
          
                  Route::controller('DatamemberController')->name('members.')->prefix('members')->group(function () {
          Route::get('/', 'list')->name('list');
          Route::get('detail/{id}', 'details')->name('detail');
          Route::post('update/{id}', 'store')->name('update');
        
        });
          
                    Route::get('withdrawal', 'WithdrawController@list')->name('withdrawal.list');
          Route::get('withdrawal/pending', 'WithdrawController@withdrawal')->name('withdrawal');
          Route::get('withdrawal/approved', 'WithdrawController@approved')->name('withdrawal.approved');
          Route::get('withdrawal/rejected', 'WithdrawController@rejected')->name('withdrawal.rejected');
          Route::get('withdrawal/detail/{id}', 'WithdrawController@details')->name('withdrawal.detail');

          Route::post('withdrawal/approve/{id}', 'WithdrawController@approve')->name('withdrawal.approve');
          Route::post('withdrawal/reject/{id}', 'WithdrawController@reject')->name('withdrawal.reject');
          
          Route::get('website/promotion', 'BannerPromosiController@promotion')->name('website.promotion');
          Route::get('website/promotion/add', 'BannerPromosiController@add')->name('website.promotion.add');
          Route::get('website/promotion/edit/{id}', 'BannerPromosiController@edit')->name('website.promotion.edit');
          Route::post('website/promotion/upload', 'BannerPromosiController@store')->name('website.promotion.upload');
          Route::post('website/promotion/update/{id}', 'BannerPromosiController@update')->name('website.promotion.update');
          Route::post('website/promotion/delete/{id}', 'BannerPromosiController@destroy')->name('website.promotion.delete');
          
          Route::get('members/login/history', 'ReportController@loginHistory')->name('members.login.history');
          Route::get('members/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('members.login.IpHistory');

          Route::get('website/depositPromotion', 'BonusController@depositPromotion')->name('website.depositPromotion');
          Route::get('website/depositPromotion/add', 'BonusController@add')->name('website.depositPromotion.add');
          Route::get('website/depositPromotion/edit/{id}', 'BonusController@edit')->name('website.depositPromotion.edit');
          Route::post('website/depositPromotion/upload', 'BonusController@store')->name('website.depositPromotion.upload');
          Route::post('website/depositPromotion/update/{id}', 'BonusController@update')->name('website.depositPromotion.update');
          Route::post('website/depositPromotion/delete/{id}', 'BonusController@destroy')->name('website.depositPromotion.delete');


          Route::get('website/banners', 'BannerController@banners')->name('banners');
          Route::get('website/banners/add', 'BannerController@addslide')->name('banners.add');
          Route::get('website/banners/edit/{id}', 'BannerController@editslide')->name('banners.edit');
          Route::post('website/banners/delete/{id}', 'BannerController@destroy')->name('banners.delete');
          Route::post('website/banners/upload', 'BannerController@store')->name('banners.upload');
          Route::post('website/banners/update/{id}', 'BannerController@update')->name('banners.update');


          Route::get('website/setting', 'SettingController@setting')->name('website.setting');
          Route::post('website/setting/update/{id}', 'SettingController@update')->name('website.setting.update');

          Route::get('website/setting/extension', 'SettingController@social')->name('website.extension');
          Route::post('website/setting/extension/update/{id}', 'SettingController@updatelc')->name('website.extension.update');

          Route::get('website/setting/logo', 'SettingController@logosetting')->name('website.setting.logo');
          Route::post('website/setting/logo/update/{id}', 'SettingController@logoupdate')->name('website.setting.logo.update');

          Route::get('website/setting/themes', 'SettingController@forntendthemes')->name('website.themes');
          Route::post('website/setting/themes/update/{id}', 'SettingController@themeschange')->name('website.themes.update');

          Route::get('website/setting/seo', 'SettingController@seo')->name('website.setting.seo');
          Route::post('website/setting/seo/update/{id}', 'SettingController@updateseo')->name('website.setting.seo.update');
      });
    });
  });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');