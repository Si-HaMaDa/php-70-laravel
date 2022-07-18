<?php

use Illuminate\Support\Facades\Route;

Route::get('/', AdminController::class); // route('admin')

Route::resource('users', UserController::class);

Route::resource('skills', SkillController::class);

Route::resource('categories', CategoryController::class);

Route::resource('jobs', JobController::class);
