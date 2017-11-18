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

Route::get('/', function () {
    return view('home');
});

Route::get('/search/{content}',[
    'as'  => 'app.search',
    'uses' => 'AppController@search'
]);

Route::group(['prefix'=>'albums',], function(){
    //Xem danh sach album root
    Route::get('/', [
        'as'   => 'album.index',
        'uses' => 'AlbumsController@index'
    ]);

    //Luu album moi
    Route::post('{idAlbumf}/store', [
        'middleware'=>'userLogin',
        'as'  => 'album.store',
        'uses'=> 'AlbumsController@store'
    ]);

    //Đổi tên album
    Route::put('{idAlbum}/edit', [
        'middleware'=>'userLogin',
        'as'  => 'album.edit',
        'uses'=> 'AlbumsController@edit'
    ]);

    //Xem mot album
    Route::get('{idAlbum}', [
        'as'   => 'album.show',
        'uses' => 'AlbumsController@show'
    ]);

    //Xoa mot album
    Route::delete('delete/{idAlbum}', [
        'middleware'=>'userLogin',
        'as'   => 'album.destroy',
        'uses' => 'AlbumsController@destroy'
    ]);

});

Route::group(['prefix'=>'images'], function(){
    //Xem toan bo anh
    Route::get('/', [
        'as'  => 'image.index',
        'uses'=> 'ImagesController@index'
    ]);

    //Dang anh vao album
    Route::post('album{idAlbum}/addimg', [
        'middleware'=>'userLogin',
        'as'  => 'image.addimg',
        'uses'=> 'ImagesController@addimg'
    ]);

    //Xoa anh
    Route::delete('{idImage}', [
        'middleware'=>'userLogin',
        'as'   => 'image.destroy',
        'uses' => 'ImagesController@destroy'
    ]);

    //Xem toan bo anh cua mot user
    Route::get('user/{User}', [
        'as'   => 'image.userimg',
        'uses' => 'ImagesController@userimg'
    ]);

    //Them mo ta cho anh
    Route::post('{idImg}/description', [
        'middleware'=>'userLogin',
        'as'  => 'image.describe',
        'uses'=> 'ImagesController@describe'
    ]);

    //Sua thong tin cho anh
    Route::post('{idImg}/edit', [
        'middleware'=>'userLogin',
        'as'  => 'image.edit',
        'uses'=> 'ImagesController@edit'
    ]);

    //Xoa thong tin anh
    Route::post('{idImg}/empty', [
        'middleware'=>'userLogin',
        'as'  => 'image.empty',
        'uses'=> 'ImagesController@empty'
    ]);

    Route::group(['prefix'=>'tags','middleware'=>'userLogin'], function(){
        //Them tag
        Route::post('{idImage}/addtag', [
            'as'  => 'tag.store',
            'uses'=> 'TagsController@store'
        ]);

        //Xem tat ca anh co cung tag
        Route::get('{tag}', [
            'as'   => 'tag.findimages',
            'uses' => 'TagsController@findimages'
        ]);

        //Xoa tag
        Route::post('{idImg}/delete/{idTag}', [
            'as'   => 'tag.destroy',
            'uses' => 'TagsController@destroy'
        ]);
    });

    Route::group(['prefix'=>'comments','middleware'=>'userLogin',], function(){
        //Gui comment
        Route::post('{idImage}/addcomment', [
            'as'  => 'comment.store',
            'uses'=> 'CommentsController@store'
        ]);

        //Xoa comment
        Route::post('delete/{idComment}', [
            'as'   => 'comment.destroy',
            'uses' => 'CommentsController@destroy'
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
