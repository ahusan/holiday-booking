<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Models\Booking;
use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'packages' => Package::where('is_featured', true)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::post('/booknow', [BookingController::class, 'booknow'])->name('bookings.create');
    Route::get('/booking/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
    Route::get('/packages/{id}', [PackageController::class, 'details'])->name('packages.details');
    Route::resource('bookings', BookingController::class);
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin/bookings', [BookingController::class, 'admin'])->name('admin.bookings');
        Route::get('/admin/bookings/{id}', [BookingController::class, 'edit'])->name('admin.bookings.edit');
        Route::post('/admin/bookings', [BookingController::class, 'store'])->name('admin.bookings.store');
        Route::get('/admin', function (){
            return Inertia::render('Admin', [
                'bookings' => Booking::all()->count(),
                'packages' => Package::all()->count(),
                'users' => User::all()->count(),
            ]);
        })->name('admin');
        Route::get('/admin/packages', [ PackageController::class, 'admin' ])->name('admin.packages');
        Route::get('/admin/users', function (){
            return Inertia::render('Admin/Users', [
                'users' => User::all(),
            ]);
        })->name('admin.users');
        Route::get('/admin/user/edit', function (){
            return Inertia::render('Admin/UserCreate');
        })->name('admin.users.edit');
        Route::post('/admin/user/create', [ProfileController::class, 'create'])->name('admin.users.create');
    });
});

require __DIR__.'/auth.php';
