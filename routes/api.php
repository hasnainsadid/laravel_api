<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Membercontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

$variables = [
    'products' => ProductController::class,
    'students' => StudentController::class,
    'members' => Membercontroller::class,
    'categories' => CategoryController::class,
    'services' => ServiceController::class,
];

foreach ($variables as $key => $value) {
    Route::apiResource($key, $value);
}
