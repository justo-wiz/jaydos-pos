<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UnitController;
use App\Livewire\Actions\Logout;
use App\Models\Unit;

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
    //categories
    Route::get('/all/category', [CategoryController::class, 'ShowCategories'])->name('all.category');
    Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
    Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');
    Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/update/category', [CategoryController::class, 'UpdateCategory'])->name('update.category');
    Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');
    //Brands
    Route::get('/all/brand', [BrandController::class, 'ShowBrand'])->name('all.brand');
    Route::get('/add/brand', [BrandController::class, 'AddBrand'])->name('add.brand');
    Route::post('/store/brand', [BrandController::class, 'StoreBrand'])->name('store.brand');
    Route::get('/edit/brand/{id}', [BrandController::class, 'EditBrand'])->name('edit.brand');
    Route::post('/update/brand/', [BrandController::class, 'UpdateBrand'])->name('update.brand');
    Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brand');
    //Unit
    Route::get('/all/unit', [UnitController::class, 'ShowUnit'])->name('all.unit');
    Route::get('/add/unit', [UnitController::class, 'AddUnit'])->name('add.unit');
    Route::post('/store/unit', [UnitController::class, 'StoreUnit'])->name('store.unit');
    Route::get('/edit/unit/{id}', [UnitController::class, 'EditUnit'])->name('edit.unit');
    Route::post('/update/unit/', [UnitController::class, 'UpdateUnit'])->name('update.unit');
    Route::get('/delete/unit/{id}', [UnitController::class, 'DeleteUnit'])->name('delete.unit');
}); //end admin group middleware
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
