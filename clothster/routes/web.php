<?php

use Illuminate\Http\Request;

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
    return view('welcome');
});

//Auth::routes();
//Route::get('/{vue_capture?}', function () {
//    return view('welcome');
//})->where('vue_capture', '[\/\w\.-]*');
Route::get('/categories/', function (){return view('welcome');});
Route::get('/product/{id}', function (){return view('welcome');});
Route::get('/search/{keyword}',function (){return view('welcome');});
Route::get('/cart',function (){return view('welcome');});

Route::get('/getCategories', 'HomeController@categories');
Route::get('/products/{filters},{page},{perpage}', 'HomeController@products');
Route::get('/productsCount/{filters}', 'HomeController@productsCount');
Route::get('/getProduct/{id}', 'HomeController@product');
Route::get('/filters/{name},{value}', 'HomeController@filters');
Route::get('/getOrder/{id}', 'HomeController@getOrder')->middleware('auth');
Route::get('/getUser/{id}', 'HomeController@getUser');
Route::get('user/addresses', 'HomeController@getAddresses');
Route::get('user/addresses/{id}', 'HomeController@setAddresses');


Route::post('/order/','HomeController@order');
Route::post('/order/{id}/update','HomeController@orderPost');
Route::post('/setUser','HomeController@setUser');
Route::post('/editUser','HomeController@editUser');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('login', function (Request $request) {
    if (auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
        // Authentication passed...
        $user = auth()->user();
//        $user->api_token = str_random(60);
        $user->save();
        return $user;
    }

    return response()->json([
        'error' => 'Unauthenticated user',
        'code' => 401,
    ], 401);
});