<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\livewire\HomeComponent;
use App\Http\livewire\ShopComponent;
use App\Http\livewire\Admin\AdminComponent;
use App\Http\livewire\User\UserComponent;


Route::get('/',   HomeComponent::class)->name('home.index');
Route::get('/shop',   ShopComponent::class)->name('shop');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard',UserComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminComponent::class)->name('admin.dashboard');
});

require __DIR__.'/auth.php';
