<?php

use App\Models\Photo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth; // Correcting this line

Route::get('/', function () {
    return view('home');
});


Route::get('/gallery',function(){
    $photos = Photo::all();
    return view('gallery',['photos'=>$photos]);
});

Route::get('/contact', function () {
    return view('contact');
});

// Routes for dashboard with authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashpesan', [MessageController::class, 'index'])->name('dashpesan');
    Route::get('/upload',function(){return view('upload');});
    // Route::get('/homeedit',function(){return view('homeedit');});
    Route::get('/dashupload', [PhotoController::class, 'index'])->name('dashupload');
    // Route::get('/dashhome', [HomeController::class, 'index'])->name('dashhome');
    Route::delete('/delete-message/{id}', [MessageController::class, 'destroy'])->name('delete-message');   
    Route::post('/upload-photo', [PhotoController::class, 'store']);
    Route::post('/send-message', [MessageController::class, 'store']);
    Route::delete('/delete-photo/{id}', [PhotoController::class, 'destroy'])->name('delete-photo');
    // Route::get('/homeedit', [HomeController::class, 'edit'])->name('dashhome.edit'); 
    // Route::put('/homeupdate', [HomeController::class, 'update'])->name('dashhome.update');

});

Auth::routes();
Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
