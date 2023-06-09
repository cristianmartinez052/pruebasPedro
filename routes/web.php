<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $articulos=Article::orderBy('id', 'DESC')->paginate(5);
    return view('dashboard', compact('articulos'));
})->name('dashboard');

Route::resource('articles', ArticleController::class);
Route::resource('pedidos',PedidoController::class);