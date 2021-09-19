<?php

use App\Http\Controllers\DischargeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\OPDCardsController;
use App\Http\Controllers\TriageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OPDCardsController::class, 'index']);
Route::get('/create', [OPDCardsController::class, 'create']);
Route::post('/', [OPDCardsController::class, 'store']);
Route::delete('/{opdcard}', [OPDCardsController::class, 'destroy']);

Route::get('/triage/{opdcard}/edit', [TriageController::class, 'edit']);
Route::patch('/triage/{opdcard}', [TriageController::class, 'update']);

Route::get('/exam/{opdcard}/edit', [ExamController::class, 'edit']);
Route::patch('/exam/{opdcard}', [ExamController::class, 'update']);

Route::patch('/discharge/{opdcard}', [DischargeController::class, 'update']);
