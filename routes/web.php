<?php

/* Route::get('home/{name}/{address}',function($name, $address) {
    return "<h1>Welcome $name who live in $address.</h1>";
}); */

/* Route::get('home/{name}/{address}',function($name, $address) {
    return view('home', [
        'name' => $name,
        'address' => $address
    ]);
}); */


// Route::get('/test', function() {
//     for($i=1; $i<=50; $i++) {
//         $post = new App\Post();
//         $post->title = Str::random(10);
//         $post->content = Str::random(100);
//         $post->user_id = 1;
//         $post->save();
//     }
// }); 

// Route::get('/', function() {
//     return view('welcome');
// });
Route::get('/', 'Frontend\FrontpostController@index');


// Post routes
// Route::group([],function{})

// Route::group(['prefix'=>'admin','middleware'=>'authware'],function(){
//     // Route::get('/', function(){
//     //     return redirect('admin/post');
//     // });
//     Route::get('post', 'Backend\PostController@index');
//     Route::get('/post/create', 'Backend\PostController@create');
//     Route::post('post', 'Backend\PostController@store');
//     Route::get('post/{id}/edit', 'Backend\PostController@edit');
//     Route::post('post/{id}/edit', 'Backend\PostController@update');
//     Route::get('post/{id}/delete', 'Backend\PostController@destroy');
// });
// Post routes
Route::group(['prefix' => 'admin', 'middleware' => ['authware','can:isAdminOrAuthor'], 'namespace' => 'Backend'], function() {
    Route::get('post', 'PostController@index');
    Route::get('post/create', 'PostController@create');
    Route::post('post', 'PostController@store');
    Route::get('post/{id}/edit', 'PostController@edit');
    Route::post('post/{id}/edit', 'PostController@update');
    Route::get('post/{id}/delete', 'PostController@destroy'); 
    Route::get('post/{id}', 'PostController@show');
});

// User
Route::group(['prefix' => 'admin', 'middleware' => 'authware', 'namespace' => 'Backend'], function() {
    Route::get('/profile', 'UserController@profile');
    Route::get('/profile/edit', 'UserController@edit');
    Route::post('/profile/edit', 'UserController@update');
});


// Route::get('post', 'Backend\PostController@index');
// Route::get('/post/create', 'Backend\PostController@create');
// Route::post('post', 'Backend\PostController@store');
// Route::get('post/{id}/edit', 'Backend\PostController@edit');
// Route::post('post/{id}/edit', 'Backend\PostController@update');
// Route::get('post/{id}/delete', 'Backend\PostController@destroy');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
