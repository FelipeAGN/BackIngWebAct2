<?php


Route::group([

    'middleware' => 'api',

], function ($router) {


    /*Usuarios*/
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout','AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');

    /*Usuarios*/


    /*Articles*/

    //subir nuevo articulo
    Route::post('newArticle', 'ArticleController@newArticle');

    //hacer update a las properties del articulo
    Route::patch('updateArticle', 'ArticleController@updateArticle');

    // OBTENER UN ARTICULO PARA MOSTRAR
    Route::get('getArticle', 'ArticleController@getArticle');

    //Borrar un articulo
    Route::delete('deleteArticle', 'ArticleController@deleteArticle');

    /*Articles*/



});
