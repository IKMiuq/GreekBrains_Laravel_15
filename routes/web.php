<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AIndexController;
use App\Http\Controllers\IndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => '/account', 'as' => 'account'], function () {
        Route::get('/', AccountController::class)->name('index');
        Route::get('/logout', function () {
            \Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });
    //admin routes
    Route::group(
        [
            'prefix' => 'admin',
            'namespace' => 'App\Http\Controllers\Admin',
            'as' => 'admin.',
            'middleware' => 'admin.check'
        ],
        function () {
            Route::get('/', [
                'uses' => 'IndexController',
                'as' => 'index'
            ]);

            Route::group(
                [
                    'prefix' => 'categories',
                    'as' => 'categories.'
                ],
                function () {
                    Route::get('/', [
                        'uses' => 'CategoryController@index',
                        'as' => 'index'
                    ]);
                    Route::get('/edit/{category}/', [
                        'uses' => 'CategoryController@edit',
                        'as' => 'edit'
                    ]);
                    Route::get('/create', [
                        'uses' => 'CategoryController@create',
                        'as' => 'create'
                    ]);
                    Route::put('/update/{category}/', [
                        'uses' => 'CategoryController@update',
                        'as' => 'update'
                    ]);
                    Route::post('/store', [
                        'uses' => 'CategoryController@store',
                        'as' => 'store'
                    ]);
                    Route::get('/delete', [
                        'uses' => 'CategoryController@delete',
                        'as' => 'delete'
                    ]);
                }
            );
            Route::group(
                [
                    'prefix' => 'news',
                    'as' => 'news.'
                ],
                function () {
                    Route::get('/', [
                        'uses' => 'NewsController@index',
                        'as' => 'index'
                    ]);
                    Route::post('/download', [
                        'uses' => 'NewsController@download',
                        'as' => 'download'
                    ]);
                    Route::get('/edit/{news}', [
                        'uses' => 'NewsController@edit',
                        'as' => 'edit'
                    ]);
                    Route::get('/create', [
                        'uses' => 'NewsController@create',
                        'as' => 'create'
                    ]);
                    Route::put('/update/{news}/', [
                        'uses' => 'NewsController@update',
                        'as' => 'update'
                    ]);
                    Route::get('/delete', [
                        'uses' => 'NewsController@delete',
                        'as' => 'delete'
                    ]);
                    Route::post('/store', [
                        'uses' => 'NewsController@store',
                        'as' => 'store'
                    ]);
                }
            );
            Route::group(
                [
                    'prefix' => 'users',
                    'as' => 'users.'
                ],
                function () {
                    Route::get('/', [
                        'uses' => 'UserController@index',
                        'as' => 'index'
                    ]);
                    Route::post('/update', [
                        'uses' => 'UserController@update',
                        'as' => 'update'
                    ]);
                    Route::get('/delete', [
                        'uses' => 'UserController@delete',
                        'as' => 'delete'
                    ]);
                }
            );
        }
    );
});

Route::get('/', [IndexController::class, 'index']);
Route::group(
    [
        'prefix' => 'login',
        'namespace' => 'App\Http\Controllers',
        'as' => 'login.'
    ],
    function () {
        Route::get('/', [
            'uses' => 'LoginController@index',
            'as' => ''
        ]);
        Route::post('/in', [
            'uses' => 'LoginController@logIn',
            'as' => 'in'
        ]);
    }
);


Route::group(
    [
        'as' => 'news.'
    ],
    function () {
        Route::get('/news/', [NewsController::class, 'sections'])->name('');
        Route::get('/news/{section}/', [NewsController::class, 'newsAll'])->name('sections');
        Route::get('/news/{section}/{news_id}', [NewsController::class, 'news'])->name('detail');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
