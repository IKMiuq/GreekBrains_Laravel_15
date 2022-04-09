<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use \App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\IndexController as AIndexController;

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


Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'App\Http\Controllers\Admin',
        'as' => 'admin.'
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
                Route::get('/index', [
                    'uses' => 'CategoryController@index',
                    'as' => 'index'
                ]);
                Route::put('/edit', [
                    'uses' => 'CategoryController@edit',
                    'as' => 'edit'
                ]);
                Route::get('/create', [
                    'uses' => 'CategoryController@create',
                    'as' => 'create'
                ]);
                Route::post('/store', [
                    'uses' => 'CategoryController@store',
                    'as' => 'store'
                ]);
            }
        );
        Route::group(
            [
                'prefix' => 'news',
                'as' => 'news.'
            ],
            function () {
                Route::get('/index', [
                    'uses' => 'NewsController@index',
                    'as' => 'index'
                ]);
                Route::post('/download', [
                    'uses' => 'NewsController@download',
                    'as' => 'download'
                ]);
                Route::put('/edit', [
                    'uses' => 'NewsController@edit',
                    'as' => 'edit'
                ]);
                Route::get('/create', [
                    'uses' => 'NewsController@create',
                    'as' => 'create'
                ]);
                Route::post('/store', [
                    'uses' => 'NewsController@store',
                    'as' => 'store'
                ]);
            }
        );
    }
);

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
        Route::post('/', [
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
