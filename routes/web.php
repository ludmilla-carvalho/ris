<?php

use Illuminate\Support\Facades\Route;

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
//     return view('site.espera');
// })->name('espera');

Route::get('/', [\App\Http\Controllers\Site\PageController::class, 'home'])->name('home');
Route::get('/sobre-o-festival', [\App\Http\Controllers\Site\PageController::class, 'sobre'])->name('sobre-o-festival');
Route::get('/programacao-adulto', [\App\Http\Controllers\Site\PageController::class, 'programacaoAdulto'])->name('programacao-adulto');
Route::get('/programacao-infantil', [\App\Http\Controllers\Site\PageController::class, 'programacaoInfantil'])->name('programacao-infantil');
Route::get('/contato', [\App\Http\Controllers\Site\PageController::class, 'contato'])->name('contato');



Route::get('/w', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('pages/{page:slug}', \App\Http\Livewire\Page\Edit::class)->name('pages');

    Route::get('agendas', \App\Http\Livewire\Agenda\Index::class)->name('agendas');

    Route::get('performers', \App\Http\Livewire\Performer\Index::class)->name('performers');

    Route::get('places', \App\Http\Livewire\Place\Index::class)->name('places');
    Route::get('regions', \App\Http\Livewire\Region\Index::class)->name('regions');

    Route::get('users', \App\Http\Livewire\User\Index::class)->name('users');
});


Route::prefix('voter')->name('voter.')->group(function () {

    Route::get('login', 'App\Http\Controllers\Voter\LoginController@showLoginForm')->name('login');
    Route::post('login', 'App\Http\Controllers\Voter\LoginController@login')->name('login.post');
    Route::post('logout', 'App\Http\Controllers\Voter\LoginController@logout')->name('logout');

    /*Route::get('/', function () {
    return view('voter.dashboard.index');
    });*/
    Route::group(['middleware' => ['auth:voter']], function () {
        Route::get('/', function () {
            return view('voter.dashboard');
        })->name('dashboard');
    });
});
//https://www.bacancytechnology.com/blog/multiple-authentication-guards-in-laravel-8
