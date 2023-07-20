<?php

use App\Http\Controllers\ShareFileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ShareFileController::class, 'create'])->name('ShareFile.create');
Route::post('/', [ShareFileController::class, 'store'])->name('ShareFile.store');
Route::get('/upload', [ShareFileController::class, 'show'])->name('ShareFile.show');
Route::get('/download/{path}', [ShareFileController::class, 'download'])->name('ShareFile.download');
Route::get('/downloadFile/{path}', [ShareFileController::class, 'downloadFile'])->name('ShareFile.downloadFile');
