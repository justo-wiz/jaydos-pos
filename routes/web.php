<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Livewire\Actions\Logout;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'roles:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/Logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/edit/profile', [AdminController::class, 'editprofile'])->name('admin.editprofile');
    Route::post('/update/profile', [AdminController::class, 'UpdateProfile'])->name('admin.updateprofile');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('admin.changepassword');
    Route::post('/password/update', [AdminController::class, 'UpdatePassword'])->name('admin.updatepassword');
}); //end admin group middleware
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
