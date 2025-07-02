<?php

use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Inquiries
Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
// Create an inquiry through the contact page
Route::get('/contact', [InquiryController::class, 'create'])->name('inquiries.create');
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');
// Read
Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
// Update
Route::get('/inquiries/{inquiry}/edit', [InquiryController::class, 'edit'])->name('inquiries.edit');
Route::put('/inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');
// Delete
Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

// Projects
Route::get('/projects', function () {
    return view('projects.index');
})->name('projects.index');