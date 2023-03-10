<?php

use App\Http\Controllers\LoginWithApiController;
use App\Http\Controllers\logOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\TodoComponent;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/',TodoComponent::class)->name('todo');
});

Route::group(['prefix' => '/withapi'],function(){
    Route::get('login',[LoginWithApiController::class, 'index']);
    Route::get('register',[LoginWithApiController::class, 'register']);
});

require __DIR__.'/auth.php';
