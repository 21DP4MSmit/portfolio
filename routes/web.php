<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TechStacksController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'first'])->name('about.first');
    Route::put('/about/{about}', [AboutController::class, 'update'])->name('about.update');
    
    Route::resource('tech-stacks', TechStacksController::class);
    Route::resource('education', EducationController::class);
    Route::resource('experience', WorkExperienceController::class);
    Route::resource('projects', ProjectController::class);
});