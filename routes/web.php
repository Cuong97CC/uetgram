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
<<<<<<< HEAD

Route::get('/search/{content}',[
    'as'  => 'app.search',
    'uses' => 'AppController@search'
]);

Route::group(['prefix'=>'albums',], function(){
=======
 
Route::group(['prefix'=>'albums'], function(){
>>>>>>> Template image details
    //Xem danh sach album root
    Route::get('/', [
        'as'   => 'album.index',
        'uses' => 'AlbumsController@index'
    ]);

    //Luu album moi
    Route::post('{idAlbumf}/store', [
        'middleware'=>'adminLogin',
        'as'  => 'album.store',
        'uses'=> 'AlbumsController@store'
    ]);

    //Đổi tên album
    Route::put('{idAlbumf}/edit', [
        'middleware'=>'adminLogin',
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
        'middleware'=>'adminLogin',
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

    //Xem chi tiet mot anh
    Route::get('show/{idImg}', [
        'middleware'=>'userLogin',
        'as'  => 'image.show',
        'uses'=> 'ImagesController@show'
    ]);

    //Xoa anh
    Route::delete('{idImage}', [
        'middleware'=>'userLogin',
        'as'   => 'image.destroy',
        'uses' => 'ImagesController@destroy'
    ]);

    //Xem toan bo anh cua mot user
    Route::get('user/{idUser}', [
        'as'   => 'image.userimg',
        'uses' => 'ImagesController@userimg'
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
        Route::delete('{idImg}/delete/{idTag}', [
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
        Route::delete('delete/{idComment}', [
            'as'   => 'comment.destroy',
            'uses' => 'CommentsController@destroy'
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
