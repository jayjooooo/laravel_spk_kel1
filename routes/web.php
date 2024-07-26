<?php

use App\Http\Controllers\NilaiController;

Route::get('/', [NilaiController::class, 'index']);
Route::get('/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/store', [NilaiController::class, 'store'])->name('nilai.store');
Route::get('/edit/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::post('/update/{id}', [NilaiController::class, 'update'])->name('nilai.update');
Route::delete('/delete/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
