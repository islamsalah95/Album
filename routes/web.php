<?php

use App\Http\Controllers\Web\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AlbumController;
use App\Http\Controllers\Web\PictureController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
    Route::get('/Album/create', [AlbumController::class, 'create'])->name('create.Album');
    Route::post('/store/album', [AlbumController::class, 'store'])->name('store.album');
    Route::get('/albums', [AlbumController::class, 'show'])->name('albums');
    Route::get('/albums/edit/{albumId}', [AlbumController::class, 'edit'])->name('albums.edit');
    Route::put('/albums/update/{albumId}', [AlbumController::class, 'update'])->name('albums.update');
    Route::delete('/albums/delete/{albumId}', [AlbumController::class, 'destroy'])->name('albums.delete');

    Route::get('/showAlbum/{albumId}', [PictureController::class, 'show'])->name('album.show');
    Route::post('/picture/store/{albumId}', [PictureController::class, 'store'])->name('picture.store');
  
    Route::delete('/picture/delete/{AlbumId}', [PictureController::class, 'destroyAllPictures'])->name('picture.delete');
   
    Route::get('/picture/edit/{albumId}', [PictureController::class, 'edit'])->name('picture.edit');
    Route::put('/picture/move/{albumId}', [PictureController::class, 'update'])->name('picture.move');
    Route::delete('/picture/deleteSinglePic/{picId}', [PictureController::class, 'deleteSinglePic'])->name('picture.deleteSinglePic');

});

require __DIR__.'/auth.php';
