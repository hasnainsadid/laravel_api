<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

$variable = [
    'students' => StudentController::class,
    'products' => ProductController::class
];

foreach ($variable as $key => $value) {
    Route::resource($key, $value);
}
