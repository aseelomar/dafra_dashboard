<?php
/**
 * Created by PhpStorm.
 * User: odai
 * Date: 8/30/2019
 * Time: 4:21 AM
 */


use Illuminate\Http\Request;

Route::get('login', 'DashboardController@getLogin')->name('admin.login');
Route::post('login', 'DashboardController@login');

Route::get('logout', 'DashboardController@logout')->name('admin.logout');




Route::middleware(['auth:admin'])->group(function () {

    Route::get('unauthorized', function (){
        return view('admin.errors.403');
    })->name('admin.unauthorized');


    Route::get('/', function (){})->middleware('guest:admin');

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');


    Route::prefix('news')->name('admin.news.')->group(function (){
        Route::get('/', 'NewsController@index')->name('all');
        Route::get('getNews', 'NewsController@getNews');

        Route::get('add', 'NewsController@add')->name('add');
        Route::post('store/{status}', 'NewsController@store')->name('store');

        Route::get('delete/{id}', 'NewsController@delete')->name('delete');
        Route::get('update-status/{id}', 'NewsController@status')->name('status');
        Route::get('edit/{id}', 'NewsController@edit')->name('edit');
        Route::post('update/{id}', 'NewsController@update')->name('update');

    });


    Route::prefix('categories')->name('admin.categories.')->group(function (){
        Route::get('/', 'CategoryController@index')->name('all');
        Route::get('getCategory', 'CategoryController@getCategory');
        Route::get('delete/{id}', 'CategoryController@delete')->name('delete');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
        Route::get('update-status/{id}', 'CategoryController@status')->name('status');

    });

    Route::prefix('sub-category')->name('admin.sub-category.')->group(function ()
    {
        Route::get('/', 'CategoryController@sub_index')->name('all');
        Route::get('getSubCategory', 'CategoryController@getSubCategory');

    });

    Route::prefix('goals')->name('admin.goals.')->group(function ()
    {
        Route::get('/', 'GoalController@index')->name('all');
        Route::get('getGoals', 'GoalController@getGoals');
        Route::get('update-status/{id}', 'GoalController@status')->name('status');
        Route::get('delete/{id}', 'GoalController@delete')->name('delete');
        Route::get('edit/{id}', 'GoalController@edit')->name('edit');
        Route::post('store', 'GoalController@store')->name('store');

    });
    Route::prefix('backend_settings')->name('admin.backend_settings.')->group(function ()
    {
        Route::get('/', 'SettingController@index')->name('all');
        Route::get('getSetting', 'SettingController@getSetting');
        Route::get('add', 'SettingController@add')->name('add');
        Route::post('store', 'SettingController@store')->name('store');
        Route::get('delete/{id}', 'SettingController@delete')->name('delete');
        Route::get('edit/{id}', 'SettingController@edit')->name('edit');
        Route::post('update/{id}', 'SettingController@update')->name('update');

    });

    Route::get('settings', 'SettingController@view')->name('admin.settings.view');
    Route::post('settings/update_by_key', 'SettingController@updateByKey')->name('admin.settings.updateByKey');

    Route::prefix('constants')->name('admin.constants.')->group(function ()
    {
        Route::get('/', 'ConstantController@index')->name('all');
        Route::post('store', 'ConstantController@store')->name('store');
    });

    Route::prefix('users')->name('admin.users.')->group(function ()
    {
        Route::get('/', 'UserController@index')->name('all');
        Route::get('getUser', 'UserController@getUser');
        Route::get('update-status/{id}', 'UserController@status')->name('status');
        Route::get('add', 'UserController@add')->name('add');
        Route::post('store','UserController@store')->name('store');
        Route::get('edit/{id}', 'UserController@edit')->name('edit');
        Route::post('update/{id}', 'UserController@update')->name('update');
    });


    Route::prefix('video_details')->name('admin.video_details.')->group(function ()
    {

        Route::get('{id}', 'VideoDetailController@index')->where('id', 'videos|series|movies|programs')->name('all');
        Route::get('getVideoDetail/{id}', 'VideoDetailController@getVideoDetail');
        Route::get('update-status/{id}', 'VideoDetailController@status')->name('status');
        Route::get('edit/{id}', 'VideoDetailController@edit')->name('edit');
        Route::get('delete/{id}', 'VideoDetailController@delete')->name('delete');
        Route::get('show/{id}', 'VideoDetailController@show')->name('show');
        Route::get('add', 'VideoDetailController@add')->name('add');
        Route::post('store','VideoDetailController@store')->name('store');
        Route::get('edit/{id}', 'VideoDetailController@edit')->name('edit');
        Route::POST('update/{id}', 'VideoDetailController@update')->name('update');

    });


    Route::prefix('videos')->name('admin.videos.')->group(function ()
    {
        Route::get('/{id}', 'VideoController@index')->name('all');
        Route::get('getVideo/{id}', 'VideoController@getVideo');
        Route::get('add/{id}', 'VideoController@add')->name('add');
        Route::post('store','VideoController@store')->name('store');
        Route::get('update-status/{id}', 'VideoController@status')->name('status');
        Route::get('edit/{id}', 'VideoController@edit')->name('edit');
        Route::post('update/{id}', 'VideoController@update')->name('update');
        Route::get('delete/{id}', 'VideoController@delete')->name('delete');

    });

    Route::get('guide', 'GuideController@index')->name('admin.guide');
    Route::post('guide', 'GuideController@store');

    Route::prefix('customer')->name('admin.customer.')->group(function ()
    {
        Route::get('/', 'CustomerController@index')->name('all');
        Route::get('getCustomer', 'CustomerController@getCustomer');
        Route::get('update-status/{id}', 'CustomerController@status')->name('status');
    });

    Route::prefix('page')->name('admin.page.')->group(function ()
    {
        Route::get('/', 'PageController@index')->name('all');
        Route::get('getPage', 'PageController@getPage');
        Route::get('addPage', 'PageController@addPage')->name('add');
        Route::post('store','PageController@store')->name('store');
        Route::get('edit/{id}', 'PageController@edit')->name('edit');
        Route::post('update/{id}', 'PageController@update')->name('update');

    });
});


