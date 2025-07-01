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
    return view('contact');
})->name('inquiries.create');
Route::post('/contact', function () {
    // Handle the contact form submission
    return redirect()->route('inquiries.create')->with('success', 'Your message has been sent successfully!');
})->name('inquiries.store');

// Projects
Route::get('/projects', function () {
    return view('projects.index');
})->name('projects.index');