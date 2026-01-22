<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FitnessAgentController;

Route::get('/', [FitnessAgentController::class, 'index']);
Route::post('/process', [FitnessAgentController::class, 'process'])->name('process');
