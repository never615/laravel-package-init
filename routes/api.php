<?php
/**
 * Copyright (c) 2017. Mallto.Co.Ltd.<mall-to.com> All rights reserved.
 */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;

$attributes = [
    'namespace'  => 'Never615\Nike\Controller\Api',
    'prefix'     => 'api',
    'middleware' => [ 'api' ],
];

Route::group($attributes, function ($router) {


    Route::group([ 'middleware' => [ 'owner_api', 'requestCheck' ] ], function () {

        Route::group([
            'middleware' => [ 'authSign2' ],
            'namespace'  => "Third",
            'prefix'     => 'tp',
        ], function () {


        });

        /**
         * 需要经过验证:可以通过签名或者referrer验证
         */
        Route::group([ 'middleware' => [ 'authSign_referrer' ] ], function () {

            //公共接口
            //短信验证码
            Route::get('code', 'PublicController@getMessageCode');
        });

        //邮箱验证码
//        Route::get('mail_code', 'PublicController@getMailMessageCode');

//        //微信登录:企业号,使用userid登录,企业号使用
//        Route::post("login_by_corp", 'Auth\WechatLoginController@loginByCorp');
//
//        //(旧)微信登录:只要是微信用户就行 (使用openid登录)
//        Route::post("login_by_openid", 'Auth\WechatLoginController@loginByOpenid');

        //登录接口
        Route::post("login", 'Auth\LoginController@login');
        //注册:通用注册,包含微信和app
        Route::post('register', 'Auth\RegisterController@register');
        //salt
        Route::get('salt', 'Auth\RegisterController@userSalt');

        //重置密码
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        /**
         * 需要经过签名校验
         */
        Route::group([ 'middleware' => [ 'authSign' ] ], function () {

        });

        /**
         * 需要经过授权
         */
        Route::group([ 'middleware' => [ 'auth:api' ] ], function () {

            Route::group([ "middleware" => [ "scopes:mobile-token" ] ], function () {
            });

            Route::group([ "middleware" => [ "scopes:account-token" ] ], function () {
                //更新(重新绑定)手机/邮箱
//                Route::post("user/identifier", 'Auth\UserController@updateIdentifier');
            });

            Route::group([ "middleware" => [ "scope:mobile-token,account-token" ] ], function () {
                //更新用户信息
                Route::patch('user', 'Auth\UserController@update');
                //更新用户密码
                Route::patch('user/password', 'Auth\UserController@updatePassword');
                //登出
                Route::get('logout', 'Auth\LoginController@logout');

                //验证旧的的手机/邮箱
//                Route::post("user/verify_old_identifier", 'Auth\UserController@verifyOldIdentifier');
            });

            Route::group([ "middleware" => [ "scope:mobile-token,wechat-token,account-token" ] ],
                function () {
                    //获取用户信息
                    Route::get('user', 'Auth\UserController@show');
                });
        });
    });

});





