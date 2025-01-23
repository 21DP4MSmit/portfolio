<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TechStacksController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index0'])->name('projects');
Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.attempt');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');
    
    Route::resource('tech-stacks', TechStacksController::class)->except(['show']);
    Route::resource('education', EducationController::class)->except(['show']);
    Route::resource('experience', WorkExperienceController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});