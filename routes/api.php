<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//  API versioning
Route::prefix('v1')->group(function() {

    //  Course API route
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']); // List and filter courses
        Route::post('/', [CourseController::class, 'store']); // Create a new course
        Route::get('/{id}', [CourseController::class, 'show']); // Show a specific course
        Route::put('/{id}', [CourseController::class, 'update']); // Update a specific course
        Route::delete('/{id}', [CourseController::class, 'destroy']); // Delete a specific course (soft delete)
    });

    //  Student API route
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'index']); // List and filter students
        Route::post('/', [StudentController::class, 'store']); // Create a new student
        Route::get('/{id}', [StudentController::class, 'show']); // Show a specific student
        Route::put('/{id}', [StudentController::class, 'update']); // Update a specific student
        Route::delete('/{id}', [StudentController::class, 'destroy']); // Delete a specific student (soft delete)
    });

    //  Comments API route
    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']); // List and filter comments
        Route::post('/', [CommentController::class, 'store']); // Create a new comment
        Route::get('/{id}', [CommentController::class, 'show']); // Show a specific comment
        Route::put('/{id}', [CommentController::class, 'update']); // Update a specific comment
        Route::delete('/{id}', [CommentController::class, 'destroy']); // Delete a specific comment (soft delete)
    });

    //  Registration API route
    Route::prefix('registrations')->group(function () {
        Route::get('/', [RegistrationController::class, 'index']); // List and filter registrations
        Route::post('/', [RegistrationController::class, 'store']); // Create a new registration
        Route::get('/{id}', [RegistrationController::class, 'show']); // Show a specific registration
        Route::put('/{id}', [RegistrationController::class, 'update']); // Update a specific registration
        Route::delete('/{id}', [RegistrationController::class, 'destroy']); // Delete a specific registration (soft delete)
    });

});