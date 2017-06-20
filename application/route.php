<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get('hello/:name','index/index/index');

Route::get('/',function(){
    return redirect('/blog');
});
Route::get('blog/:slug','Blog/showPost');
Route::get('blog','Blog/index');

Route::group('admin',function(){
    Route::get('tag/create','admin/Tag/create');
    Route::get('tag','admin/Tag/index');
    Route::post('tag','admin/Tag/store');
    Route::resource(':post','admin/Post');
    Route::get(':upload','admin/upload');
});

//Route::resource('admin/tag','admin/controller/Tag');
Route::get('/auth/login','auth/Login/index');
Route::post('/auth/login','auth/Login/getLogin');
Route::get('/auth/logout','auth/login/getLogout');

return [

    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
