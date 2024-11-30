<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Public route
Route::get('/', function () {
    return view('welcome'); // Adjust this if you have a custom homepage
});

// Home route for users without registration
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/orders/check', [OrderController::class, 'checkStatus'])->name('orders.check');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // User management routes
    Route::resource('users', UserController::class)->except(['show']);

    // Customer management routes
    Route::resource('customers', CustomerController::class)->except(['show']);

    // Order routes
    Route::resource('orders', OrderController::class);
    
    // Invoice routes
    Route::resource('invoices', InvoiceController::class);
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

    // Archived orders
    Route::get('/archived-orders', [OrderController::class, 'archived'])->name('orders.archived');
    Route::put('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
});

// Role-based routes for Route department
Route::middleware(['auth', 'role:Route'])->group(function () {
    Route::post('/orders/{order}/update', [OrderController::class, 'update'])->name('orders.update');
});

// Fallback route
Route::fallback(function () {
    return view('errors.404'); // Ensure you have an error view created
});