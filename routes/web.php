<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;

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

Route::resource('post', PostController::class);

Route::get('/', function () {
    return view('welcome');
})
// ->middleware('can:test')
; //testゲートを適用

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/test', [TestController::class, 'test'])->name('test');
// Route::post('post', [PostController::class, 'store'])->name('post.store');
// // Route::middleware(['auth', 'can:admin'])->group(function() {
//     Route::get('post', [PostController::class, 'index'])->name('post.index');
//     Route::get('post/create', [PostController::class, 'create'])->name('create');
// // });

// // CRUDのルーティングを定義
// // postの個別ページ
// Route::get('post/show/{post}', [PostController::class, 'show'])->name('post.show');
// // 編集ページ
// Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
// // 更新処理 patchの代わりにputでも問題ない
// Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
// // 削除処理
// Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

require __DIR__.'/auth.php';
