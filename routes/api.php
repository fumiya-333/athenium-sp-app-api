<?php

use Illuminate\Support\Facades\Route;

Route::get('mMembers', [App\Http\Controllers\MMemberController::class, 'get']);
Route::get('mMembers/search', [App\Http\Controllers\MMemberController::class, 'search']);
Route::post('mMembers/store', [App\Http\Controllers\MMemberController::class, 'store']);
Route::post('mMembers/update', [App\Http\Controllers\MMemberController::class, 'update']);
