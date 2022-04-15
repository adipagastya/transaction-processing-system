<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;

use Illuminate\Support\Facades\Route;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'itemCount' => Item::all(),
        'transactionCount' => Transaction::all(),
        'userCount' => User::all()
    ]);
})->middleware('auth');

Route::resource('/dashboard/items', ItemController::class)->middleware('auth');