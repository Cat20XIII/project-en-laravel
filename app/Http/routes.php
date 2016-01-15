<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/conditions-générales-de-vente', ['as' => 'url_vers_cgv', function () {
    return view('cgv');
}]);

Route::get('/test-tableau',[
    'uses' => 'MainController@essai'
]);

Route::get('/equipes',[
    'uses' => 'MainController@team'
]);

Route::get('/contactez-nous',[
    'uses' => 'MainController@contact',
    'as'   => 'contact'
]);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        "uses" => "MainController@home",
        "as" => "home"
    ]);

    Route::any('/contactez-nous', [
        'uses' => 'MainController@contact',
        'as' => 'contact_route'
    ]);

});
