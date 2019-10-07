<?php

//use App\Article;
//use App\Http\Controllers\ArticleController;
//use Illuminate\Http\Request;

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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    Route::post('login','Auth\LoginController@login');
//    Route::post('logout','Auth\LoginController@logout');
//    return $request->user();
//});


Route::group(['namespace' => 'Article', 'prefix' => 'v1'], function () {
    Route::get('articles', 'ArticleController@getArticles');
    Route::get('articles/{article}', 'ArticleController@getArticlebyId');
    Route::post('articles', 'ArticleController@createNewArticle');
    Route::put('articles/{article}', 'ArticleController@updateArticle');
    Route::delete('articles/{article}', 'ArticleController@removeArticle');
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});



