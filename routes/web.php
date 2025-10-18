<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {


    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });


    Route::middleware([\App\Http\Middleware\EmployeeMiddleware::class])->group(function () {
        Route::get('/employee/list', [EmployeeController::class, 'empIndex'])->name('employees.empindex');
    });


    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

});


Route::get('/', function () {
    return redirect()->route('login');
});
