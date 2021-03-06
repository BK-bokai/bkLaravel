<?php

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

Route::get('/', 'frontend\IndexController@index')->name('index');
Route::get('/images', 'frontend\ImgController@index')->name('images');




Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('confirm/{active}','frontend\ConfirmUserController@confirm')->name('confirm');

Route::get('/email', 'frontend\RegisterEmailController@send');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login')->name('dologin');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', 'backend\IndexController@index')->name('index');
    Route::get('/index_img', 'backend\IndexController@index_img')->name('index_img');
    Route::post('/index_img/{image}', 'backend\IndexController@check_index_img')->name('check_index_img');
    Route::put('/index_img', 'backend\IndexController@change_index_img')->name('change_index_img');
    Route::put('/{index}/{student}/{worker}', 'backend\IndexController@edit')->name('index_edit');
    Route::post('/create/student_skill', 'backend\IndexController@add_student_skill')->name('add_student_skill');
    Route::delete('student_skill/{student_skill}', 'backend\IndexController@del_student_skill')->name('del_student_skill');
    Route::post('/create/worker_skill}', 'backend\IndexController@add_work_skill')->name('add_work_skill');
    Route::delete('/worker_skill/{work_skill}', 'backend\IndexController@del_work_skill')->name('del_work_skill');

    Route::get('img', 'backend\ImgController@index')->name('img');    
    Route::post('img', 'backend\ImgController@create');
    Route::delete('img/{image}', 'backend\ImgController@delete');
    Route::put('img/{image}', 'backend\ImgController@update')->name('img_update_publish');

    Route::get('work', 'backend\WorkController@index');


    Route::get('member', 'backend\MemberController@index')->name('memberAdmin');
    Route::get('addmember', 'backend\MemberController@showform')->name('addmember');
    Route::post('addmember', 'backend\MemberController@addUser')->name('do_addmember');
    Route::delete('addmember/{user}', 'backend\MemberController@deleteUser')->name('do_delmember');
    Route::get('editMember/{user}', 'backend\MemberController@showMember')->name('editmember');
    Route::put('editMember/{user}', 'backend\MemberController@editMember')->name('do_editmember');
    Route::post('check/{user}', 'backend\MemberController@check')->name('do_check');


    // Route::get('editMember/{user}',function($user){
    //     return $user;
    // })->name('do_editmember');

    // Route::post('addmember', function(){
    //     return "1213";
    // })->name('do_addmember');

    Route::get('message', 'backend\MsgController@index')->name('message');
    Route::post('message','backend\MsgController@post')->name('msg-post');
    Route::delete('message/{message}', 'backend\MsgController@delete');
    Route::put('message/{message}', 'backend\MsgController@update');

    Route::delete('reply/{reply}', 'backend\MsgController@reply_delete');
    Route::put('reply/{reply}', 'backend\MsgController@reply_update');




    Route::post('reply','backend\MsgController@reply')->name('msg-reply');


    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

