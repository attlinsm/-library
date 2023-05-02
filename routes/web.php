<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(BookCategoryController::class)
        ->prefix('books/categories')
        ->group(function () {
        Route::get('/', 'index')
            ->name('books.categories.index');
        Route::get('/create', 'create')
            ->name('books.categories.create');
        Route::get('/edit/{category}', 'edit')
            ->name('books.categories.edit');
        Route::patch('/update/{category}', 'update')
            ->name('books.categories.update');
        Route::delete('/destroy/{category}', 'destroy')
            ->name('books.categories.destroy');
    });

    Route::resource('books', BookController::class);

    Route::controller(EmployeeController::class)
        ->prefix('/employees')
        ->group(function () {
        Route::get('/', 'index')
            ->name('employees.index');
        Route::get('/create', 'create')
            ->name('employees.create');
        Route::post('/store', 'store')
            ->name('employees.store');
        Route::get('/edit/{employee}', 'edit')
            ->name('employees.edit');
        Route::patch('/update/{employee}', 'update')
            ->name('employees.update');
        Route::delete('/destroy/{employee}', 'destroy')
            ->name('employees.destroy');
        });
});


