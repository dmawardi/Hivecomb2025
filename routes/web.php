<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Inquiries
Route::get('/contact', function () {
    return view('inquiries.create');
})->name('inquiries.create');

// Projects
Route::get('/projects', function () {
    return view('projects.index');
})->name('projects.index');