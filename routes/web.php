<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
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
        Route::get('/',[
            'uses' => 'IndexController@index',
            'as' => 'index'
        ]);

        Route::group(
            [
                'prefix' => 'categories',
                'as' => 'categories.'
            ],
            function () {
                Route::get('/index',[
                    'uses' => 'CategoryController@index',
                    'as' => 'index'
                ]);
                Route::put('/edit',[
                    'uses' => 'CategoryController@edit',
                    'as' => 'edit'
                ]);
                Route::get('/create',[
                    'uses' => 'CategoryController@create',
                    'as' => 'create'
                ]);
            }
        );
        Route::group(
            [
            'prefix' => 'news',
            'as' => 'news.'
            ],
            function () {
                Route::get('/index',[
                    'uses' => 'NewsController@index',
                    'as' => 'index'
                ]);
                Route::put('/edit',[
                    'uses' => 'NewsController@edit',
                    'as' => 'edit'
                ]);
                Route::get('/create',[
                    'uses' => 'NewsController@create',
                    'as' => 'create'
                ]);
            }
        );
    }
);

Route::get('/', [IndexController::class, 'index']);

Route::group(
    [
        'as' => 'news.'
    ],
    function() {
        Route::get('/news/', [NewsController::class, 'sections'])->name('');
        Route::get('/news/{section}/', [NewsController::class, 'newsAll'])->name('sections');
        Route::get('/news/{section}/{news_id}', [NewsController::class, 'news'])->name('detail');
    }
);
