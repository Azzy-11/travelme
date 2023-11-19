<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\TopController as PublicTopController;
use App\Http\Controllers\TopicController as PublicTopicController;



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

// TopicController
Route::controller(TopicController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('topic/create', 'add')->name('topic.add');
    Route::post('topic/create', 'create')->name('topic.create');
    Route::get('topic/index', 'index')->name('topic.index');
    Route::get('topic/edit', 'edit')->name('topic.edit');
    Route::post('topic/edit', 'update')->name('topic.update');
    Route::get('topic/delete', 'delete')->name('topic.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PublicTopController::class, 'top'])->name('top.top');
Route::get('topic/index', [PublicTopicController::class, 'explore'])->name('topic.index');
Route::get('topic/view', [PublicTopicController::class, 'post'])->name('topic.view');
