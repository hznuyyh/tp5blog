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
    Route::resource(':post','admin/Post');
    Route::resource(':tag','admin/Tag');
    Route::get(':upload','admin/Upload');
});
Route::get('/auth/login','auth/auth/getLogin');
Route::post('/auth/login','auth/auth/postLogin');
Route::get('/auth/logout','auth/auth/getLogout');

return [

    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
