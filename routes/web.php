<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProjectController;
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
// Client-facing
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
// Read a specific project
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Admin-facing
Route::get('/admin/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
// Create a new project
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
// Read a specific project
Route::get('/admin/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
// Update a specific project
Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
// Delete a specific project
Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');


// Profile
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');