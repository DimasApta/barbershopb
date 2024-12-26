<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;

// Home Route (Halaman utama atau beranda)
Route::get('/', function () {
    return view('home'); // Menampilkan view home
})->name('home');

// Authentication Routes (Login & Register menggunakan Auth::routes())
Auth::routes();

// Bookings Routes (Only for authenticated users)
Route::middleware(['auth'])->group(function () {
    // Booking index page (Menampilkan daftar booking pengguna)
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    
    // Booking create and store (Form untuk membuat booking baru)
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    
    // Edit booking (Form untuk mengedit booking)
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    
    // Cancel booking (Untuk membatalkan booking)
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

// Services Route (Accessible by all users)
Route::get('/services', [ServiceController::class, 'index'])->name('services.index'); // Halaman layanan, bisa diakses oleh semua orang

// Profile Routes (Only for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // Halaman profil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Edit profil
});

// Testimonial Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
});
Route::resource('testimonials', TestimonialController::class)->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');


// Logout Route (Optional, already handled by Auth::routes())
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // Setelah logout, kembali ke halaman home
})->name('logout');
