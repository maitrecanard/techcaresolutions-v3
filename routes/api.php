<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\VisitorsApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/send-mail', [ContactApiController::class, 'sendMessage']);
Route::post('/count-visitor', [VisitorsApiController::class, 'countVisitor']);
Route::post('/count-visitor-industry', [VisitorsApiController::class, 'countVisitorIndustry']);